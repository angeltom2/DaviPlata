<?php
class AdminReseña extends Controller {
    private $model;

    public function __construct() {
        session_start();
        parent::__construct(); 
        $this->model = $this->AdminReseñaModel;     
        if ($this->model == null) {
            echo "Modelo no cargado correctamente.";
            die();  
        }
    }

    public function index() {
        $this->views->getView($this, "index");
    }

    public function listarReseñas() {
        // Obtener todas las reseñas desde el modelo
        $data = $this->model->getReseñas();
    
        // Devolver los datos en formato JSON limpio
        echo json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        die();
    }
    
    


}
?>