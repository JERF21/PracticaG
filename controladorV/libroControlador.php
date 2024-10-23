<?php

$ruta=parse_url($_SERVER["REQUEST_URI"]);

if(isset($ruta["query"])){

if($ruta["query"]=="ctrRegLibro"||
   $ruta["query"]=="ctrEditLibro"||
   $ruta["query"]=="ctrBusLibro"||
   $ruta["query"]=="ctrEliLibro"){
    $metodo=$ruta["query"];
    $libro=new ControladorLibroV();
    $libro->$metodo();
}

}




class ControladorLibroV{
     

static public function ctrInfoLibros(){
        $respuesta=ModelolLibroV::mdlInfoLibros();
        return $respuesta;
}


static public function ctrRegLibro(){
        require "../modeloV/libroModelo.php";
        $imagen=$_FILES["imgLibro"];
        $imgNombre=$imagen["name"];
        $imgTmp=$imagen["tmp_name"];
        move_uploaded_file($imgTmp,"../recursos/img/libros/".$imgNombre);


        $data=array(
            "tituloLibro"=>$_POST["tituloLibro"],
            "autorLibro"=>$_POST["autorLibro"],
            "generoLibro"=>$_POST["generoLibro"],
            "sinopsisLibro"=>$_POST["sinopsisLibro"],
            "fechaLibro"=>$_POST["fechaLibro"],
            "editorialLibro"=>$_POST["editorialLibro"],
            "paginasLibro"=>$_POST["paginasLibro"],
            "stockLibro"=>$_POST["stockLibro"],
            "imgLibro"=>$imgNombre,
        );
        $respuesta=ModelolLibroV::mdlRegLibro($data);

        echo $respuesta;

}

static public function ctrInfoLibro($id){

        $respuesta=ModelolLibroV::mdlInfoLibro($id);
        return $respuesta;
}


static public function ctrEditLibro(){
    require "../modeloV/libroModelo.php";

    $imagen=$_FILES["imgLibro"];
    if($imagen["name"]==""){
    $imgNombre=$_POST["imgActual"];
    }else{
        $imgNombre=$imagen["name"];
        $imgTmp=$imagen["tmp_name"];
        move_uploaded_file($imgTmp,"../recursos/img/libros/".$imgNombre);
    }

    $data=array(
        "id"=>$_POST["idLibro"],
        "tituloLibro"=>$_POST["tituloLibro"],
        "autorLibro"=>$_POST["autorLibro"],
        "generoLibro"=>$_POST["generoLibro"],
        "sinopsisLibro"=>$_POST["sinopsisLibro"],
        "fechaLibro"=>$_POST["fechaLibro"],
        "editorialLibro"=>$_POST["editorialLibro"],
        "paginasLibro"=>$_POST["paginasLibro"],
        "stockLibro"=>$_POST["stockLibro"],
        "imgLibro"=>$imgNombre,
    );


    $respuesta=ModelolLibroV::mdlEditLibro($data);
    echo $respuesta; 
}

static public function ctrEliLibro(){
    require "../modeloV/libroModelo.php";
    $id=$_POST["id"];
    $respuesta= ModelolLibroV::mdlEliLibro($id);
    echo $respuesta;
}

static public function ctrBusLibro(){
    require "../modeloV/libroModelo.php";
    $codLibro=$_POST["codLibro"];
    $respuesta=ModelolLibroV::mdlBusLibro($codLibro);
    echo json_encode($respuesta);
    //echo $respuesta;
}

static public function ctrCantidadLibros(){

    $respuesta=ModelolLibroV::mdlCantidadLibros();
    return ($respuesta);
    //echo $respuesta;
}

}//final