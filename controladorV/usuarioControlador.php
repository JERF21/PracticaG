<?php

$ruta=parse_url($_SERVER["REQUEST_URI"]);

if(isset($ruta["query"])){

if($ruta["query"]=="ctrRegUsuario"||
   $ruta["query"]=="ctrEditUsuario"||
   $ruta["query"]=="ctrEliUsuario"){
    $metodo=$ruta["query"];
    $usuario=new ControladorUsuarioV();
    $usuario->$metodo();
}

}




class ControladorUsuarioV{
    static public function ctrIngresoUsuario()
    {

        if (isset($_POST["usuario"])) {

            $usuario = $_POST["usuario"];
            $password = $_POST["password"];

            $resultado = ModeloUsuarioV::mdlAccesoUsuario($usuario);
            if ($resultado == false) {
                echo "Este usuario no existe";
            } else {
                if ($resultado==true) {
                    $_SESSION["login"] = $resultado["login_usuario"];
                    $_SESSION["perfil"] = $resultado["perfil"];
                    $_SESSION["idUsuario"] = $resultado["id_usuario"];
                    $_SESSION["ingreso"] = "ok";

                    date_default_timezone_set("America/La_Paz");
                    $fecha = date("Y-m-d");
                    $hora = date("H-i-s");

                    $fechaHora = $fecha . " " . $hora;
                    $id = $resultado["id_usuario"];

                    $ultimoLogin = ModeloUsuarioV::mdlActualizarAcceso($fechaHora, $id);

                    if ($ultimoLogin == "ok") {
                        echo '<script> window.location="inicio";  </script>';
                    }
                }
            }
        }
    }

    static public function ctrInfoUsuarios(){
        $respuesta=ModeloUsuarioV::mdlInfoUsuarios();
        return $respuesta;
    }


    static public function ctrRegUsuario(){
        require "../modeloV/usuarioModelo.php";
        $password=password_hash($_POST["password"], PASSWORD_DEFAULT);
        $data=array(
            "loginUsuario"=>$_POST["login"],
            "password"=>$password,
            "perfil"=>"Moderador"
        );
        $respuesta=ModeloUsuarioV::mdlRegUsuario($data);

        echo $respuesta;

    }

    static public function ctrInfoUsuario($id){

        $respuesta=ModeloUsuarioV::mdlInfoUsuario($id);
        return $respuesta;
    }


static function ctrEditUsuario(){
    require "../modeloV/usuarioModelo.php";

if($_POST["password"]==$_POST["passActual"]){
    $password=$_POST["password"];
}
else{
    $password=password_hash($_POST["password"], PASSWORD_DEFAULT);
}

    


    $data=array(
        "password"=>$password,
        "id"=>$_POST["idUsuario"],
        "perfil"=>$_POST["perfil"],
        "estado"=>$_POST["estado"]
    );

    ModeloUsuarioV::mdlEditUsuario($data);

/*     $respuesta=ModeloUsuarioV::mdlEditUsuario($data);

    echo $respuesta; */


}

static function ctrEliUsuario(){
    require "../modeloV/usuarioModelo.php";
    $id=$_POST["id"];

    $respuesta= ModeloUsuarioV::mdlEliUsuario($id);
    echo $respuesta;
}

static public function ctrCantidadUsuarios(){

    $respuesta=ModeloUsuarioV::mdlCantidadUsuarios();
    return ($respuesta);
    //echo $respuesta;
}
}//final