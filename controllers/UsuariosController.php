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
        
        
        if($this->verify()){
            $this->view->mensaje = array("texto" => "El nombre, correo y password son obligatorios, verifique sus datos.", "tipo" => "danger");
            return $this->view->render('usuarios/crear');
        }
        
        $request = [
            'nombre' => $_POST['nombre'],
            'correo' => $_POST['correo'],
            'password' => $_POST['password'],
        ];

        $this->model->save($request);

        $this->view->mensaje = array("texto" => "Usuario agregado.", "tipo" => "success");
        header('Location: '.constant('URL').'usuarios');
        exit();
    }

    public function detalle($param = null){
        $id = $param[0];
        $user = $this->model->getById($id);
        $this->view->user = $user;
        $this->view->render('usuarios/detalle');
        exit();
    }

    public function editar($param = null){
        $id = $param[0];
        $user = $this->model->getById($id);
        $this->view->user = $user;
        $this->view->render('usuarios/editar');
        exit();
    }

    public function update($params = null){
        $id = $params[0];

        if($this->verifyUpdate($id)){
            $this->view->mensaje = array("texto" => "No se pudo actulizar el usuario, verifique sus datos.", "tipo" => "danger");
            return $this->editar([$id]);
        }

        $request = [
            'id'        => $id,
            'nombre'    => $_POST['nombre'],
            'correo'    => $_POST['correo'],
            'password'  => $_POST['password'],
        ];

        $user = $this->model->update($request);

        header('Location: '.constant('URL').'usuarios');
        exit();
    }

    public function delete($params = null){
        $id = $params[0];

        $flag = $this->model->delete($id);
        
        echo json_encode(array("delete" => $flag));
        exit();
    }

    private function verify()
    {
      return empty($_POST['nombre']) OR empty($_POST['correo']) OR empty($_POST['password']);
    }

    private function verifyUpdate($id)
    {
      return empty($_POST['nombre']) OR empty($_POST['correo']) OR empty($_POST['password']) OR empty($id);
    }

}

?>