<?php
class AdminTicket extends Controller {

    private $model;  

    public function __construct() {
        session_start();
        parent::__construct(); 
        $this->model = new AdminTicketModel();  // Inicializa el modelo correctamente
    }

    public function index() {
        $this->views->getView($this, "index");
    }

    public function listarTodos() {
        $data = $this->model->getAllTickets();
    
        for ($i = 0; $i < count($data); $i++) {
            // Ajuste de status
            $status = isset($data[$i]['status']) ? $data[$i]['status'] : 'No disponible';
            $data[$i]['status'] = ($status === 'Abierto' || $status === 'Cerrado') ? $status : 'En Progreso';
    
            // Asignar valores de orden de prioridad
            switch ($data[$i]['priority']) {
                case 'Alta':
                    $data[$i]['priority_order'] = 1;
                    break;
                case 'Media':
                    $data[$i]['priority_order'] = 2;
                    break;
                case 'Baja':
                    $data[$i]['priority_order'] = 3;
                    break;
                default:
                    $data[$i]['priority_order'] = 4; // Valor alto si es desconocido
            }
    
            // Botón de acción
            $acciones = '<div> 
                <button class="btn btn-success btn-sm" style="background-color: #006400; color: white;" type="button" onclick="editarTicket(' . $data[$i]['id'] . ');">Solucionar</button>
            </div>';
            $data[$i]['acciones'] = str_replace(array("\r", "\n", "\t"), '', $acciones);
        }
    
        header('Content-Type: application/json');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        exit;
    }

    public function solucionar(int $id) {
        // Obtener los datos del ticket mediante el modelo TicketManager
        $ticket = $this->model->obtenerDatosTicket($id);
        
        // Establecer el encabezado para la respuesta JSON
        header('Content-Type: application/json');
    
        // Verificar si el ticket existe
        if (empty($ticket)) {
            // Si no existe el ticket, retornar un error
            echo json_encode(['error' => 'Ticket no encontrado'], JSON_UNESCAPED_UNICODE);
        } else {
            // Si el ticket existe, devolver los datos en formato JSON
            echo json_encode($ticket, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
    
    public function solucionarTicket() {
        // Asegúrate de que la respuesta sea JSON
        header('Content-Type: application/json');
    
        // Obtener el JSON enviado desde el frontend
        $data = json_decode(file_get_contents('php://input'), true);
    
        // Verificar si los datos fueron correctamente decodificados
        if ($data === null) {
            // Captura el error exacto y envíalo como respuesta
            echo json_encode(['success' => false, 'error' => 'JSON mal formado', 'received_data' => file_get_contents('php://input')]);
            return;
        }
    
        // Verificar que los datos estén presentes
        if (isset($data['id']) && isset($data['solucion']) && isset($data['status'])) {
            $idTicket = $data['id'];
            $solucion = $data['solucion'];
            $status = $data['status'];
    
            // Llamar al modelo para actualizar el ticket
            $resultado = $this->model->actualizarTicket($idTicket, $solucion, $status);
    
            // Verificar el resultado y devolver la respuesta correspondiente
            if ($resultado) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false, 'error' => 'Error al actualizar el ticket']);
            }
        } else {
            echo json_encode(['success' => false, 'error' => 'Datos incompletos']);
        }
    }

    public function obtenerTickets() {
        header('Content-Type: application/json');
    
        // Llamar al modelo para obtener los tickets
        $tickets = $this->model->getTickets();
    
        if ($tickets) {
            echo json_encode($tickets);
        } else {
            echo json_encode(['success' => false, 'error' => 'No se encontraron tickets']);
        }
    }

    public function abrirTicket() {
        // Obtener el ID del ticket desde la solicitud POST
        $data = json_decode(file_get_contents("php://input"), true);
        $idTicket = $data['id'];
    
        // Llamar al modelo para actualizar el ticket
        $estado = "Abierto";
        $solucion = null; // Borrar la solución
        
        // Realizar la actualización del ticket
        $result = $this->model->abrirTicket($idTicket, $estado, $solucion);
        
        // Retornar el resultado
        if ($result) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false]);
        }
    }
    
    
    
    
    
    
    
    
    
    
    
    
    

}

?>