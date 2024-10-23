<?php
require_once "conexion.php";
class ModeloClientes{
    public static function index($tabla){
        $stmt=Conexion::conectar()->prepare("select * from $tabla");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$stmt->close();
        //$stmt->null;
    }
    public static function indexId($id,$tabla){
        $stmt=Conexion::conectar()->prepare("select * from $tabla where id_cliente='$id'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$stmt->close();
        //$stmt->null;
    }
    public static function create($datos){
        $nombre=$datos["nombre"];
        $apellido=$datos["apellido"];
        $email=$datos["email"];
        $telefono=$datos["telefono"];
        $direccion=$datos["direccion"];
        $imagen_cliente=$datos["imagen_cliente"];
        $stmt=Conexion::conectar()->prepare("insert into cliente(nombre,apellido,email,telefono,direccion,imagen_cliente) values('$nombre','$apellido','$email','$telefono','$direccion','$imagen_cliente')");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
        //$stmt->close();
        //$stmt->null;
    }

    public static function delete($id){
        $stmt=Conexion::conectar()->prepare("DELETE FROM cliente WHERE id_cliente = '$id'");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public static function update($id,$datos){
        $nombre=$datos["nombre"];
        $apellido=$datos["apellido"];
        $email=$datos["email"];
        $telefono=$datos["telefono"];
        $direccion=$datos["direccion"];
        $imagen_cliente=$datos["imagen_cliente"];
        $stmt=Conexion::conectar()->prepare("update cliente set nombre='$nombre',apellido='$apellido',email='$email',telefono='$telefono',direccion='$direccion',imagen_cliente='$imagen_cliente' where id_cliente=$id");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

}
?>