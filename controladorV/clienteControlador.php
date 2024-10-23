<?php

$ruta=parse_url($_SERVER["REQUEST_URI"]);

if(isset($ruta["query"])){

if($ruta["query"]=="ctrRegCliente"||
   $ruta["query"]=="ctrEditCliente"||
   $ruta["query"]=="ctrBusCliente"||
   $ruta["query"]=="ctrEliCliente"){
    $metodo=$ruta["query"];
    $cliente=new ControladorClienteV();
    $cliente->$metodo();
}

}




class ControladorClienteV{
     

static public function ctrInfoClientes(){
        $respuesta=ModeloClienteV::mdlInfoClientes();
        return $respuesta;
}


static public function ctrRegCliente(){
        require "../modeloV/clienteModelo.php";
        $imagen=$_FILES["imgCliente"];
        $imgNombre=$imagen["name"];
        $imgTmp=$imagen["tmp_name"];
        move_uploaded_file($imgTmp,"../recursos/img/clientes/".$imgNombre);


        $data=array(
            "nombreCliente"=>$_POST["nombreCliente"],
            "apellidoCliente"=>$_POST["apellidoCliente"],
            "emailCliente"=>$_POST["emailCliente"],
            "telefonoCliente"=>$_POST["telefonoCliente"],
            "direccionCliente"=>$_POST["direccionCliente"],
            "imgCliente"=>$imgNombre,
        );
        $respuesta=ModeloClienteV::mdlRegCliente($data);

        echo $respuesta;

}

static public function ctrInfoCliente($id){

        $respuesta=ModeloClienteV::mdlInfoCliente($id);
        return $respuesta;
}


static public function ctrEditCliente(){
    require "../modeloV/clienteModelo.php";

    $imagen=$_FILES["imgCliente"];
    if($imagen["name"]==""){
    $imgNombre=$_POST["imgActual"];
    }else{
        $imgNombre=$imagen["name"];
        $imgTmp=$imagen["tmp_name"];
        move_uploaded_file($imgTmp,"../recursos/img/clientes/".$imgNombre);
    }

    $data=array(
        "id"=>$_POST["idCliente"],
        "nombreCliente"=>$_POST["nombreCliente"],
        "apellidoCliente"=>$_POST["apellidoCliente"],
        "emailCliente"=>$_POST["emailCliente"],
        "telefonoCliente"=>$_POST["telefonoCliente"],
        "direccionCliente"=>$_POST["direccionCliente"],
        "imgCliente"=>$imgNombre,
    );


    $respuesta=ModeloClienteV::mdlEditCliente($data);
    echo $respuesta; 
}

static public function ctrEliCliente(){
    require "../modeloV/clienteModelo.php";
    $id=$_POST["id"];
    $respuesta= ModeloClienteV::mdlEliCliente($id);
    echo $respuesta;
}

static public function ctrBusCliente(){
    require "../modeloV/clienteModelo.php";
    $codCliente=$_POST["codCliente"];
    $respuesta=ModeloClienteV::mdlBusCliente($codCliente);
    echo json_encode($respuesta);
    //echo $respuesta;
}

static public function ctrCantidadClientes(){

    $respuesta=ModeloClienteV::mdlCantidadClientes();
    return ($respuesta);
    //echo $respuesta;
}

}//final