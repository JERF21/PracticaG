<?php
require_once "conexion.php";
class ModeloGeneroV{

static public function mdlInfoGeneros(){
        $stmt=ConexionV::conectar()->prepare("select * from genero");
        $stmt->execute();

        return $stmt->fetchAll();

  /*       $stmt->close();
        $stmt->null;  */
        
}

    
static public function mdlRegGenero($data){
    $nombreGenero=$data["nombreGenero"];
    $descripcionGenero=$data["descripcionGenero"];

    $stmt=ConexionV::conectar()->prepare("insert into genero(nombre, descripcion) 
    values('$nombreGenero', '$descripcionGenero')");

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

static public function mdlInfoGenero($id){
        $stmt=ConexionV::conectar()->prepare("select * from genero where id_genero=$id");
        $stmt->execute();

        return $stmt->fetch();

  /*   $stmt->close();
        $stmt->null; */ 
}

static public function mdlEditGenero($data){

    $id=$data["idGenero"];
    $nombreGenero=$data["nombreGenero"];
    $descripcionGenero=$data["descripcionGenero"];


    $stmt=ConexionV::conectar()->prepare("update genero set nombre='$nombreGenero',
    descripcion='$descripcionGenero'
    where id_genero=$id");

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

static public function mdlEliGenero($id){

    $stmt=ConexionV::conectar()->prepare("delete from genero where id_genero=$id");

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

static public function mdlBusGenero($cod){
    $stmt=ConexionV::conectar()->prepare("select * from genero where cod_genero='$cod'");
    $stmt->execute();

    return $stmt->fetch();

    /*   $stmt->close();
    $stmt->null; */ 
}

static public function mdlCantidadGeneros(){
    $stmt=ConexionV::conectar()->prepare("select count(*) as genero from genero");
    $stmt->execute();

    return $stmt->fetch();

    /*   $stmt->close();
    $stmt->null; */ 
}
}//final