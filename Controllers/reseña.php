<?php
class reseña extends Controller {
    private $model;

    public function __construct() {
        session_start();
        parent::__construct(); 
        $this->model = $this->reseñaModel; // Usando la propiedad dinámica
        if ($this->model == null) {
            echo "Modelo no cargado correctamente.";
            die();  
        }
    }

    public function index() {
        $this->views->getView($this, "index");
    }

    public function registrarReseña() {
        header('Content-Type: application/json');
    
        $input = json_decode(file_get_contents('php://input'), true);
    
        if (!$input) {
            echo json_encode(["success" => false, "message" => "Datos no válidos o solicitud vacía"], JSON_UNESCAPED_UNICODE);
            exit;
        }
    
        $comentario = $input['comentario'] ?? '';
        $calificacion = $input['calificacion'] ?? '';
        $dni = $input['dni'] ?? '';
    
        if (empty($comentario)) {
            echo json_encode(["success" => false, "message" => "El comentario no puede estar vacío"], JSON_UNESCAPED_UNICODE);
            exit;
        }
    
        if (empty($calificacion) || $calificacion < 1 || $calificacion > 5) {
            echo json_encode(["success" => false, "message" => "La calificación debe estar entre 1 y 5"], JSON_UNESCAPED_UNICODE);
            exit;
        }
    
        if (empty($dni) || strlen($dni) !== 10 || !ctype_digit($dni)) {
            echo json_encode(["success" => false, "message" => "El DNI debe tener 10 dígitos numéricos"], JSON_UNESCAPED_UNICODE);
            exit;
        }
    
        $fecha_subida = date('Y-m-d H:i:s');
    
        try {
            $resultado = $this->model->registrarReseña($fecha_subida, $comentario, $calificacion, $dni);
    
            if ($resultado === "ok") {
                echo json_encode(["success" => true, "message" => "Reseña registrada exitosamente"], JSON_UNESCAPED_UNICODE);
            } else {
                throw new Exception("Error al registrar la reseña en la base de datos");
            }
        } catch (Exception $e) {
            echo json_encode(["success" => false, "message" => $e->getMessage()], JSON_UNESCAPED_UNICODE);
        }
        die();
    }
    
    public function listarReseñas() {
        // Obtener las reseñas desde el modelo
        $data = $this->model->getReseñasCliente();
        
        // Procesar los datos para agregar las acciones
        for ($i = 0; $i < count($data); $i++) {
            // Generar las acciones con estructura HTML válida
            $data[$i]['acciones'] = '<div> 
                <button class="btn btn-warning btn-sm" onclick="editarReseña(' . $data[$i]['id'] . ')">Editar</button>
                <button class="btn btn-danger btn-sm" onclick="eliminarReseña(' . $data[$i]['id'] . ')">Eliminar</button>
            </div>';
        }
    
        // Devolver los datos en formato JSON limpio
        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        die();
    }
    
    public function editarResena(int $id) {
        // Obtener los datos de la reseña, incluyendo el DNI
        $data = $this->model->obtenerResenaPorId($id);
    
        // Si no existe la reseña, devolver un error en formato JSON
        if (!$data) {
            echo json_encode(["error" => "No existe reseña con ese ID"], JSON_UNESCAPED_UNICODE);
        } else {
            echo json_encode($data, JSON_UNESCAPED_UNICODE); // Ahora incluye DNI en los datos
        }
        die();
    }
    
    public function modificar() {
        $id = $_POST['id'];
        $comentario = $_POST['comentario'];
        $calificacion = $_POST['calificacion'];        
        if (!empty($id) && !empty($comentario) && !empty($calificacion)) {
            // Llamamos al modelo para actualizar la reseña
            $result = $this->model->actualizarResena($comentario, $calificacion, $id);
            
            if ($result) {
                echo "modificado";
            } else {
                echo "error";
            }
        } else {
            echo "error";
        }
        die();
    }
    
    public function eliminar() {
        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $id = $_POST['id'];
            
            // Llamamos al modelo para eliminar la reseña
            $result = $this->model->eliminarResena($id);
            
            if ($result) {
                echo "eliminado";
            } else {
                echo "error";
            }
        } else {
            echo "error";
        }
        die();
    }
    
    
    
    
    
    
    
    
}
?>