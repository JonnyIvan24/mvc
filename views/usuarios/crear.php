<?php require 'views/layouts/header.php' ?>

<div class="mr-auto ml-auto col-8">
    <br>
    <br>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Agregar usuario</h5>    
            <form action="<?php echo constant('URL'); ?>usuarios/store" method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa tu nombre...">
                </div>
                <div class="form-group">
                    <label for="correo">E-mail</label>
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingresa tu e-mail...">
                </div>
                <div class="form-group">
                    <label for="pass">Contraseña</label>
                    <input type="password" class="form-control" id="pass" name="password" placeholder="Ingresa tu contraseña...">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>

<?php require 'views/layouts/footer.php' ?>