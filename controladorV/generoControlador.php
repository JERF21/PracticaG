<?php

$ruta=parse_url($_SERVER["REQUEST_URI"]);

if(isset($ruta["query"])){

if($ruta["query"]=="ctrRegGenero"||
   $ruta["query"]=="ctrEditGenero"||
   $ruta["query"]=="ctrBusGenero"||
   $ruta["query"]=="ctrEliGenero"){
    $metodo=$ruta["query"];
    $genero=new ControladorGeneroV();
    $genero->$metodo();
}

}




class ControladorGeneroV{
     

static public function ctrInfoGeneros(){
        $respuesta=ModeloGeneroV::mdlInfoGeneros();
        return $respuesta;
}


static public function ctrRegGenero(){
        require "../modeloV/generoModelo.php";
        $data=array(
            "nombreGenero"=>$_POST["nombreGenero"],
            "descripcionGenero"=>$_POST["descripcionGenero"],
        );
        $respuesta=ModeloGeneroV::mdlRegGenero($data);

        echo $respuesta;

}

static public function ctrInfoGenero($id){

        $respuesta=ModeloGeneroV::mdlInfoGenero($id);
        return $respuesta;
}


static public function ctrEditGenero(){
    require "../modeloV/generoModelo.php";
    $data=array(
        "idGenero"=>$_POST["idGenero"],
        "nombreGenero"=>$_POST["nombreGenero"],
        "descripcionGenero"=>$_POST["descripcionGenero"],
    );


    $respuesta=ModeloGeneroV::mdlEditGenero($data);
    echo $respuesta; 
}

static public function ctrEliGenero(){
    require "../modeloV/generoModelo.php";
    $id=$_POST["id"];
    $respuesta= ModeloGeneroV::mdlEliGenero($id);
    echo $respuesta;
}

static public function ctrBusGenero(){
    require "../modeloV/generoModelo.php";
    $codGenero=$_POST["codGenero"];
    $respuesta=ModeloGeneroV::mdlBusGenero($codGenero);
    echo json_encode($respuesta);
    //echo $respuesta;
}

static public function ctrCantidadGeneros(){

    $respuesta=ModeloGeneroV::mdlCantidadGeneros();
    return ($respuesta);
    //echo $respuesta;
}

}//final