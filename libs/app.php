<?php

require_once 'controllers/ErrorController.php';

class App {

    function __construct(){

        $url = isset($_GET['url']) ? $_GET['url']: null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        // var_dump($url);

        if (empty($url[0])){
            $archivoController = 'controllers/mainController.php';
            require_once $archivoController;
            $controller = new MainController();
            $controller->index();
            return false;
        }

        $archivoController = 'controllers/'. $url[0] .'Controller.php';

        if(file_exists($archivoController)){
            require_once $archivoController;
            $controllerName = $url[0].'Controller';
            $controller = new $controllerName();

            if (isset($url[1])){
                $controller->{$url[1]}();
            } else{
                if (method_exists($controller, 'index')){
                    $controller->index();
                } else {
                    $controller = new ErrorController();
                }
            }

        } else{
            $controller = new ErrorController();
        }

    }

}

?>