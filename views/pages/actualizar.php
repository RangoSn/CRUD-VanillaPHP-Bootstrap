<?php
$item = "id_user";
$valor = $_GET["id"];

$users = UserController::ctrGetUsers($item, $valor);

?>
<form method="POST" action="">
    <div class="mb-3">
        <label for="name" class="form-label">Nombre de usuario</label>
        <input type="text" class="form-control" name="uName" id="nameUser" value="<?php echo $users["nombre"]?>">
    </div>
    <div class="mb-3">
        <label for="email" name="uEmail" class="form-label">Email de usuario</label>
        <input type="email" class="form-control" name="uEmail" id="email" aria-describedby="emailHelp" value="<?php echo $users["correo"]?>">
    </div>
    <div class="mb-3">
        <label for="password" name="uPass" class="form-label">Password</label>
        <input type="password" class="form-control" name="uPass" value="<?php echo $users["password"]?>">
        <input type="hidden" class="form-control" name="uUser" value="<?php echo $valor?>">        
    </div>
    <?php
    $updateUser = UserController::ctrUpdateUsers();     
    if ($updateUser == "ok") {
        echo '<script>
              if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
              }
              window.location.reload();
            </script>';        
    }else if ($updateUser == "error"){
        echo '<script>
              if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
                <div class="alert alert-danger">No se permiten caracteres especiales</div>
              }
            </script>';         
    }
    ?>
    <button type="submit" class="btn btn-primary">Actualizar usuario</button>

</form>