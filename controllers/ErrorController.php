<?php

class ErrorController extends ControllerBase {

    public function __construct(){
        parent::__construct();
        $this->view->mensaje = "Error al cargar la página, verifica tu url.";
        $this->view->render('error/index');
    }
}

?>