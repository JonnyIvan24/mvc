<?php

require_once 'controllers/usuariosController.php'; 

// Custom 404 Handler
$router->set404(function () {
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    require_once('views/error/index.php');
});

$router->get('/', function() { 
    require_once('views/main/index.php');
});

$router->mount('/usuarios', function() use ($router) {

    $router->get('/', function() {
        $usuariosController = new UsuariosController();
        $usuariosController->index();
    });

    $router->get('/crear', function() {
        $usuariosController = new UsuariosController();
        $usuariosController->crear();
    });

    $router->post('/store', function() {
        $usuariosController = new UsuariosController();
        $usuariosController->store();
    });

    $router->get('/detalle/{id}', function($id) {
        $usuariosController = new UsuariosController();
        $usuariosController->detalle($id);
    });

    $router->get('/editar/{id}', function($id) {
        $usuariosController = new UsuariosController();
        $usuariosController->editar($id);
    });

    $router->post('/update/{id}', function($id) {
        $usuariosController = new UsuariosController();
        $usuariosController->update($id);
    });

    $router->get('/delete/{id}', function($id) {
        $usuariosController = new UsuariosController();
        $usuariosController->delete($id);
    });

});

?>
