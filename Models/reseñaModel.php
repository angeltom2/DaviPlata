<?php

class reseñaModel extends Query {

    public function eliminarResena($id) {
        // Preparamos la consulta para eliminar la reseña
        $sql = "DELETE FROM reseñas WHERE id = ?";
        
        // Ejecutamos la consulta
        $data = $this->delete($sql, [$id]);
        
        return $data == 1;  // Si la eliminación fue exitosa, devuelve true
    }

    public function registrarReseña(string $fecha_subida, string $comentario, int $calificacion, string $dni) {
        try {
            $sql = "INSERT INTO reseñas (fecha_subida, comentario, calificacion, dni) VALUES (?, ?, ?, ?)";
            $datos = [$fecha_subida, $comentario, $calificacion, $dni];
            $data = $this->save($sql, $datos);
    
            return $data == 1 ? "ok" : "error";
        } catch (Exception $e) {
            error_log("Error al registrar la reseña: " . $e->getMessage());
            return "error";
        }
    }
    
    public function getReseñasCliente() {
        // Verificar si la variable de sesión 'dni_cliente' está definida
        if (!isset($_SESSION['dni_cliente'])) {
            error_log("Error: 'dni_cliente' no está definida en la sesión.");
            return [];  // Si no está definida la sesión
        }
    
        // Obtener el DNI del cliente desde la sesión
        $dniCliente = $_SESSION['dni_cliente'];
    
        // Consulta SQL para obtener las reseñas filtradas por el DNI del cliente
        $sql = "SELECT r.id, r.Fecha_subida, r.Comentario, r.Calificacion, r.DNI 
                FROM reseñas r 
                WHERE r.DNI = :dni_cliente";
    
        $params = ['dni_cliente' => $dniCliente];
        $data = $this->selectALL($sql, $params);
    
        // Verificar si se obtienen datos
        if ($data) {
            error_log("Datos de reseñas obtenidos: " . print_r($data, true));  // Log para depuración
            return $data;
        } else {
            error_log("No se encontraron reseñas para el cliente: " . $dniCliente);
            return [];  // Si no hay reseñas
        }
    }
    
    public function obtenerResenaPorId(int $id) {
        // Consulta para obtener el comentario, calificación y DNI de la reseña
        $sql = "SELECT id, comentario, calificacion, dni FROM reseñas WHERE id = ?";
        
        // Ejecutar la consulta
        $data = $this->select($sql, [$id]);
        
        return $data;
    }
    
    public function actualizarResena(string $comentario, int $calificacion, int $id) {
        $fecha_modificacion = date("Y-m-d H:i:s"); // Fecha y hora actuales
        // Se elimina el DNI de la consulta
        $sql = "UPDATE reseñas SET comentario = ?, calificacion = ?, fecha_subida = ? WHERE id = ?";
        
        $data = $this->save($sql, [$comentario, $calificacion, $fecha_modificacion, $id]);
        return $data == 1;
    }
    
}
    

?>