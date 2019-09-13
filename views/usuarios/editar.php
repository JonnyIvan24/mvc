<?php require 'views/layouts/header.php' ?>

<div class="mr-auto ml-auto col-8">
    <br>
    <?php
        if(isset($this->mensaje)){
            $mensaje = $this->mensaje;
    ?>
        <div class="alert alert-<?php echo $mensaje['tipo']; ?> alert-dismissible fade show" role="alert">
            <?php echo $mensaje['texto']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        }
    ?>
    <br>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Agregar usuario</h5>    
            <form action="<?php echo constant('URL'); ?>usuarios/update/<?php echo $this->user->id; ?>" method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el nombre..." value="<?php echo $this->user->nombre; ?>">
                </div>
                <div class="form-group">
                    <label for="correo">E-mail</label>
                    <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingresa el e-mail..." value="<?php echo $this->user->correo; ?>">
                </div>
                <div class="form-group">
                    <label for="pass">Contraseña</label>
                    <input type="password" class="form-control" id="pass" name="password" placeholder="Ingresa la contraseña...">
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>
        </div>
    </div>
</div>

<?php require 'views/layouts/footer.php' ?>