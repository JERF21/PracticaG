<?php
require_once "conexion.php";
class ModeloPrestamoV{

static public function mdlInfoPrestamos(){
        $stmt=ConexionV::conectar()->prepare("select * from prestamo");
        $stmt->execute();

        return $stmt->fetchAll();

  /*       $stmt->close();
        $stmt->null;  */
        
}

    
static public function mdlRegPrestamo($data){

    $clientePrestamo=$data["clientePrestamo"];
    $libroPrestamo=$data["libroPrestamo"];
    $fechapPrestamo=$data["fechapPrestamo"];
    $fechadPrestamo=$data["fechadPrestamo"];
    $estadoPrestamo=$data["estadoPrestamo"];


    $stmt=ConexionV::conectar()->prepare("insert into prestamo(cliente, libro,
     fecha_prestamo, fecha_devolucion, estado) 
    values('$clientePrestamo', '$libroPrestamo', '$fechapPrestamo', '$fechadPrestamo', '$estadoPrestamo')");

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

static public function mdlInfoPrestamo($id){
        $stmt=ConexionV::conectar()->prepare("select * from prestamo where id_prestamo=$id");
        $stmt->execute();

        return $stmt->fetch();

  /*   $stmt->close();
        $stmt->null; */ 
}

static public function mdlEditPrestamo($data){

    $id=$data["id"];
    $clientePrestamo=$data["clientePrestamo"];
    $libroPrestamo=$data["libroPrestamo"];
    $fechapPrestamo=$data["fechapPrestamo"];
    $fechadPrestamo=$data["fechadPrestamo"];
    $estadoPrestamo=$data["estadoPrestamo"];


    $stmt=ConexionV::conectar()->prepare("update prestamo set cliente='$clientePrestamo',
    libro='$libroPrestamo', fecha_prestamo='$fechapPrestamo', fecha_devolucion='$fechadPrestamo',
    estado='$estadoPrestamo' where id_prestamo=$id");

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

static public function mdlEliPrestamo($id){

    $stmt=ConexionV::conectar()->prepare("delete from prestamo where id_prestamo=$id");

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

static public function mdlBusPrestamo($id){
    $stmt=ConexionV::conectar()->prepare("select * from prestamo where id_prestamo='$id'");
    $stmt->execute();

    return $stmt->fetch();

    /*   $stmt->close();
    $stmt->null; */ 
}

static public function mdlCantidadPrestamos(){
    $stmt=ConexionV::conectar()->prepare("select count(*) as prestamo from prestamo");
    $stmt->execute();

    return $stmt->fetch();

    /*   $stmt->close();
    $stmt->null; */ 
}
}//final