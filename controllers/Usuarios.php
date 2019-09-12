<?php

class Usuarios extends ControllerBase {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        return $this->view->render('usuarios/index');
    }

    public function crear(){
        return $this->view->render('usuarios/crear');
    }

}

?>