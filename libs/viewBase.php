<?php

class ViewBase {

    public function __construct(){
                
    }

    function render($nombre){
        require 'views/'.$nombre.'.php';
    }
}

?>