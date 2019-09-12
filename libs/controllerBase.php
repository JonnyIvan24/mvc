<?php

class ControllerBase {



    public function __construct(){
        
        $this->view = new ViewBase();     
    }

    function loadModel($model){
        $url = 'models/'.$model.'.php';

        if(file_exists($url)){
            require $url;
            $this->model = new $model();
        }
    }

}

?>