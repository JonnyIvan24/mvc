<?php

class MainController extends ControllerBase {

    public function __construct(){
        parent::__construct();
        // $this->view->render('main/index');
    }

    public function saludo(){
        echo "<p>Metodo saludo</p>";
    }

    public function index(){
        return $this->view->render('main/index');
    }

}

?>