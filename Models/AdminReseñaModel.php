<?php

class AdminReseñaModel extends Query {

    public function getReseñas() {
        // Consulta SQL para obtener todas las reseñas
        $sql = "SELECT id, Fecha_subida, Comentario, Calificacion, DNI FROM reseñas";
        
        // Ejecutar la consulta sin parámetros
        $data = $this->selectALL($sql);
    
        // Verificar si se obtienen datos
        if ($data) {
            error_log("Datos de reseñas obtenidos: " . print_r($data, true));  // Log para depuración
            return $data;
        } else {
            error_log("No se encontraron reseñas en la base de datos.");
            return [];  // Retorna un arreglo vacío si no hay reseñas
        }
    }
     
    



   
}
    

?>