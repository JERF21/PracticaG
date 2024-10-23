<?php
class ControladorGeneros{
    public function index(){
        $Libros=ModeloGeneros::index("genero");
        $json=array(
            "status"=>200,
            "detalle"=>$Libros
        ); 
        echo json_encode($json,true);
        return;
    }
    public function indexId($id){
        $usuarios=ModeloGeneros::indexId($id,"genero");
        if (empty($usuarios)) {
            $json = array(
                "status" => 404,
                "detalle" => "Genero no encontrado"
            );
        } else {
            $json = array(
                "status" => 200,
                "detalle" => "Genero encontrado",
                "libro" => $usuarios
            );
        }
        echo json_encode($json);
        return;
    }
    public function create(){
        $data = json_decode(file_get_contents("php://input"), true);

        if (empty($data) || !isset($data["nombre"]) || !isset($data["descripcion"])) {
            $json = array(
                "status" => 400,
                "detalle" => "Faltan datos obligatorios"
            );
            echo json_encode($json);
            return;
        }

        $datos=array(
            "nombre"=>$data["nombre"],
            "descripcion"=>$data["descripcion"],
        );

        $usuarios=ModeloGeneros::index("genero");
        foreach($usuarios as $key =>$value){
            if($value["nombre"]==$datos["nombre"]){
                $json=array(
                    "status"=>200,
                    "detalle"=>"Este genero ya existe"
                ); 
                echo json_encode($json,true);
                return;
            }
        }

        $Libros=ModeloGeneros::create($datos);
        $json=array(
            "status"=>200,
            "detalle"=>"Registro exitoso",
            "libro"=>$datos
        ); 
        echo json_encode($json,true);
        return;
    }
    public function delete($id){
        ModeloGeneros::delete($id);
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
            "descripcion"=>$data["descripcion"],
        );
        $Libros=ModeloGeneros::update($id,$datos);
        $json=array(
            "status"=>200,
            "detalle"=>"actualizacion completa",
            "genero"=>$datos
        ); 
        echo json_encode($json,true);
        return;
    }
}
?>