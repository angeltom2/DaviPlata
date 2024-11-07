
<?php
class Tickets extends Controller {

    public function index() {
        $this->views->getView($this, "index");
    }


    public function registrarTicket() {
        header('Content-Type: application/json');
        
        // Leer el cuerpo de la solicitud como JSON
        $input = json_decode(file_get_contents('php://input'), true);
    
        // Recoger los datos enviados por el cliente
        $queja = $input['queja'] ?? '';  
    
        // Validar que los campos obligatorios estén completos
        if (empty($queja)) {
            echo json_encode(["success" => false, "message" => "La queja no puede estar vacía"], JSON_UNESCAPED_UNICODE);
            die();
        }
    
        // Obtener el DNI de la sesión
        session_start(); // Asegúrate de que la sesión esté iniciada
        if (!isset($_SESSION['dni_usuario'])) {
            echo json_encode(["success" => false, "message" => "No autenticado"], JSON_UNESCAPED_UNICODE);
            die();
        }
    
        $dni_cliente = $_SESSION['dni_usuario'];  // Obtener el DNI de la sesión
    
        // Determinar la prioridad de la queja
        $prioridad = $this->obtenerPrioridad($queja);
    
        // Obtener la fecha actual
        $fecha_subida = date('Y-m-d H:i:s');  
    
        // Asignar el estado del ticket
        $status = 'Abierto'; 
        
        // Llamar al modelo para registrar el ticket
        $data = $this->model->registrarTicket($dni_cliente, $queja, $prioridad, $fecha_subida, $status);
    
        // Responder según el resultado
        if ($data == "ok") {
            echo json_encode(["success" => true, "message" => "Ticket registrado exitosamente"], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode(["success" => false, "message" => "Error al registrar el ticket"], JSON_UNESCAPED_UNICODE);
        }
    
        die();
    }
    
    private function obtenerPrioridad($queja) {
        // Simple lógica de ejemplo para determinar la prioridad según la queja
        if (strpos($queja, "urgente") !== false) {
            return "Alta";
        } else if (strpos($queja, "normal") !== false) {
            return "Media";
        } else {
            return "Baja";
        }
    }
    



}
?>