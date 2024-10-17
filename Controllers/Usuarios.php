<?php

class Usuarios extends Controller {

    private $model;  

    public function __construct() {
        session_start();
        parent::__construct(); 
        $this->model = $this->UsuariosModel;  
    }

    public function listar(){
        $data = $this->model->getUsuarios();
        for ($i=0; $i < count($data) ; $i++) { 
            $data[$i]['acciones'] = '<div> 
            <button class="btn btn-primary" type="button"> editar </button>
            <button class="btn btn-danger" type="button"> Eliminar </button>
            </div>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    

    public function index() {
        
        $this->views->getView($this, "index");
    }

    public function validar() {
        header('Content-Type: application/json'); 

        if (empty($_POST['usuario']) || empty($_POST['clave'])) {
            $msg = "los campos estan vacios"; 
        } else {
            $usuario = $_POST['usuario']; 
            $clave = $_POST['clave']; 
            $data = $this->model->getUsuario($usuario, $clave); 
            if ($data) {
                $_SESSION['id_usuario'] = $data['id'];
                $_SESSION['usuario'] = $data['usuario']; 
                $_SESSION['nombre'] = $data['nombre']; 
                $msg = "ok";
            } else {
                $msg = "usuario o contraseña incorrecta";
            }
        }

        echo json_encode($msg, JSON_UNESCAPED_UNICODE); 
        die(); 
    }
}

?>




