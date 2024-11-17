<?php
class reseña extends Controller {
    private $model;

    public function __construct() {
        session_start();
        parent::__construct(); 
        $this->model = $this->reseñaModel; // Usando la propiedad dinámica
        if ($this->model == null) {
            echo "Modelo no cargado correctamente.";
            die();  
        }
    }

    public function index() {
        $this->views->getView($this, "index");
    }

    public function registrarReseña() {
        header('Content-Type: application/json');
    
        $input = json_decode(file_get_contents('php://input'), true);
    
        if (!$input) {
            echo json_encode(["success" => false, "message" => "Datos no válidos o solicitud vacía"], JSON_UNESCAPED_UNICODE);
            exit;
        }
    
        $comentario = $input['comentario'] ?? '';
        $calificacion = $input['calificacion'] ?? '';
        $dni = $input['dni'] ?? '';
    
        if (empty($comentario)) {
            echo json_encode(["success" => false, "message" => "El comentario no puede estar vacío"], JSON_UNESCAPED_UNICODE);
            exit;
        }
    
        if (empty($calificacion) || $calificacion < 1 || $calificacion > 5) {
            echo json_encode(["success" => false, "message" => "La calificación debe estar entre 1 y 5"], JSON_UNESCAPED_UNICODE);
            exit;
        }
    
        if (empty($dni) || strlen($dni) !== 10 || !ctype_digit($dni)) {
            echo json_encode(["success" => false, "message" => "El DNI debe tener 10 dígitos numéricos"], JSON_UNESCAPED_UNICODE);
            exit;
        }
    
        $fecha_subida = date('Y-m-d H:i:s');
    
        try {
            $resultado = $this->model->registrarReseña($fecha_subida, $comentario, $calificacion, $dni);
    
            if ($resultado === "ok") {
                echo json_encode(["success" => true, "message" => "Reseña registrada exitosamente"], JSON_UNESCAPED_UNICODE);
            } else {
                throw new Exception("Error al registrar la reseña en la base de datos");
            }
        } catch (Exception $e) {
            echo json_encode(["success" => false, "message" => $e->getMessage()], JSON_UNESCAPED_UNICODE);
        }
        die();
    }
    
    public function listarReseñas() {
        // Establecer el encabezado de respuesta para JSON
        header('Content-Type: application/json');
        
        // Obtener las reseñas del cliente desde el modelo
        $data = $this->model->getReseñasCliente();

        // Verificar si los datos son válidos y es un array
        if ($data && is_array($data)) {
            // Procesar los datos para asegurarse de que estén en el formato adecuado para DataTables
            $response = array_map(function($item) {
                // Agregar la columna de "acciones"
                $item['acciones'] = '<div> 
                    <button class="btn btn-warning btn-sm" type="button" onclick="editarReseña(' . $item['id'] . ');">Editar</button>
                    <button class="btn btn-danger btn-sm" type="button" onclick="eliminarReseña(' . $item['id'] . ');">Eliminar</button>
                </div>';
            
                // Devolver los campos con la columna de acciones incluida
                return [
                    'id' => $item['id'],
                    'fecha_subida' => $item['fecha_subida'],
                    'comentario' => $item['comentario'],
                    'calificacion' => $item['calificacion'],
                    'dni' => $item['dni'],
                    'acciones' => $item['acciones']
                ];
            }, $data);

            // Log para depuración: imprimir la respuesta que se va a enviar
            $json_response = json_encode(['data' => $response], JSON_UNESCAPED_UNICODE);
            error_log("Respuesta JSON: " . $json_response);  // Para depuración

            // Verificar si la respuesta JSON es válida antes de enviarla
            if (json_last_error() !== JSON_ERROR_NONE) {
                error_log("Error en la codificación JSON: " . json_last_error_msg());
                echo json_encode(['data' => []]);  // Respuesta vacía si hay error en JSON
            } else {
                // Devolver los datos procesados en formato JSON bajo la clave 'data' para DataTables
                echo $json_response;
            }
        } else {
            // Si no hay datos, devolver una respuesta vacía bajo la clave 'data'
            echo json_encode(['data' => []]); // Respuesta vacía si no hay datos
        }

        die();  // Terminar la ejecución del script
    }
    
}
?>