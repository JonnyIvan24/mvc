<?php

class Main extends ControllerBase {

    public function __construct(){
        parent::__construct();
        $this->view->render('main/index');
        // echo "<p>Nuevo controlador main</p>";
    }

    public function saludo(){
        echo "<p>Metodo saludo</p>";
    }

}

?>