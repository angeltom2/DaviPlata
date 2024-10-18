<?php

class Views {

    public function getView($controlador, $vista , $data="") {
        $controlador = strtolower(get_class($controlador)); 

        if ($controlador == "home") {
            $vista = "Views/" . $vista . ".php";
        } else {
            $vista = "Views/" . $controlador . "/" . $vista . ".php";
        }

        if (file_exists($vista)) {
            require_once $vista;
        } else {
            echo "Error: la vista '$vista' no fue encontrada.";
        }
    }

}
?>
