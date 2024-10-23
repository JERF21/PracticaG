<?php
require_once "conexion.php";
class ModeloPrestamos{
    public static function index($tabla){
        $stmt=Conexion::conectar()->prepare("select * from $tabla");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$stmt->close();
        //$stmt->null;
    }
    public static function indexID($id,$tabla){
        $stmt=Conexion::conectar()->prepare("select * from $tabla where id_prestamo='$id'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$stmt->close();
        //$stmt->null;
    }
    public static function create($datos){
        $cliente=$datos["cliente"];
        $libro=$datos["libro"];
        $fecha_devolucion=$datos["fecha_devolucion"];
        // $estado=$datos["estado"];
        $stmt=Conexion::conectar()->prepare("insert into prestamo(cliente,libro,fecha_devolucion) values('$cliente','$libro','$fecha_devolucion')");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
        //$stmt->close();
        //$stmt->null;
    }

    public static function delete($id){
        $stmt=Conexion::conectar()->prepare("DELETE FROM prestamo WHERE id_prestamo = '$id'");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public static function update($id,$datos){
        $cliente=$datos["cliente"];
        $libro=$datos["libro"];
        $fecha_devolucion=$datos["fecha_devolucion"];
        $estado=$datos["estado"];
        $stmt=Conexion::conectar()->prepare("update prestamo set cliente='$cliente',libro='$libro',fecha_devolucion='$fecha_devolucion',estado='$estado' where id_prestamo=$id");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

}
?>