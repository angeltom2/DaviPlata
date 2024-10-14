<?php


$configPath = __DIR__ . "/Config\App/config.php";


if (file_exists($configPath)) {
    require_once $configPath;
} else {
    die("El archivo de configuración no se encontró en la ruta: " . $configPath);
}


$ruta = !empty($_GET['url']) ? $_GET['url'] : "home/index";
$array = explode("/", $ruta);

$controller = $array[0];
$metodo = "index";
$parametro = "";

if (!empty($array[1])) {
    if (!empty($array[1] != "")) {
        $metodo = $array[1];
    }
}


if (!empty($array[2])) {
    if (!empty($array[2] != "")) {
        for ($i = 2; $i < count($array); $i++) { 
            $parametro .= $array[$i] . ",";
        }
        $parametro = trim($parametro, ",");
    }
}


$autoloadPath = __DIR__ . "/Config/App/autoload.php";
if (file_exists($autoloadPath)) {
    require_once $autoloadPath;
} else {
    die("El archivo de autoload no se encontró en la ruta: " . $autoloadPath);
}


$dircontrollers = "Controllers/" . $controller . ".php";
if (file_exists($dircontrollers)) {
    require_once $dircontrollers;
    $controller = new $controller();
    if (method_exists($controller, $metodo)) {
        $controller->$metodo($parametro); 
    } else {
        echo "No existe el método";
    }
} else {
    echo "No existe el controlador";
}

?>
