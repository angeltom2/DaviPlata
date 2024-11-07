<?php

set_error_handler(function($errno, $errstr) {
    $response = [
        'success' => false,
        'message' => 'Error en el servidor: ' . $errstr
    ];
    echo json_encode($response);
    exit; // Detiene la ejecución si ocurre un error
});

class Tickets extends Controller {
    private $model;

    public function __construct() {
        session_start();
        parent::__construct(); 
        $this->model = $this->TicketsModel; // Usando la propiedad dinámica
        if ($this->model == null) {
            echo "Modelo no cargado correctamente.";
            die();  // Detener la ejecución si el modelo no se carga
        }
    }

    public function index() {
        $this->views->getView($this, "index");
    }

    public function registrarTicket() {
        // Establecer el tipo de respuesta como JSON
        header('Content-Type: application/json');
    
        // Iniciar sesión si no está iniciada
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    
        // Leer el cuerpo de la solicitud como JSON
        $input = json_decode(file_get_contents('php://input'), true);
    
        // Verificar que la solicitud contiene datos
        if (!$input) {
            echo json_encode(["success" => false, "message" => "Datos no válidos o solicitud vacía"], JSON_UNESCAPED_UNICODE);
            exit;
        }
    
        // Validar los datos recibidos
        $queja = $input['queja'] ?? '';
        $dni_cliente = $input['dni'] ?? '';
    
        // Validar que la queja no esté vacía
        if (empty($queja)) {
            echo json_encode(["success" => false, "message" => "La queja no puede estar vacía"], JSON_UNESCAPED_UNICODE);
            exit;
        }
    
        // Validar que el DNI no esté vacío
        if (empty($dni_cliente)) {
            echo json_encode(["success" => false, "message" => "El DNI es obligatorio"], JSON_UNESCAPED_UNICODE);
            exit;
        }
    
        // Validar que el DNI tenga exactamente 10 dígitos
        if (strlen($dni_cliente) !== 10 || !ctype_digit($dni_cliente)) {
            echo json_encode(["success" => false, "message" => "El DNI debe tener exactamente 10 dígitos numéricos"], JSON_UNESCAPED_UNICODE);
            exit;
        }
    
        // Determinar la prioridad de la queja
        $prioridad = $this->obtenerPrioridad($queja);
    
        // Obtener la fecha actual
        $fecha_subida = date('Y-m-d H:i:s');
    
        // Llamar al modelo para registrar el ticket en la base de datos
        try {
            $resultado = $this->model->registrarTicket($fecha_subida, $queja, $prioridad, $dni_cliente);
    
            // Verificar el resultado del modelo
            if ($resultado === "ok") {
                echo json_encode(["success" => true, "message" => "Ticket registrado exitosamente"], JSON_UNESCAPED_UNICODE);
            } else {
                throw new Exception("Error al registrar el ticket en la base de datos");
            }
        } catch (Exception $e) {
            echo json_encode(["success" => false, "message" => $e->getMessage()], JSON_UNESCAPED_UNICODE);
        }
    
        die(); // Termina la ejecución para evitar respuestas adicionales
    }
    
    private function obtenerPrioridad($queja) {
        // Determinar la prioridad basándose en la palabra clave de la queja
        if (stripos($queja, "urgente") !== false) {
            return "Alta";
        } elseif (stripos($queja, "normal") !== false) {
            return "Media";
        } else {
            return "Baja";
        }
    }

    public function listar() {
        // Obtener los tickets desde el modelo
        $data = $this->model->getTickets(); 
        
        error_log(print_r($data, true));  // Para depurar y ver los datos
        
        // Procesar los datos para agregar los cambios de estado y las acciones
        for ($i = 0; $i < count($data); $i++) {
            // Cambiar el estado a una etiqueta con estilo
            if (isset($data[$i]['status'])) {
                if ($data[$i]['status'] == 'Abierto') {
                    $data[$i]['status'] = 'Abierto'; // Solo el texto, sin etiquetas
                } elseif ($data[$i]['status'] == 'Cerrado') {
                    $data[$i]['status'] = 'Cerrado'; // Solo el texto, sin etiquetas
                } else {
                    $data[$i]['status'] = 'En Progreso'; // Cambié la lógica aquí para "En Progreso"
                }
            } else {
                $data[$i]['status'] = 'No disponible'; // Default si no hay estado
            }
    
            // Agregar la columna de "acciones"
            $data[$i]['acciones'] = '<div> 
                <button class="btn btn-warning btn-sm" type="button" onclick="editarTicket(' . $data[$i]['id'] . ');">Editar</button>
            </div>';
        }
        
        // Devolver los datos en formato JSON
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    
    
    
    
    
}
?>
