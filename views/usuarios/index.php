<?php require 'views/layouts/header.php' ?>
    <div class="mr-auto ml-auto col-12">
        <br>
        <br>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-10">
                        <h5 class="card-title">Listado de usuarios</h5>
                    </div>
                    <div class="col-2">
                        <a href="<?php echo constant('URL')?>usuarios/crear"><button class="btn btn-primary">Agregar</button></a>
                    </div>
                </div>
                <br>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col" class="text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($this->usuarios as $usuario){
                        ?>
                            <tr id="<?php echo $usuario->id; ?>">
                                <th scope="row"><?php echo $usuario->id; ?></th>
                                <td><?php echo $usuario->nombre; ?></td>
                                <td><?php echo $usuario->correo; ?></td>
                                <td class="text-right">
                                    <a href="<?php echo constant('URL').'usuarios/detalle/'.$usuario->id; ?>"><button class="btn btn-info">Detalles</button></a>
                                    <a href="<?php echo constant('URL').'usuarios/editar/'.$usuario->id; ?>"><button class="btn btn-success">Editar</button></a>
                                    <!-- <a href="<?php echo constant('URL').'usuarios/delete/'.$usuario->id; ?>"><button class="btn btn-danger">Eliminar</button></a> -->
                                    <button class="btn btn-danger" onclick="deleteElement('<?php echo constant('URL')?>', '<?php echo $usuario->id; ?>')">Eliminar</button>
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

<script>

function deleteElement(urlHost, id) {

    let flag = confirm('¿Está seguro de eliminar el usuario con el id: '+id+'?');

    if(flag){
        fetch(urlHost+'usuarios/delete/'+id).then(function(response) {
            return response.json();
        }).then(function(myJson) {
            console.log(myJson.delete);
            if(myJson.delete){
                document.getElementById(id).innerHTML = "";
            }else{
                alert('No se pudo eliminar el usuario');
            }
    });
    }
}

</script>

<?php require 'views/layouts/footer.php' ?>