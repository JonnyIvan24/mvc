<?php

class UsuariosController extends ControllerBase {

    public function __construct(){
        parent::__construct();
        $this->loadModel('usuario');
    }

    public function index(){

        $usuarios = $this->model->selectAll();

        $this->view->usuarios = $usuarios;

        return $this->view->render('usuarios/index');
    }

    public function crear(){
        return $this->view->render('usuarios/crear');
    }

    public function store(){
        
        $request = [
            'nombre' => $_POST['nombre'],
            'correo' => $_POST['correo'],
            'password' => $_POST['password'],
        ];

        $this->model->save($request);

        header('Location: '.constant('URL').'usuarios');
    }

}

?>