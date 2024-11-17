<?php

class reseñaModel extends Query {

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
        $sql = "SELECT r.id, r.fecha_subida, r.comentario, r.calificacion, r.dni
                FROM reseñas r 
                WHERE r.dni = :dni_cliente";  // Cambié 'r.dni_cliente' por 'r.dni'
    
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
    
}
    

?>