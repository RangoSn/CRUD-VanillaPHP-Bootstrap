<?php
require_once "models/usuario.model.php";
class UserController{
    //C
    static public function ctrCreateUsers()
    {
        if (isset($_POST["rName"])) {
            if (preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $_POST["rName"]) && 
				preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["rEmail"]) && 
				preg_match('/^[0-9a-zA-Z]+$/', $_POST["rPass"])) {
                    $tabla="usuarios";
                    $data = array(
                        "nombre" => $_POST["rName"],
                        "correo" => $_POST["rEmail"],
                        "password" => $_POST["rPass"],                                                
                    );
                    $response = UsuarioModel::mdlCreateUser($tabla, $data);
                    return $response;                
                }else{
                    return "error";
                }
        }else{
            return "error";
        }
        
    }
    //R
    static public function ctrGetUsers($item, $valor)
    {
        $tabla="usuarios";
        $response = UsuarioModel::mdlGetUsers($tabla, $item, $valor);
        return $response;
    }
    //U
    static public function ctrUpdateUsers()
    {
        if (isset($_POST["uName"])) {
            if (preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $_POST["uName"]) && 
				preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["uEmail"]) && 
				preg_match('/^[0-9a-zA-Z]+$/', $_POST["uPass"])) {
                    $tabla="usuarios";
                    $data = array(
                        "id_user" => $_POST["uUser"], 
                        "nombre" => $_POST["uName"],
                        "correo" => $_POST["uEmail"],
                        "password" => $_POST["uPass"],                                                
                    );
                    $response = UsuarioModel::mdlUpdateUser($tabla, $data);
                    return $response;                
                }else{
                    return "error";
                }
        }else{
            return "error";
        }        
    }
    //D
    static public function ctrDeleteUsers()
    {
        if (isset($_POST["uUser"])) {
            $tabla="usuarios";
            $response = UsuarioModel::mdlDeleteUser($tabla,$_POST["uUser"]);
            return $response;
        }
    }
    
}