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
        if (empty($_POST['usuario_dni']) || empty($_POST['clave']) || empty($_POST['tipo_usuario'])) {
            $msg = "Los campos están vacíos"; 
        } else {
            $usuario_dni = $_POST['usuario_dni']; 
            $clave = $_POST['clave'];
            $tipo_usuario = $_POST['tipo_usuario'];
    
            // Obtener datos según el tipo de usuario
            $data = ($tipo_usuario == "admin") ? $this->model->getUsuario($usuario_dni) : $this->model->getCliente($usuario_dni);
    
            // Depuración
            error_log("Datos recibidos: DNI = $usuario_dni, Clave = $clave");
            error_log("Datos obtenidos de la base de datos: " . print_r($data, true));
    
            // Verificación de datos
            if ($data) {
                if ($tipo_usuario == "admin") {
                    // Verificar la contraseña encriptada para administradores
                    if (password_verify($clave, $data['clave'])) {
                        $_SESSION['id_usuario'] = $data['id'];
                        $_SESSION['usuario'] = isset($data['usuario']) ? $data['usuario'] : ''; // Manejar undefined
                        $_SESSION['nombre'] = isset($data['nombre']) ? $data['nombre'] : ''; // Manejar undefined
                        $msg = "ok"; // Inicio de sesión exitoso
                    } else {
                        $msg = "La contraseña es incorrecta"; // Mensaje específico
                    }
                } else if ($tipo_usuario == "cliente") {
                    // Comprobar si la contraseña de cliente es correcta (sin hash)
                    if ($data['clave'] === $clave) {
                        $_SESSION['id_usuario'] = $data['id'];
                        $_SESSION['usuario'] = isset($data['usuario']) ? $data['usuario'] : ''; // Manejar undefined
                        $_SESSION['nombre'] = isset($data['nombre']) ? $data['nombre'] : ''; // Manejar undefined
                        $_SESSION['dni_cliente'] = $data['dni']; // Guarda el DNI del cliente en la sesión
                        $msg = "ok"; // Inicio de sesión exitoso
                    } else {
                        $msg = "La contraseña es incorrecta"; // Mensaje específico
                    }
                }
            } else {
                $msg = "El DNI no está registrado"; // Mensaje específico
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
        }if ($id == "") { 
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

    public function cambiarPass() {
        $actual = $_POST['clave_actual'];
        $nueva = $_POST['clave_nueva'];
        $confirmar = $_POST['confirmar_clave'];
    
        // Verifica si los campos están vacíos
        if (empty($actual) || empty($nueva) || empty($confirmar)) {
            echo json_encode("Todos los campos son obligatorios", JSON_UNESCAPED_UNICODE);
            die();
        } else if (empty($nueva) || empty($confirmar)) {
            echo json_encode("La nueva contraseña es obligatoria", JSON_UNESCAPED_UNICODE);
            die();
        } else if ($nueva != $confirmar) {
            echo json_encode("Las contraseñas no coinciden", JSON_UNESCAPED_UNICODE);
            die();
        }
    
        $id = $_SESSION['id_usuario'];
        $data = $this->model->editarUser($id);
    
        // Verificar la contraseña actual
        if (password_verify($actual, $data['clave'])) {
            $verificar = $this->model->modificarPass(password_hash($nueva, PASSWORD_DEFAULT), $id);
            if ($verificar == 1) {
                echo json_encode("ok", JSON_UNESCAPED_UNICODE); // Devuelve "ok" en caso de éxito
            } else {
                echo json_encode("Error al modificar la contraseña", JSON_UNESCAPED_UNICODE);
            }
        } else {
            echo json_encode("La contraseña actual es incorrecta", JSON_UNESCAPED_UNICODE);
        }
    }
    
}

?>




