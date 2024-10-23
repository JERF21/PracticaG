<?php
class ControladorClientes{
    public function index(){
        $Libros=ModeloClientes::index("cliente");
        $json=array(
            "status"=>200,
            "detalle"=>$Libros
        ); 
        echo json_encode($json,true);
        return;
    }
    public function indexId($id){
        $usuarios=ModeloClientes::indexId($id,"cliente");
        if (empty($usuarios)) {
            $json = array(
                "status" => 404,
                "detalle" => "Cliente no existe"
            );
        } else {
            $json = array(
                "status" => 200,
                "detalle" => "Cliente encontrado",
                "libro" => $usuarios
            );
        }
        echo json_encode($json);
        return;
    }
    public function create(){
        $data = json_decode(file_get_contents("php://input"), true);

        if (empty($data) || !isset($data["nombre"]) || !isset($data["apellido"]) || !isset($data["email"]) || !isset($data["telefono"]) || !isset($data["direccion"]) || !isset($data["imagen_cliente"])) {
            $json = array(
                "status" => 400,
                "detalle" => "Faltan datos obligatorios"
            );
            echo json_encode($json);
            return;
        }

        $datos=array(
            "nombre"=>$data["nombre"],
            "apellido"=>$data["apellido"],
            "email"=>$data["email"],
            "telefono"=>$data["telefono"],
            "direccion"=>$data["direccion"],
            "imagen_cliente"=>$data["imagen_cliente"],
        );
        $usuarios=ModeloLibros::index("cliente");
        foreach($usuarios as $key =>$value){
            if($value["nombre"]==$datos["nombre"] && $value["apellido"]==$datos["apellido"]){
                $json=array(
                    "status"=>200,
                    "detalle"=>"Este cliente ya existe"
                ); 
                echo json_encode($json,true);
                return;
            }
        }
        $Libros=ModeloClientes::create($datos);
        http_response_code(201);
        $json=array(
            "status"=>200,
            "detalle"=>"Registro exitoso de cliente",
            "cliente"=>$datos
        ); 
        echo json_encode($json,true);
        return;
    }
    public function delete($id){
        ModeloClientes::delete($id);
        $json=array(
            "status"=>200,
            "detalle"=>"Eliminacion completa"
        ); 
        echo json_encode($json,true);
        return;
    }
    public function update($id){
        $data = json_decode(file_get_contents("php://input"), true);
        $datos=array(
            "nombre"=>$data["nombre"],
            "apellido"=>$data["apellido"],
            "email"=>$data["email"],
            "telefono"=>$data["telefono"],
            "direccion"=>$data["direccion"],
            "imagen_cliente"=>$data["imagen_cliente"],
        );
        $Libros=ModeloClientes::update($id,$datos);
        $json=array(
            "status"=>200,
            "detalle"=>"Datos actualizados exitosamente",
            "cliente"=>$datos
        ); 
        echo json_encode($json,true);
        return;
    }
}
?>