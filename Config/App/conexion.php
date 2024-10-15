<?php

class conexion {

    private $conect;

    public function __construct() {
        
        $dsn = "mysql:host=" . host . ";dbname=" . db . ";charset=utf8";  

        try {
            
            $this->conect = new PDO($dsn, user, pass);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            
            echo "ERROR EN LA CONEXION A LA BASE DE DATOS: " . $e->getMessage();
            $this->conect = null;  
        }
    }

    
    public function conect() {
        return $this->conect;
    }

}

?>

