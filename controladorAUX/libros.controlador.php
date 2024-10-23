<?php
class ControladorLibros{
    public function index(){
        $Libros=ModeloLibros::index("libro");
        $json=array(
            "status"=>200,
            "detalle"=>$Libros
        ); 
        echo json_encode($json,true);
        return;
    }
    public function indexId($id){
        $usuarios=ModeloLibros::indexId($id,"libro");
        if (empty($usuarios)) {
            $json = array(
                "status" => 404,
                "detalle" => "Libro no encontrado"
            );
        } else {
            $json = array(
                "status" => 200,
                "detalle" => "libro encontrado",
                "libro" => $usuarios
            );
        }
        echo json_encode($json);
        return;
    }
    public function create(){
        $data = json_decode(file_get_contents("php://input"), true);

        if (empty($data) || !isset($data["titulo"]) || !isset($data["autor"]) || !isset($data["genero"]) || !isset($data["sinopsis"]) || !isset($data["fecha_publicacion"]) || !isset($data["editorial"]) || !isset($data["numero_paginas"]) || !isset($data["stock"]) || !isset($data["imagen_libro"])) {
            $json = array(
                "status" => 400,
                "detalle" => "Faltan datos obligatorios"
            );
            echo json_encode($json);
            return;
        }

        $datos=array(
            "titulo"=>$data["titulo"],
            "autor"=>$data["autor"],
            "genero"=>$data["genero"],
            "sinopsis"=>$data["sinopsis"],
            "fecha_publicacion"=>$data["fecha_publicacion"],
            "editorial"=>$data["editorial"],
            "numero_paginas"=>$data["numero_paginas"],
            "stock"=>$data["stock"],
            "imagen_libro"=>$data["imagen_libro"],
        );

        $usuarios=ModeloLibros::index("libro");
        foreach($usuarios as $key =>$value){
            if($value["titulo"]==$datos["titulo"] && $value["autor"]==$datos["autor"]){
                $json=array(
                    "status"=>200,
                    "detalle"=>"Este libro ya existe"
                ); 
                echo json_encode($json,true);
                return;
            }
        }

        $Libros=ModeloLibros::create($datos);
        $json=array(
            "status"=>200,
            "detalle"=>"Registro exitoso",
            "libro"=>$datos
        ); 
        echo json_encode($json,true);
        return;
    }
    public function delete($id){
        ModeloLibros::delete($id);
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
            "titulo"=>$data["titulo"],
            "autor"=>$data["autor"],
            "genero"=>$data["genero"],
            "sinopsis"=>$data["sinopsis"],
            "fecha_publicacion"=>$data["fecha_publicacion"],
            "editorial"=>$data["editorial"],
            "numero_paginas"=>$data["numero_paginas"],
            "stock"=>$data["stock"],
            "imagen_libro"=>$data["imagen_libro"],
        );
        $Libros=ModeloLibros::update($id,$datos);
        http_response_code(201);
        $json=array(
            "status"=>200,
            "detalle"=>"actualizacion completa",
            "libro"=>$datos
        ); 
        echo json_encode($json,true);
        return;
    }
}
?>