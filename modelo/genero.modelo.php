<?php
require_once "conexion.php";
class ModeloGeneros{
    public static function index($tabla){
        $stmt=Conexion::conectar()->prepare("select * from $tabla");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$stmt->close();
        //$stmt->null;
    }
    public static function indexId($id,$tabla){
        $stmt=Conexion::conectar()->prepare("select * from $tabla where id_genero='$id'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$stmt->close();
        //$stmt->null;
    }
    public static function create($datos){
        $nombre=$datos["nombre"];
        $descripcion=$datos["descripcion"];
        $stmt=Conexion::conectar()->prepare("insert into genero(nombre,descripcion) values('$nombre','$descripcion')");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
        //$stmt->close();
        //$stmt->null;
    }

    public static function delete($id){
        $stmt=Conexion::conectar()->prepare("DELETE FROM genero WHERE id_genero = '$id'");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public static function update($id,$datos){
        $nombre=$datos["nombre"];
        $descripcion=$datos["descripcion"];
        $stmt=Conexion::conectar()->prepare("update genero set nombre='$nombre',descripcion='$descripcion' where id_genero=$id");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

}
?>