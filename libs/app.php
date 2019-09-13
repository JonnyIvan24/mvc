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

            $nparam = sizeof($url);

            if($nparam > 1){
                if($nparam >2){
                    $param = [];
                    for($i=2;$i<$nparam;$i++){
                        array_push($param, $url[$i]);
                    }
                    $controller->{$url[1]}($param);
                }else{
                    $controller->{$url[1]}();
                }
            }else{
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