<?php
require_once __DIR__ . '/../Models/UsuariosModel.php';
class Clientes extends Controller {

    private $model;  

    public function __construct() {
        session_start();
        parent::__construct(); 
        $this->model = new UsuariosModel();  // Inicializa el modelo correctamente
    }

    public function index() {
        $this->views->getView($this, "index");
    }

    public function listar() {
        header('Content-Type: application/json');
        $data = $this->model->getClientes(); 
        
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
                <button class="btn btn-primary" type="button"onclick= "btnEditarCliente('.$data[$i]['id'].');" > <i class="fas fa-edit"></i> </button>
                <button class="btn btn-danger" type="button" onclick="btneliminarCliente('.$data[$i]['id'].');" > <i class="fas fa-trash-alt"></i></button>
                <button class="btn btn-success" type="button" onclick="btnreingresarCliente('.$data[$i]['id'].');" > <i class="fas fa-sync-alt"></i> Reingresar</button>
                </div>';
        }
        
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    
    public function validar() {
       
        if (empty($_POST['dni']) || empty($_POST['clave'])) {
            $msg = "Los campos están vacíos"; 
        } else {
            $dni = $_POST['dni']; 
            $clave = $_POST['clave'];
    
            // Obtener el dni de la base de datos
            $data = $this->model->getUsuario($dni);
    
            // Verificar si el dni existe
            if ($data) {
                // Validar la contraseña ingresada con el hash almacenado
                if (password_verify($clave, $data['clave'])) {
                    $_SESSION['id_usuario'] = $data['id'];
                    $_SESSION['dni'] = $data['dni']; 
                    $_SESSION['nombre'] = $data['nombre']; 
                    $msg = "ok";
                } else {
                    $msg = "Usuario o contraseña incorrecta";
                }
            } else {
                $msg = "Usuario o contraseña incorrecta"; // Si no se encontró el dni
            }
        }
    
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die(); 
    }
    
    public function registrar() {
        header('Content-Type: application/json');
    
        $dni = $_POST['dni'] ?? ''; // DNI del cliente
        $nombre = $_POST['nombre'] ?? ''; // Nombre del cliente
        $telefono = $_POST['telefono'] ?? ''; // Teléfono del cliente
        $direccion = $_POST['direccion'] ?? ''; // Dirección del cliente
        $clave = $_POST['clave'] ?? ''; // Contraseña
        $confirmar = $_POST['confirmar'] ?? ''; // Confirmación de la contraseña
        $id = $_POST['id'] ?? ''; // ID del cliente para modificación
    
        // Verifica si se están llenando todos los campos obligatorios
        if (empty($dni) || empty($nombre) || empty($telefono) || empty($direccion)) {
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
    
            // Verifica si el DNI ya existe
            $existe = $this->model->getCliente($dni);
            if ($existe) {
                echo json_encode("El DNI ya existe", JSON_UNESCAPED_UNICODE);
                die();
            }
    
            // Inserta el nuevo cliente en la base de datos
            $data = $this->model->registrarCliente($dni, $nombre, $telefono, $direccion, $clave); // Sin hashing
            if ($data == "ok") {
                echo json_encode("ok", JSON_UNESCAPED_UNICODE);
            } else {
                echo json_encode("Error al registrar el cliente", JSON_UNESCAPED_UNICODE);
            }
        } else { // Modificar cliente existente
            $data = $this->model->modificarCliente($dni, $nombre, $telefono, $direccion, $id);
            if ($data == "modificado") {
                echo json_encode("modificado", JSON_UNESCAPED_UNICODE);
            } else {
                echo json_encode("Error al modificar el cliente", JSON_UNESCAPED_UNICODE);
            }
        }
    
        die();
    }
       
    public function editar( int $id){
        
        $data = $this->model->editarCliente($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function eliminar(int $id) {
        $data = $this->model->accionCliente(0 , $id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al eliminar el Cliente";  // Se agregó el punto y coma aquí
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }

    public function reingresar(int $id) {
        $data = $this->model->accionCliente(1,$id);
        if ($data == 1) {
            $msg = "ok";
        } else {
            $msg = "Error al Reingresar el Cliente";  // Se agregó el punto y coma aquí
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }    
}

?>