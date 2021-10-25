<?php
require_once "conection.php";
class UsuarioModel{
    //C
    static public function mdlCreateUser($tabla, $data)
    {
        $stmt = Conexion::Conectar()->prepare("INSERT INTO  $tabla (nombre,correo,password) VALUES (:nombre, :correo, :password)");
        $stmt->bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $data["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $data["password"], PDO::PARAM_INT);        
        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }  
        $stmt = null;      
    }
    //R
    static public function mdlGetUsers($tabla, $item, $valor)
    {
        if ($item == null && $valor == null) {
            $stmt = Conexion::Conectar()->prepare("SELECT * FROM ". $tabla);
            $stmt->execute();
            return $stmt->fetchAll();            
        }else{
            $stmt = Conexion::Conectar()->prepare("SELECT * FROM  $tabla WHERE $item = :valor");
            $stmt->bindParam(":valor", $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch();            
        }
        
    }
    //U
    static public function mdlUpdateUser($tabla, $data)
    {
        $stmt = Conexion::Conectar()->prepare("UPDATE $tabla SET nombre =:nombre,correo=:correo,password=:password WHERE id_user = :id_user");
        $stmt->bindParam(":nombre", $data["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":correo", $data["correo"], PDO::PARAM_STR);
        $stmt->bindParam(":password", $data["password"], PDO::PARAM_INT);     
        $stmt->bindParam(":id_user", $data["id_user"], PDO::PARAM_INT);        
        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }  
        $stmt = null;      
    }
    //D
    static public function mdlDeleteUser($tabla, $id)
    {
        $stmt = Conexion::Conectar()->prepare("DELETE FROM $tabla WHERE id_user = :id_user");
        $stmt->bindParam(":id_user", $id, PDO::PARAM_INT);        
        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }  
        $stmt = null;      
    }
    
}