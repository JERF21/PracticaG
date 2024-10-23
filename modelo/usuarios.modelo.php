<?php
require_once "conexion.php";
class ModeloUsuarios{
    public static function index($tabla){
        $stmt=Conexion::conectar()->prepare("select * from $tabla");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$stmt->close();
        //$stmt->null;
    }
    public static function indexId($id,$tabla){
        $stmt=Conexion::conectar()->prepare("select * from $tabla where id_usuario= '$id'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$stmt->close();
        //$stmt->null;
    }
    public static function create($datos){
        $login_usuario=$datos["login_usuario"];
        $password=$datos["password"];
        $perfil=$datos["perfil"];
        // $ultimo_login=$datos["ultimo_login"];

        // $stmt=Conexion::conectar()->prepare("insert into usuario(login_usuario,password,perfil,ultimo_login) values('$login_usuario','$password','$perfil','$ultimo_login')");
        $stmt=Conexion::conectar()->prepare("insert into usuario(login_usuario,password,perfil) values('$login_usuario','$password','$perfil')");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$stmt->close();
        //$stmt->null;
    }

    public static function delete($id){
        $stmt=Conexion::conectar()->prepare("DELETE FROM usuario WHERE id_usuario = '$id'");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public static function update($id,$datos){
        $login_usuario=$datos["login_usuario"];
        $password=$datos["password"];
        $perfil=$datos["perfil"];
        $estado=$datos["estado"];
        $stmt=Conexion::conectar()->prepare("update usuario set login_usuario='$login_usuario',password='$password',perfil='$perfil',estado='$estado' where id_usuario=$id");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>