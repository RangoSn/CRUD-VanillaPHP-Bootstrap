<form method="POST" action="">
    <div class="mb-3">
        <label for="name" class="form-label">Nombre de usuario</label>
        <input type="text" class="form-control" name="rName" id="nameUser">
    </div>
    <div class="mb-3">
        <label for="email" name="rEmail" class="form-label">Email de usuario</label>
        <input type="email" class="form-control" name="rEmail" id="email" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="password" name="rPass" class="form-label">Password</label>
        <input type="password" class="form-control" name="rPass" id="inputPassword">
    </div>
    <?php
    $createUser = UserController::ctrCreateUsers(); 
    if ($createUser == "ok") {
        echo '<script>
              if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
              }
            </script>';
        echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
    }else if ($createUser == "error"){
        echo '<script>
              if(window.history.replaceState){
                window.history.replaceState(null, null, window.location.href);
                <div class="alert alert-danger">No se permiten caracteres especiales</div>
              }
            </script>';         
    }
    ?>
    <button type="submit" class="btn btn-primary">Guardar usuario</button>

</form>