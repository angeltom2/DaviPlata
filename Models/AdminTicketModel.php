<?php

class AdminTicketModel extends Query {

    public function getAllTickets() {
        // Consulta SQL para obtener todos los tickets
        $sql = "SELECT t.id, t.fecha_subida, t.queja, t.priority, t.status, t.dni_cliente, t.solucion 
                FROM tickets t";  // No hay filtrado por DNI
    
        // Ejecutar la consulta sin parámetros
        $data = $this->selectALL($sql);
    
        return $data ?: [];  // Retorna los resultados como un array o vacío si no hay resultados
    }

    public function obtenerDatosTicket(int $id) {
    // Consulta SQL para obtener los datos del ticket por ID
    $sql = "SELECT id, queja FROM tickets WHERE id = ?";
    
    // Ejecutar la consulta y obtener los datos
    $data = $this->select($sql, [$id]);

    // Retornar los datos del ticket
    return $data;
    }

    public function actualizarTicket($id, $solucion, $status) {
        // Preparar la consulta para actualizar el ticket en la base de datos
        $query = "UPDATE tickets SET solucion = ?, status = ? WHERE id = ?";
    
        // Preparar y ejecutar la consulta
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssi', $solucion, $status, $id); // 'ssi' para string, string, integer
    
        // Ejecutar la consulta y devolver el resultado
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    
        
       
}
    

?>