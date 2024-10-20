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

    public function select(string $sql) {  
        $this->sql = $sql;

        $result = $this->con->prepare($this->sql); 
        $result->execute();  
        $data = $result->fetch(PDO::FETCH_ASSOC);  

        return $data;
    }
    public function selectALL(string $sql) {  
        $this->sql = $sql;

        $result = $this->con->prepare($this->sql); 
        $result->execute();  
        $data = $result->fetchALL(PDO::FETCH_ASSOC);  

        return $data;
    }

    public function save(string $sql , array $datos){

        $this->sql=$sql;
        $this->datos=$datos;
        $insert = $this->con->prepare($this->sql);
        $data = $insert->execute($this->datos);
        if ($data) {
            $res = 1;
        }else {
            $res = 0;
        }
        return $res;

    }

}

?>
