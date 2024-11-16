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
}
?>