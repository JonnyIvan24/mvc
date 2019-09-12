<?php

class UsuariosController extends ControllerBase {

    public function __construct(){
        parent::__construct();
        $this->loadModel('usuarios');
    }

    public function index(){
        return $this->view->render('usuarios/index');
    }

    public function crear(){
        return $this->view->render('usuarios/crear');
    }

    public function store(){
        $this->model->insert();
    }

}

?>