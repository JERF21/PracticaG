<?php

$ruta=parse_url($_SERVER["REQUEST_URI"]);

if(isset($ruta["query"])){

if($ruta["query"]=="ctrRegAutor"||
   $ruta["query"]=="ctrEditAutor"||
   $ruta["query"]=="ctrBusAutor"||
   $ruta["query"]=="ctrEliAutor"){
    $metodo=$ruta["query"];
    $autor=new ControladorAutorV();
    $autor->$metodo();
}

}




class ControladorAutorV{
     

static public function ctrInfoAutors(){
        $respuesta=ModeloAutorV::mdlInfoAutors();
        return $respuesta;
}


static public function ctrRegAutor(){
        require "../modeloV/autorModelo.php";
        $imagen=$_FILES["imgAutor"];
        $imgNombre=$imagen["name"];
        $imgTmp=$imagen["tmp_name"];
        move_uploaded_file($imgTmp,"../recursos/img/autors/".$imgNombre);


        $data=array(
            "nombreAutor"=>$_POST["nombreAutor"],
            "apellidoAutor"=>$_POST["apellidoAutor"],
            "nacionalidadAutor"=>$_POST["nacionalidadAutor"],
            "nacimientoAutor"=>$_POST["nacimientoAutor"],
            "biografiaAutor"=>$_POST["biografiaAutor"],
            "imgAutor"=>$imgNombre,
        );
        $respuesta=ModeloAutorV::mdlRegAutor($data);

        echo $respuesta;

}

static public function ctrInfoAutor($id){

        $respuesta=ModeloAutorV::mdlInfoAutor($id);
        return $respuesta;
}


static public function ctrEditAutor(){
    require "../modeloV/autorModelo.php";

    $imagen=$_FILES["imgAutor"];
    if($imagen["name"]==""){
    $imgNombre=$_POST["imgActual"];
    }else{
        $imgNombre=$imagen["name"];
        $imgTmp=$imagen["tmp_name"];
        move_uploaded_file($imgTmp,"../recursos/img/autors/".$imgNombre);
    }

    $data=array(
        "id"=>$_POST["idAutor"],
        "nombreAutor"=>$_POST["nombreAutor"],
        "apellidoAutor"=>$_POST["apellidoAutor"],
        "nacionalidadAutor"=>$_POST["nacionalidadAutor"],
        "nacimientoAutor"=>$_POST["nacimientoAutor"],
        "biografiaAutor"=>$_POST["biografiaAutor"],
        "imgAutor"=>$imgNombre,
    );


    $respuesta=ModeloAutorV::mdlEditAutor($data);
    echo $respuesta; 
}

static public function ctrEliAutor(){
    require "../modeloV/autorModelo.php";
    $id=$_POST["id"];
    $respuesta= ModeloAutorV::mdlEliAutor($id);
    echo $respuesta;
}

static public function ctrBusAutor(){
    require "../modeloV/autorModelo.php";
    $idAutor=$_POST["idAutor"];
    $respuesta=ModeloAutorV::mdlBusAutor($idAutor);
    echo json_encode($respuesta);
    //echo $respuesta;
}

static public function ctrCantidadAutors(){

    $respuesta=ModeloAutorV::mdlCantidadAutors();
    return ($respuesta);
    //echo $respuesta;
}

}//final