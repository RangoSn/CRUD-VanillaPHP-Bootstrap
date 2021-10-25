<?php
$users = UserController::ctrGetUsers(null, null);
?>
<table class="table">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">nombre</th>
            <th scope="col">email</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user => $value) : ?>
            <tr>
                <td scope='row'><?php echo $value["id_user"]; ?></td>
                <td><?php echo $value["nombre"]; ?></td>
                <td><?php echo $value["correo"]; ?></td>
                <td><?php echo $value["correo"]; ?></td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="index.php?pagina=editar&id=<?php echo $value["id_user"];?>" class="btn btn-warning">Editar</a>
                    <form action="" method="post">
                    <input type="hidden" class="form-control" name="uUser" value="<?php echo $value["id_user"]?>">
                    <button type="submit" class="btn btn-danger">Eliminar</button>                        
                    <?php
                    $eliminarUsuario = UserController::ctrDeleteUsers();
                    if ($eliminarUsuario == "ok") {
                        echo '<script>
                              if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                              }
                              window.location.reload();
                            </script>';        
                    }else if ($eliminarUsuario == "error"){
                        echo '<script>
                              if(window.history.replaceState){
                                window.history.replaceState(null, null, window.location.href);
                                <div class="alert alert-danger">Error al eliminar usuario</div>
                              }
                            </script>';         
                    }
                    ?>
                    </form>                    
                    </div>
                </td>
            </tr>
        <?php endforeach ?>

    </tbody>
</table>