<?php

$ruta=parse_url($_SERVER["REQUEST_URI"]);

if(isset($ruta["query"])){

if($ruta["query"]=="ctrRegPrestamo"||
   $ruta["query"]=="ctrEditPrestamo"||
   $ruta["query"]=="ctrBusPrestamo"||
   $ruta["query"]=="ctrEliPrestamo"){
    $metodo=$ruta["query"];
    $prestamo=new ControladorPrestamoV();
    $prestamo->$metodo();
}

}




class ControladorPrestamoV{
     

static public function ctrInfoPrestamos(){
        $respuesta=ModeloPrestamoV::mdlInfoPrestamos();
        return $respuesta;
}


static public function ctrRegPrestamo(){
        require "../modeloV/prestamoModelo.php";
        $data=array(
            "clientePrestamo"=>$_POST["clientePrestamo"],
            "libroPrestamo"=>$_POST["libroPrestamo"],
            "fechapPrestamo"=>$_POST["fechapPrestamo"],
            "fechadPrestamo"=>$_POST["fechadPrestamo"],
            "estadoPrestamo"=>$_POST["estadoPrestamo"],
        );
        $respuesta=ModeloPrestamoV::mdlRegPrestamo($data);

        echo $respuesta;

}

static public function ctrInfoPrestamo($id){

        $respuesta=ModeloPrestamoV::mdlInfoPrestamo($id);
        return $respuesta;
}


static public function ctrEditPrestamo(){
    require "../modeloV/prestamoModelo.php";

    $data=array(
        "id"=>$_POST["idPrestamo"],
        "clientePrestamo"=>$_POST["clientePrestamo"],
        "libroPrestamo"=>$_POST["libroPrestamo"],
        "fechapPrestamo"=>$_POST["fechapPrestamo"],
        "fechadPrestamo"=>$_POST["fechadPrestamo"],
        "estadoPrestamo"=>$_POST["estadoPrestamo"],
    );


    $respuesta=ModeloPrestamoV::mdlEditPrestamo($data);
    echo $respuesta; 
}

static public function ctrEliPrestamo(){
    require "../modeloV/prestamoModelo.php";
    $id=$_POST["id"];
    $respuesta= ModeloPrestamoV::mdlEliPrestamo($id);
    echo $respuesta;
}

static public function ctrBusPrestamo(){
    require "../modeloV/prestamoModelo.php";
    $idPrestamo=$_POST["idPrestamo"];
    $respuesta=ModeloPrestamoV::mdlBusPrestamo($idPrestamo);
    echo json_encode($respuesta);
    //echo $respuesta;
}

static public function ctrCantidadPrestamos(){

    $respuesta=ModeloPrestamoV::mdlCantidadPrestamos();
    return ($respuesta);
    //echo $respuesta;
}

}//final