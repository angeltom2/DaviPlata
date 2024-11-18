
<?php
class VistaClientes extends Controller {

    private $model;

    public function __construct() {
        session_start();
        parent::__construct(); 
        $this->model = $this->VistaClientesModel; // Usando la propiedad dinámica
        if ($this->model == null) {
            echo "Modelo no cargado correctamente.";
            die();  
        }
    }

    public function index() {
        $this->views->getView($this, "index");
    }

    public function cambiarPass() {
        // Verificar si la sesión está activa y el ID del cliente está definido
        if (!isset($_SESSION['id_usuario'])) {
            echo json_encode("No se ha iniciado sesión", JSON_UNESCAPED_UNICODE);
            die(); // Detener la ejecución si no hay sesión activa
        }
    
        // Obtener las variables POST
        $actual = $_POST['clave_actual'];
        $nueva = $_POST['clave_nueva'];
        $confirmar = $_POST['confirmar_clave'];
    
        // Validar campos vacíos
        if (empty($actual) || empty($nueva) || empty($confirmar)) {
            echo json_encode("Todos los campos son obligatorios", JSON_UNESCAPED_UNICODE);
            die(); // Detener la ejecución si algún campo está vacío
        }
    
        // Validar coincidencia de contraseñas
        if ($nueva != $confirmar) {
            echo json_encode("Las contraseñas no coinciden", JSON_UNESCAPED_UNICODE);
            die(); // Detener la ejecución si las contraseñas no coinciden
        }
    
        // Obtener el ID del cliente desde la sesión
        $id = $_SESSION['id_usuario']; // Asegúrate de que el ID esté en la sesión
    
        // Verificar que el ID no sea inválido
        if ($id === null || $id === '') {
            echo json_encode("ID de cliente inválido", JSON_UNESCAPED_UNICODE);
            die(); // Detener la ejecución si el ID es inválido
        }
    
        // Obtener los datos del cliente
        $data = $this->model->getClienteById($id);
    
        // Verificar que se haya encontrado al cliente
        if (!$data) {
            echo json_encode("Cliente no encontrado", JSON_UNESCAPED_UNICODE);
            die(); // Detener la ejecución si no se encuentra el cliente
        }
    
        // Validar contraseña actual
        if ($actual == $data['clave']) { // Compara directamente sin hash
            // Modificar la contraseña
            $verificar = $this->model->modificarPass($nueva, $id);
            
            // Verificar si la modificación fue exitosa
            if ($verificar == 1) {
                echo json_encode("ok", JSON_UNESCAPED_UNICODE);
            } else {
                echo json_encode("Error al modificar la contraseña", JSON_UNESCAPED_UNICODE);
            }
        } else {
            echo json_encode("La contraseña actual es incorrecta", JSON_UNESCAPED_UNICODE);
        }
    }
    
    
    
    

}
?>























