<?php
require_once "conexion.php";
class ModeloAutorV{

static public function mdlInfoAutors(){
        $stmt=ConexionV::conectar()->prepare("select * from autor");
        $stmt->execute();

        return $stmt->fetchAll();

  /*       $stmt->close();
        $stmt->null;  */
        
}

    
static public function mdlRegAutor($data){
    $nombreAutor=$data["nombreAutor"];
    $apellidoAutor=$data["apellidoAutor"];
    $nacionalidadAutor=$data["nacionalidadAutor"];
    $nacimientoAutor=$data["nacimientoAutor"];
    $biografiaAutor=$data["biografiaAutor"];
    $imgAutor=$data["imgAutor"];

    $stmt=ConexionV::conectar()->prepare("insert into autor(nombre, apellido,
     nacionalidad, fecha_nacimiento, biografia, imagen_autor) 
    values('$nombreAutor', '$apellidoAutor', '$nacionalidadAutor', '$nacimientoAutor', '$biografiaAutor',
    '$imgAutor')");

        if($stmt->execute()){
            return "ok";
        }
        else{
            return "error";
        }

  /*       $stmt->close();
        $stmt->null();
 */

}

static public function mdlInfoAutor($id){
        $stmt=ConexionV::conectar()->prepare("select * from autor where id_autor=$id");
        $stmt->execute();

        return $stmt->fetch();

  /*   $stmt->close();
        $stmt->null; */ 
}

static public function mdlEditAutor($data){

    $id=$data["id"];
    $nombreAutor=$data["nombreAutor"];
    $apellidoAutor=$data["apellidoAutor"];
    $nacionalidadAutor=$data["nacionalidadAutor"];
    $nacimientoAutor=$data["nacimientoAutor"];
    $biografiaAutor=$data["biografiaAutor"];
    $imgAutor=$data["imgAutor"];


    $stmt=ConexionV::conectar()->prepare("update autor set nombre='$nombreAutor',
    apellido='$apellidoAutor', nacionalidad='$nacionalidadAutor', fecha_nacimiento='$nacimientoAutor',
    biografia='$biografiaAutor', imagen_autor='$imgAutor'
    where id_autor=$id");

        if($stmt->execute()){
            return "ok";
        }
        else{
            return "error";
        }
    /* 
        $stmt->close();
        $stmt->null();
    */
}

static public function mdlEliAutor($id){

    $stmt=ConexionV::conectar()->prepare("delete from autor where id_autor=$id");

    if($stmt->execute()){
        return "ok";
    }
    else{
        return "error";
    }
    /* 
    $stmt->close();
    $stmt->null();
    */

}

static public function mdlBusAutor($id){
    $stmt=ConexionV::conectar()->prepare("select * from autor where id_autor='$id'");
    $stmt->execute();

    return $stmt->fetch();

    /*   $stmt->close();
    $stmt->null; */ 
}

static public function mdlCantidadAutors(){
    $stmt=ConexionV::conectar()->prepare("select count(*) as autor from autor");
    $stmt->execute();

    return $stmt->fetch();

    /*   $stmt->close();
    $stmt->null; */ 
}
}//final