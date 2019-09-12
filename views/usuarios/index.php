<?php require 'views/layouts/header.php' ?>
    <div class="mr-auto ml-auto col-12">
        <br>
        <br>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Listado de usuarios</h5>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($this->usuarios as $usuario){
                        ?>
                        <tr>
                            <th scope="row"><?php echo $usuario->id; ?></th>
                            <td><?php echo $usuario->nombre; ?></td>
                            <td><?php echo $usuario->correo; ?></td>
                            <td>
                                <button class="btn btn-info">Detalles</button>
                                <button class="btn btn-success">Editar</button>
                                <button class="btn btn-danger">Eliminar</button>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php require 'views/layouts/footer.php' ?>