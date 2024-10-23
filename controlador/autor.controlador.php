<?php
class ControladorAutor{
    public function index(){
        $Libros=ModeloAutor::index("autor");
        $json=array(
            "status"=>200,
            "detalle"=>$Libros
        ); 
        echo json_encode($json,true);
        return;
    }
    public function indexId($id){
        $Libros=ModeloAutor::indexId($id,"autor");
        if (empty($Libros)) {
            $json = array(
                "status" => 404,
                "detalle" => "El autor no existe"
            );
        } else {
            $json = array(
                "status" => 200,
                "detalle" => $Libros
            );
        }
        echo json_encode($json,true);
        return;
    }
    public function create(){
        $data = json_decode(file_get_contents("php://input"), true);
        if (empty($data) || !isset($data["nombre"]) || !isset($data["apellido"]) || !isset($data["nacionalidad"]) || !isset($data["fecha_nacimiento"]) || !isset($data["biografia"]) || !isset($data["imagen_autor"])) {
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
            "nacionalidad"=>$data["nacionalidad"],
            "fecha_nacimiento"=>$data["fecha_nacimiento"],
            "biografia"=>$data["biografia"],
            "imagen_autor"=>$data["imagen_autor"],
        );

        $usuarios=ModeloLibros::index("autor");
        foreach($usuarios as $key =>$value){
            if($value["nombre"]==$datos["nombre"] && $value["apellido"]==$datos["apellido"]){
                $json=array(
                    "status"=>200,
                    "detalle"=>"Este libro ya existe"
                ); 
                echo json_encode($json,true);
                return;
            }
        }

        $Libros=ModeloAutor::create($datos);
        $json=array(
            "status"=>200,
            "detalle"=>"registro exitoso",
            "autor"=>$datos
        ); 
        echo json_encode($json,true);
        return;
    }
    public function delete($id){
        ModeloAutor::delete($id);
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
            "nacionalidad"=>$data["nacionalidad"],
            "fecha_nacimiento"=>$data["fecha_nacimiento"],
            "biografia"=>$data["biografia"],
            "imagen_autor"=>$data["imagen_autor"],
        );
        $Libros=ModeloAutor::update($id,$datos);
        http_response_code(201);
        $json=array(
            "status"=>200,
            "detalle"=>"actualizacion completa",
            "autor"=>$datos
        ); 
        echo json_encode($json,true);
        return;
    }
}
?>