<?php
class ControladorUsuarios{
    public function login(){
        
        //validar cliente
        $clientes=ModeloUsuarios::index("clientes");
        include "vista/plantilla.php";

        if(isset($_SERVER["PHP_AUTH_USER"]) && isset($_SERVER["PHP_AUTH_PW"])){
            foreach ($clientes as $key => $valueCliente) {
                if ($_SERVER["PHP_AUTH_USER"].":".$_SERVER["PHP_AUTH_PW"]==$valueCliente["id_cliente"].":".$valueCliente["llave_secreta"]) {
                    $usuarios=ModeloUsuarios::index("cursos");
                    $json=array(
                        "status"=>200,
                        "detalle"=>$usuarios
                    ); 
                    echo json_encode($json,true);
                    return;
                }
                else{
                    $json=array(
                        "status"=>503,
                        "detalle"=>"ERROR DE AUTENTICACION"
                    ); 
                    echo json_encode($json,true);
                    return;
                }
            }
        }
    }
    public function index(){
            $usuarios=ModeloUsuarios::index("usuario");
            $json=array(
                "status"=>200,
                "detalle"=>$usuarios
            ); 
            echo json_encode($json,true);
            return;
    }
    public function indexId($id){
        $usuarios=ModeloUsuarios::indexId($id,"usuario");
        if (empty($usuarios)) {
            $json = array(
                "status" => 404,
                "detalle" => "Usuario no encontrado"
            );
        } else {
            $json = array(
                "status" => 200,
                "detalle" => $usuarios
            );
        }
        echo json_encode($json);
        return;
    }
    public function create(){        
        $data = json_decode(file_get_contents("php://input"), true);

        if (empty($data) || !isset($data["login_usuario"]) || !isset($data["password"]) || !isset($data["perfil"])) {
            $json = array(
                "status" => 400,
                "detalle" => "Faltan datos obligatorios"
            );
            echo json_encode($json);
            return;
        }
        $password=password_hash($data["password"], PASSWORD_DEFAULT);
        $datos=array(
            "login_usuario"=>$data["login_usuario"],
            "password"=>$password,
            "perfil"=>$data["perfil"],
        );

        $usuarios=ModeloUsuarios::index("usuario");
        foreach($usuarios as $key =>$value){
            if($value["login_usuario"]==$datos["login_usuario"] && $value["password"]==$datos["password"]){
                $json=array(
                    "status"=>200,
                    "detalle"=>"Este Usuario ya existe"
                ); 
                echo json_encode($json,true);
                return;
            }
        }

        $Libros=ModeloUsuarios::create($datos);
        $json=array(
            "status"=>200,
            "detalle"=>"Registro exitoso",
            "libro"=>$datos
        ); 
        echo json_encode($json,true);
        return;
    }
    public function delete($id){
        ModeloUsuarios::delete($id);
        $json=array(
            "status"=>200,
            "detalle"=>"Eliminacion con Exito"
        ); 
        echo json_encode($json,true);
        return;
    }
    public function update($id){
        $data = json_decode(file_get_contents("php://input"), true);
        $password = password_hash($data["password"], PASSWORD_DEFAULT);

        // Crear el arreglo de datos
        $datos = array(
            "login_usuario" => $data["login_usuario"],
            "password" => $password,
            "perfil" => $data["perfil"],
            "estado" => $data["estado"],
        );
            $usuarios=ModeloUsuarios::update($id,$datos);
            $json=array(
                "status"=>200,
                "detalle"=>"Actualizacion con Exito",
                "datos"=>$datos
            ); 
            echo json_encode($json,true);
            return;
    }
}
?>