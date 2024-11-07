<?php
class Controller {
    private $modelInstances = [];

    public function __construct() {
        $this->CargarModelo();
        $this->views = new Views();
    }

    // Cargar el modelo y almacenarlo dinámicamente
    public function CargarModelo() {
        $model = get_class($this)."Model";
        $ruta = "Models/".$model.".php";  

        if (file_exists($ruta)) {
            require_once $ruta;
            // Asignar la instancia del modelo a la propiedad dinámica de forma controlada
            $this->modelInstances[$model] = new $model();
        }
    }

    // Método mágico __get para obtener la instancia del modelo dinámicamente
    public function __get($name) {
        if (isset($this->modelInstances[$name])) {
            return $this->modelInstances[$name];
        }
        return null;
    }

    // Método mágico __set para establecer la instancia del modelo
    public function __set($name, $value) {
        $this->modelInstances[$name] = $value;
    }
}

?>

