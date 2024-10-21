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
                <button class="btn btn-primary" type="button"onclick= "btnEditarUser('.$data[$i]['id'].');" > <i class="fas fa-edit"></i> </button>
                <button class="btn btn-danger" type="button" onclick="btneliminarUser('.$data[$i]['id'].');" > <i class="fas fa-trash-alt"></i></button>
                <button class="btn btn-success" type="button" onclick="btnreingresarUser('.$data[$i]['id'].');" > <i class="fas fa-sync-alt"></i> Reingresar</button>
                </div>';
        }
        
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    
    public function validar() {
       
        if (empty($_POST['usuario']) || empty($_POST['clave'])) {
            $msg = "Los campos están vacíos"; 
        } else {
            $usuario = $_POST['usuario']; 
            $clave = $_POST['clave'];
    
            // Obtener el usuario de la base de datos
            $data = $this->model->getUsuario($usuario);
    
            // Verificar si el usuario existe
            if ($data) {
                // Validar la contraseña ingresada con el hash almacenado
                if (password_verify($clave, $data['clave'])) {
                    $_SESSION['id_usuario'] = $data['id'];
                    $_SESSION['usuario'] = $data['usuario']; 
                    $_SESSION['nombre'] = $data['nombre']; 
                    $msg = "ok";
                } else {
                    $msg = "Usuario o contraseña incorrecta";
                }
            } else {
                $msg = "Usuario o contraseña incorrecta"; // Si no se encontró el usuario
            }
        }
    
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die(); 
    }
    
    public function registrar() {
        header('Content-Type: application/json');
    
        $usuario = $_POST['usuario'] ?? '';
        $nombre = $_POST['nombre'] ?? '';
        $clave = $_POST['clave'] ?? '';
        $confirmar = $_POST['confirmar'] ?? '';
        $caja = $_POST['caja'] ?? '';
        $id = $_POST['id'] ?? '';
    
        // Verifica si se están llenando todos los campos obligatorios
        if (empty($usuario) || empty($nombre) || empty($caja)) {
            echo json_encode("Todos los campos son obligatorios", JSON_UNESCAPED_UNICODE);
            die();
        }
    
        // Solo se verifica la contraseña si es un nuevo registro
        if ($id == "") { // Nuevo registro
            if (empty($clave) || empty($confirmar)) {
                echo json_encode("La contraseña es obligatoria", JSON_UNESCAPED_UNICODE);
                die();
            }
    
            if ($clave != $confirmar) {
                echo json_encode("Las contraseñas no coinciden", JSON_UNESCAPED_UNICODE);
                die();
            }
    
            
            $claveHasheada = password_hash($clave, PASSWORD_BCRYPT);
    
            $data = $this->model->registrarusuario($usuario, $nombre, $claveHasheada, $caja);
            if ($data == "ok") {
                echo json_encode("ok", JSON_UNESCAPED_UNICODE);
            } else if ($data == "existe") {
                echo json_encode("El usuario ya existe", JSON_UNESCAPED_UNICODE);
            } else {
                echo json_encode("Error al registrar el usuario", JSON_UNESCAPED_UNICODE);
            }
        } else { // Modificar usuario
            $data = $this->model->modificarUsuario($usuario, $nombre, $caja, $id);
            if ($data == "modificado") {
                echo json_encode("modificado", JSON_UNESCAPED_UNICODE);
            } else {
                echo json_encode("Error al modificar el usuario", JSON_UNESCAPED_UNICODE);
            }
        }
    
        die();
    }
    

    public function editar( int $id){
        
        $data = $this->model->editarUser($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar(int $id) {
        $data = $this->model->accionUser(0 , $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al eliminar el usuario";  // Se agregó el punto y coma aquí
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id) {
        $data = $this->model->accionUser(1,$id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al Reingresar el Usuario";  // Se agregó el punto y coma aquí
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function salir(){
    }
    
}

?>




