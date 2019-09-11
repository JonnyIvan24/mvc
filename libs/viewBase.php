<?php

class ViewBase {

    public function __construct(){
        echo '<p>Vista base</p>';        
    }

    function render($nombre){
        require 'views/'.$nombre.'.php';
    }
}

?>