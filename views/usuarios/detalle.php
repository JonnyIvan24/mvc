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
            <h5 class="card-title">Detalle del usuario: <?php echo $this->user->nombre; ?></h5>
            <div class="form-group">
                <label for="nombre">ID:</label>
                <p><?php echo $this->user->id; ?></p>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <p><?php echo $this->user->nombre; ?></p>
            </div>
            <div class="form-group">
                <label for="correo">E-mail:</label>
                <p><?php echo $this->user->correo; ?></p>
            </div>
            <a href="<?php echo constant('URL').'usuarios/editar/'.$this->user->id; ?>"><button class="btn btn-success">Editar</button></a>
        </div>
    </div>
</div>

<?php require 'views/layouts/footer.php' ?>