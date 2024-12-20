<?php

class TicketsModel extends Query {

    // Definir las propiedades de la clase
    private $fecha_subida;
    private $queja;
    private $priority;  // Cambiado de 'prioridad' a 'priority'
    private $status;
    private $dni_cliente;

    public function registrarTicket(string $fecha_subida, string $queja, string $priority, string $dni_cliente) {
        $this->fecha_subida = $fecha_subida;
        $this->queja = $queja;
        $this->priority = $priority;
        $this->status = 'Abierto';
        $this->dni_cliente = $dni_cliente;

        // Cambiar el estado del ticket anterior a 'Pendiente' o cualquier otro estado
        $this->updateTicketStatus($dni_cliente);

        try {
            // Insertar el nuevo ticket
            $sql = "INSERT INTO tickets (fecha_subida, queja, priority, status, dni_cliente, solucion) VALUES (?, ?, ?, ?, ?, NULL)";
            $datos = array($this->fecha_subida, $this->queja, $this->priority, $this->status, $this->dni_cliente);
            $data = $this->save($sql, $datos);

            $res = $data == 1 ? "ok" : "error";
        } catch (Exception $e) {
            error_log("Error al registrar el ticket: " . $e->getMessage());
            $res = "error";
        }

        return $res;
    }

    public function updateTicketStatus($dni_cliente) {
        // Acceder a la conexión a través del getter getCon()
        $sql = "UPDATE tickets SET status = 'En progreso' WHERE dni_cliente = ? AND status = 'Abierto'";
        $stmt = $this->getCon()->prepare($sql);  // Usar el método getCon() para obtener la conexión
        $stmt->bindParam(1, $dni_cliente, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function getTicketsCliente() {
        // Verificar si la variable de sesión 'dni_cliente' está definida
        if (!isset($_SESSION['dni_cliente'])) {
            error_log("Error: 'dni_cliente' no está definida en la sesión.");
            return [];  // Si no está definida la sesión
        }
    
        // Obtener el DNI del cliente desde la sesión
        $dniCliente = $_SESSION['dni_cliente'];
    
        // Consulta SQL para obtener los tickets filtrados por el DNI del cliente
        $sql = "SELECT t.id, t.fecha_subida, t.queja, t.priority, t.status, t.dni_cliente, t.solucion 
                FROM tickets t 
                WHERE t.dni_cliente = :dni_cliente";
        
        $params = ['dni_cliente' => $dniCliente];
        $data = $this->selectALL($sql, $params);
    
        // Verificar si se obtienen datos
        if ($data) {
            error_log("Datos de tickets obtenidos: " . print_r($data, true));  // Log para depuración
            return $data;
        } else {
            error_log("No se encontraron tickets para el cliente: " . $dniCliente);
            return [];  // Si no hay tickets
        }
    }
    
    public function obtenerTicketPorId(int $id) {
        $sql = "SELECT id, queja FROM tickets WHERE id = ?";
        $data = $this->select($sql, [$id]);
        return $data;
    }
    
    public function actualizarQueja(string $queja, string $prioridad, int $id) {
        $fecha_subida = date("Y-m-d H:i:s"); // Fecha y hora actuales
        $sql = "UPDATE tickets SET queja = ?, priority = ?, fecha_subida = ? WHERE id = ?";
        $data = $this->save($sql, [$queja, $prioridad, $fecha_subida, $id]);
        return $data == 1;
    }
    
    
    

}

?>



