<?php

$ruta=parse_url($_SERVER["REQUEST_URI"]);

if(isset($ruta["query"])){

if($ruta["query"]=="ctrRegProducto"||
   $ruta["query"]=="ctrEditProducto"||
   $ruta["query"]=="ctrBusProducto"||
   $ruta["query"]=="ctrEliProducto"){
    $metodo=$ruta["query"];
    $producto=new ControladorProductoV();
    $producto->$metodo();
}

}




class ControladorProductoV{
     

static public function ctrInfoProductos(){
        $respuesta=ModeloProductoV::mdlInfoProductos();
        return $respuesta;
}


static public function ctrRegProducto(){
        require "../modeloV/productoModelo.php";
        $imagen=$_FILES["imgProducto"];
        $imgNombre=$imagen["name"];
        $imgTmp=$imagen["tmp_name"];
        move_uploaded_file($imgTmp,"../assest/dist/img/productos/".$imgNombre);


        $data=array(
            "codProducto"=>$_POST["codProducto"],
            "codProductoSIN"=>$_POST["codProductoSIN"],
            "desProducto"=>$_POST["desProducto"],
            "preProducto"=>$_POST["preProducto"],
            "unidadMedidad"=>$_POST["unidadMedidad"],
            "unidadMedidadSIN"=>$_POST["unidadMedidadSIN"],
            "codProducto"=>$_POST["codProducto"],
            "imgProducto"=>$imgNombre,
        );
        $respuesta=ModeloProductoV::mdlRegProducto($data);

        echo $respuesta;

}

static public function ctrInfoProducto($id){

        $respuesta=ModeloProductoV::mdlInfoProducto($id);
        return $respuesta;
}


static public function ctrEditProducto(){
    require "../modeloV/productoModelo.php";

    $imagen=$_FILES["imgProducto"];
    if($imagen["name"]==""){
    $imgNombre=$_POST["imgActual"];
    }else{
        $imgNombre=$imagen["name"];
        $imgTmp=$imagen["tmp_name"];
        move_uploaded_file($imgTmp,"../assest/dist/img/productos/".$imgNombre);
    }

    $data=array(
        "idProducto"=>$_POST["idProducto"],
        "codProductoSIN"=>$_POST["codProductoSIN"],
        "desProducto"=>$_POST["desProducto"],
        "preProducto"=>$_POST["preProducto"],
        "unidadMedidad"=>$_POST["unidadMedidad"],
        "unidadMedidadSIN"=>$_POST["unidadMedidadSIN"],
        "estado"=>$_POST["estado"],
        "imgProducto"=>$imgNombre,
    );


    $respuesta=ModeloProductoV::mdlEditProducto($data);
    echo $respuesta; 
}

static public function ctrEliProducto(){
    require "../modeloV/productoModelo.php";
    $id=$_POST["id"];
    $respuesta= ModeloProductoV::mdlEliProducto($id);
    echo $respuesta;
}

static public function ctrBusProducto(){
    require "../modeloV/productoModelo.php";
    $codProducto=$_POST["codProducto"];
    $respuesta=ModeloProductoV::mdlBusProducto($codProducto);
    echo json_encode($respuesta);
    //echo $respuesta;
}

static public function ctrCantidadProductos(){

    $respuesta=ModeloProductoV::mdlCantidadProductos();
    return ($respuesta);
    //echo $respuesta;
}

}//final