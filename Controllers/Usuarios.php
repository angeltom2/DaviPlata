<?php

class Usuarios extends Controller {

    private $model;  

    public function __construct() {
        session_start();
        parent::__construct(); 
        $this->model = new UsuariosModel();  // Inicializa el modelo correctamente
    }

    public function index() {
        $data['cajas'] = $this->model->getCajas();
        $this->views->getView($this, "index", $data);
      }

    public function listar() {
        $data = $this->model->getUsuarios(); 
        
        error_log(print_r($data, true)); 
        
        for ($i = 0; $i < count($data); $i++) {
            if (isset($data[$i]['estado'])) {
                if ($data[$i]['estado'] == 1) {
                    $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
                } else {
                    $data[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
                }
            } else {
                $data[$i]['estado'] = '<span class="badge badge-warning">No disponible</span>';
            }
    
            $data[$i]['acciones'] = '<div> 
                <button class="btn btn-primary" type="button">Editar</button>
                <button class="btn btn-danger" type="button">Eliminar</button>
                </div>';
        }
        
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
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




