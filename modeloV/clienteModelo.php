<?php
require_once "conexion.php";
class ModeloClienteV{

static public function mdlInfoClientes(){
        $stmt=ConexionV::conectar()->prepare("select * from cliente");
        $stmt->execute();

        return $stmt->fetchAll();

  /*       $stmt->close();
        $stmt->null;  */
        
}

    
static public function mdlRegCliente($data){
    $nombreCliente=$data["nombreCliente"];
    $apellidoCliente=$data["apellidoCliente"];
    $emailCliente=$data["emailCliente"];
    $telefonoCliente=$data["telefonoCliente"];
    $direccionCliente=$data["direccionCliente"];
    $imgCliente=$data["imgCliente"];

    $stmt=ConexionV::conectar()->prepare("insert into cliente(nombre, apellido,
     email, telefono, direccion, imagen_cliente) 
    values('$nombreCliente', '$apellidoCliente', '$emailCliente', '$telefonoCliente', '$direccionCliente',
    '$imgCliente')");

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

static public function mdlInfoCliente($id){
        $stmt=ConexionV::conectar()->prepare("select * from cliente where id_cliente=$id");
        $stmt->execute();

        return $stmt->fetch();

  /*   $stmt->close();
        $stmt->null; */ 
}

static public function mdlEditCliente($data){

    $id=$data["id"];
    $nombreCliente=$data["nombreCliente"];
    $apellidoCliente=$data["apellidoCliente"];
    $emailCliente=$data["emailCliente"];
    $telefonoCliente=$data["telefonoCliente"];
    $direccionCliente=$data["direccionCliente"];
    $imgCliente=$data["imgCliente"];


    $stmt=ConexionV::conectar()->prepare("update cliente set nombre='$nombreCliente',
    apellido='$apellidoCliente', email='$emailCliente', telefono='$telefonoCliente',
    direccion='$direccionCliente', imagen_cliente='$imgCliente'
    where id_cliente=$id");

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

static public function mdlEliCliente($id){

    $stmt=ConexionV::conectar()->prepare("delete from cliente where id_cliente=$id");

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

static public function mdlBusCliente($cod){
    $stmt=ConexionV::conectar()->prepare("select * from cliente where cod_cliente='$cod'");
    $stmt->execute();

    return $stmt->fetch();

    /*   $stmt->close();
    $stmt->null; */ 
}

static public function mdlCantidadClientes(){
    $stmt=ConexionV::conectar()->prepare("select count(*) as cliente from cliente");
    $stmt->execute();

    return $stmt->fetch();

    /*   $stmt->close();
    $stmt->null; */ 
}
}//final