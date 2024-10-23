<?php
class ControladorPrestamos{
    public function index(){
        $Libros=ModeloPrestamos::index("prestamo");
        $json=array(
            "status"=>200,
            "detalle"=>$Libros
        ); 
        echo json_encode($json,true);
        return;
    }
    public function indexId($id){
        $usuarios=ModeloPrestamos::indexId($id,"prestamo");
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

        if (empty($data) || !isset($data["cliente"]) || !isset($data["libro"]) || !isset($data["fecha_devolucion"])) {
            $json = array(
                "status" => 400,
                "detalle" => "Faltan datos obligatorios"
            );
            echo json_encode($json);
            return;
        }

        $datos=array(
            "cliente"=>$data["cliente"],
            "libro"=>$data["libro"],
            "fecha_devolucion"=>$data["fecha_devolucion"],
        );

        $usuarios=ModeloPrestamos::index("prestamo");
        foreach($usuarios as $key =>$value){
            if($value["cliente"]==$datos["cliente"] && $value["libro"]==$datos["libro"]){
                $json=array(
                    "status"=>200,
                    "detalle"=>"Este prestamo ya existe"
                ); 
                echo json_encode($json,true);
                return;
            }
        }

        $Libros=ModeloPrestamos::create($datos);
        $json=array(
            "status"=>200,
            "detalle"=>"Registro exitoso",
            "libro"=>$datos
        ); 
        echo json_encode($json,true);
        return;
    }
    public function delete($id){
        ModeloPrestamos::delete($id);
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
            "cliente"=>$data["cliente"],
            "libro"=>$data["libro"],
            "fecha_devolucion"=>$data["fecha_devolucion"],
            "estado"=>$data["estado"],
        );
        $Libros=ModeloPrestamos::update($id,$datos);
        http_response_code(201);
        $json=array(
            "status"=>200,
            "detalle"=>"actualizacion completa",
            "prestamo"=>$datos
        ); 
        echo json_encode($json,true);
        return;
    }
}
?>