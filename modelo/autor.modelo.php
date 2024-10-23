<?php
require_once "conexion.php";
class ModeloAutor{
    public static function index($tabla){
        $stmt=Conexion::conectar()->prepare("select * from $tabla");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$stmt->close();
        //$stmt->null;
    }
    public static function indexId($id,$tabla){
        $stmt=Conexion::conectar()->prepare("select * from $tabla where id_autor='$id'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$stmt->close();
        //$stmt->null;
    }
    public static function create($datos){
        $nombre=$datos["nombre"];
        $apellido=$datos["apellido"];
        $nacionalidad=$datos["nacionalidad"];
        $fecha_nacimiento=$datos["fecha_nacimiento"];
        $biografia=$datos["biografia"];
        $imagen_autor=$datos["imagen_autor"];
        $stmt=Conexion::conectar()->prepare("insert into autor(nombre,apellido,nacionalidad,fecha_nacimiento,biografia,imagen_autor) values('$nombre','$apellido','$nacionalidad','$fecha_nacimiento','$biografia','$imagen_autor')");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
        //$stmt->close();
        //$stmt->null;
    }

    public static function delete($id){
        $stmt=Conexion::conectar()->prepare("DELETE FROM autor WHERE id_autor = '$id'");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public static function update($id,$datos){
        $nombre=$datos["nombre"];
        $apellido=$datos["apellido"];
        $nacionalidad=$datos["nacionalidad"];
        $fecha_nacimiento=$datos["fecha_nacimiento"];
        $biografia=$datos["biografia"];
        $imagen_autor=$datos["imagen_autor"];
        $stmt=Conexion::conectar()->prepare("update autor set nombre='$nombre',apellido='$apellido',nacionalidad='$nacionalidad',fecha_nacimiento='$fecha_nacimiento',biografia='$biografia',imagen_autor='$imagen_autor' where id_autor=$id");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

}
?>