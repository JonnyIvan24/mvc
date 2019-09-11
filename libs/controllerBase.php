<?php

class ControllerBase {



    public function __construct(){
        echo '<p>Controlador base</p>';
        $this->view = new ViewBase();     
    }
}

?>