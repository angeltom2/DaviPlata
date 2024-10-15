<?php

class Query extends conexion {

    private $pdo;
    private $con;
    private $sql;

    public function __construct() {
        $this->pdo = new conexion();  
        $this->con = $this->pdo->conect();  

        if (!$this->con) {
            die("Error: Conexión no válida.");
        }
    }

    public function select(string $sql) {  
        $this->sql = $sql;

        $result = $this->con->prepare($this->sql); 
        $result->execute();  
        $data = $result->fetch(PDO::FETCH_ASSOC);  

        return $data;
    }

}

?>
