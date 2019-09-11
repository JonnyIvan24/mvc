<?php

class ErrorController extends ControllerBase {

    public function __construct(){
        parent::__construct();
        $this->view->mensaje = "Error al cargar";
        $this->view->render('error/index');
        // echo "<p>Error al cargar recurso</p>";
    }
}

?>