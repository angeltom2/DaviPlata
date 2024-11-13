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

        // Usar el método save del padre Query para ejecutar la consulta
        $datos = [$solucion, $status, $id];
        $resultado = $this->save($query, $datos);

        // Retornar verdadero si el resultado es 1 (éxito)
        return $resultado === 1;
    }

    public function getTickets() {
    // Consulta SQL para obtener todos los tickets
    $query = "SELECT id, fecha_subida, queja, priority, status, solucion FROM tickets";
    
    // Utiliza el método selectALL de la clase Query (que hereda de conexion)
    $result = $this->selectALL($query);
    
    return $result; // Retorna el array de tickets obtenidos
    }

    public function abrirTicket($idTicket, $estado, $solucion) {
        // SQL para actualizar el ticket
        $sql = "UPDATE tickets SET status = ?, solucion = ? WHERE id = ?";
        
        // Usar el método `save` de la clase `Query` para ejecutar la consulta
        $datos = [$estado, $solucion, $idTicket];
        
        // Ejecutar la consulta de actualización
        $result = $this->save($sql, $datos);
        
        // Retornar si la operación fue exitosa (1 para éxito, 0 para fallo)
        return $result == 1;
    }
    
    
    
    
        
       
}
    

?>