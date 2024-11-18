<?php

class Query extends conexion {

    private $pdo;
    private $con;
    private $sql;
    private $datos;

    public function __construct() {
        $this->pdo = new conexion();  
        $this->con = $this->pdo->conect();  

        if (!$this->con) {
            die("Error: Conexión no válida.");
        }
    }

    // Método para obtener la conexión
    public function getCon() {
        return $this->con;
    }

    public function select(string $sql, array $datos = []) {  
        $this->sql = $sql;

        $result = $this->con->prepare($this->sql); 
        
        // Ejecutar la consulta con parámetros si se proporcionan
        if (!empty($datos)) {
            $result->execute($datos);  
        } else {
            $result->execute();  
        }
        
        // Obtener solo un registro
        $data = $result->fetch(PDO::FETCH_ASSOC);  
        
        return $data;
    }

    public function selectALL(string $sql, array $datos = []) {  
        $this->sql = $sql;

        $result = $this->con->prepare($this->sql); 
        
        // Ejecutar la consulta con parámetros si se proporcionan
        if (!empty($datos)) {
            $result->execute($datos);  
        } else {
            $result->execute();  
        }
        
        // Obtener todos los registros
        $data = $result->fetchAll(PDO::FETCH_ASSOC);  
        
        return $data;
    }

    public function save(string $sql, array $datos) {
        $this->sql = $sql;
        $this->datos = $datos;
        
        $insert = $this->con->prepare($this->sql);
        
        // Ejecutar la consulta de inserción con parámetros
        $data = $insert->execute($this->datos);
        
        return $data ? 1 : 0; // Retornar 1 si fue exitoso, 0 si falló
    }

    public function delete(string $sql, array $datos) {
        $this->sql = $sql;
        $this->datos = $datos;
        
        // Preparamos la consulta de eliminación
        $delete = $this->con->prepare($this->sql);
        
        // Ejecutamos la consulta de eliminación
        $data = $delete->execute($this->datos);
        
        return $data ? 1 : 0; // Retornar 1 si fue exitoso, 0 si falló
    }

}

?>

