<?php
require_once "conexion.php";
class ModelolLibroV{

static public function mdlInfoLibros(){
        $stmt=ConexionV::conectar()->prepare("select * from libro");
        $stmt->execute();

        return $stmt->fetchAll();

  /*       $stmt->close();
        $stmt->null;  */
        
}

    
static public function mdlRegLibro($data){
    $tituloLibro=$data["tituloLibro"];
    $autorLibro=$data["autorLibro"];
    $generoLibro=$data["generoLibro"];
    $sinopsisLibro=$data["sinopsisLibro"];
    $fechaLibro=$data["fechaLibro"];
    $editorialLibro=$data["editorialLibro"];
    $paginasLibro=$data["paginasLibro"];
    $stockLibro=$data["stockLibro"];
    $imgLibro=$data["imgLibro"];

    $stmt=ConexionV::conectar()->prepare("insert into libro(titulo, autor,
     genero, sinopsis, fecha_publicacion, editorial, numero_paginas, stock, imagen_libro) 
    values('$tituloLibro', '$autorLibro', '$generoLibro', '$sinopsisLibro', '$fechaLibro',
     '$editorialLibro', '$paginasLibro', '$stockLibro',
    '$imgLibro')");

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

static public function mdlInfoLibro($id){
        $stmt=ConexionV::conectar()->prepare("select * from libro where id_libro=$id");
        $stmt->execute();

        return $stmt->fetch();

  /*   $stmt->close();
        $stmt->null; */ 
}

static public function mdlEditLibro($data){

    $id=$data["id"];
    $tituloLibro=$data["tituloLibro"];
    $autorLibro=$data["autorLibro"];
    $generoLibro=$data["generoLibro"];
    $sinopsisLibro=$data["sinopsisLibro"];
    $fechaLibro=$data["fechaLibro"];
    $editorialLibro=$data["editorialLibro"];
    $paginasLibro=$data["paginasLibro"];
    $stockLibro=$data["stockLibro"];
    $imgLibro=$data["imgLibro"];


    $stmt=ConexionV::conectar()->prepare("update libro set titulo='$tituloLibro',
    autor='$autorLibro', genero='$generoLibro', sinopsis='$sinopsisLibro',
    fecha_publicacion='$fechaLibro', editorial='$editorialLibro', numero_paginas='$paginasLibro',
    stock='$stockLibro', imagen_libro='$imgLibro'
    where id_libro=$id");

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

static public function mdlEliLibro($id){

    $stmt=ConexionV::conectar()->prepare("delete from libro where id_libro=$id");

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

static public function mdlBusLibro($cod){
    $stmt=ConexionV::conectar()->prepare("select * from libro where cod_libro='$cod'");
    $stmt->execute();

    return $stmt->fetch();

    /*   $stmt->close();
    $stmt->null; */ 
}

static public function mdlCantidadLibros(){
    $stmt=ConexionV::conectar()->prepare("select count(*) as libro from libro");
    $stmt->execute();

    return $stmt->fetch();

    /*   $stmt->close();
    $stmt->null; */ 
}
}//final