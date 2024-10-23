<?php

// $array=explode("/",$_SERVER["REQUEST_URI"]);
$array = array_values(array_filter(explode("/", $_SERVER["REQUEST_URI"])));
//$array = explode("/", trim($_SERVER["REQUEST_URI"], '/'));
// var_dump($array);
// echo "<pre>"; print_r($array); echo "<pre>";
// print_r($array);
// print_r($array);

if(empty($array[1])){
    $json=array(
        "detalle"=>"Sin soliciadtudes",
    );
    echo json_encode($json,true);
    // include "vista/plantilla.php";
}else{
    //utilizo el 4 por que t engo el archivo en otro lado
    // if(count(array_filter($array))==2){

        // if(array_filter($array)[2]=="biblioteca"){
        if($array[1]=="biblioteca" ){
            if($array[2]=="usuario"){
                if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="GET" && empty($array[3])){
                    $usurio=new ControladorUsuarios();
                    $usurio->index();
                }
                elseif(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="GET" && empty($array[4])){
                    if  (isset($array[3])) {
                        // $pacientes = new ControladorUsuarios();
                        // $pacientes->update($array[3]);
                        $usurio=new ControladorUsuarios();
                        $usurio->indexId($array[3]);
                    } else {
                        http_response_code(400);
                        echo json_encode(array("detalle" => "ID es requerido"));
                    }
                    // $cursos=new ControladorUsuarios();
                    // $cursos->indexId();
                }
                // if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="POST"){
                //     $json=array(
                //         "detalle"=>"CREANDO",
                //     );
                //     echo json_encode($json,true);
    
                //     $datos=array(
                //         "nombre"=>$_POST["nombre"],
                //         "password"=>$_POST["password"],
                //     );
                //     echo "<pre>"; print_r($datos); echo "<pre>";
    
                //     $cursos=new ControladorCursos();
                //     $cursos->create($datos);
                // }
                if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="POST" && empty($array[3])){
                    $cursos=new ControladorUsuarios();
                    $cursos->create();
                }
                // else{
                //     $json=array(
                //         "detalle"=>"URL POST Usuario Incorrecta",
                //     );
                //     echo json_encode($json,true);
                // }
                if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="PUT" && empty($array[4])){
                    if  (isset($array[3])) {
                        $pacientes = new ControladorUsuarios();
                        $pacientes->update($array[3]);
                    } else {
                        http_response_code(400);
                        echo json_encode(array("detalle" => "ID requerido para actualizar"));
                    }
                }
                if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="DELETE" && empty($array[4])){
                    if  (isset($array[3])) {
                        $pacientes = new ControladorUsuarios();
                        $pacientes->delete($array[3]);
                    } else {
                        http_response_code(400);
                        echo json_encode(array("detalle" => "ID requerido para eliminar"));
                    }
                }
            }
            if($array[2]=="libro"){
                if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="GET" && empty($array[3])){
                    $cursos=new ControladorLibros();
                    $cursos->index();
                }
                elseif(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="GET" && empty($array[4])){
                    if  (isset($array[3])) {
                        $libro=new ControladorLibros();
                        $libro->indexId($array[3]);
                    } else {
                        http_response_code(400);
                        echo json_encode(array("detalle" => "ID es requerido"));
                    }
                }
                if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="POST" && empty($array[3])){
                    $cursos=new ControladorLibros();
                    $cursos->create();
                }
                if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="PUT"){
                    if  (isset($array[3])) {
                        $pacientes = new ControladorLibros();
                        $pacientes->update($array[3]);
                    } else {
                        http_response_code(400);
                        echo json_encode(array("detalle" => "ID requerido para actualizar"));
                    }
                }
                if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="DELETE"){
                    if  (isset($array[3])) {
                        $pacientes = new ControladorLibros();
                        $pacientes->delete($array[3]);
                    } else {
                        http_response_code(400);
                        echo json_encode(array("detalle" => "ID requerido para eliminar"));
                    }
                }
            }
            if($array[2]=="autor"){
                if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="GET" && empty($array[3])){
                    $cursos=new ControladorAutor();
                    $cursos->index();
                }
                elseif(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="GET" && empty($array[4])){
                    if  (isset($array[3])) {
                        $libro=new ControladorAutor();
                        $libro->indexId($array[3]);
                    } else {
                        http_response_code(400);
                        echo json_encode(array("detalle" => "ID es requerido"));
                    }
                }
                if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="POST" && empty($array[3])){
                    $cursos=new ControladorAutor();
                    $cursos->create();
                }
                if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="PUT" && empty($array[4])){
                    if  (isset($array[3])) {
                        $pacientes = new ControladorAutor();
                        $pacientes->update($array[3]);
                    } else {
                        http_response_code(400);
                        echo json_encode(array("detalle" => "ID requerido para actualizar"));
                    }
                }
                if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="DELETE"){
                    if  (isset($array[3])) {
                        $pacientes = new ControladorAutor();
                        $pacientes->delete($array[3]);
                    } else {
                        http_response_code(400);
                        echo json_encode(array("detalle" => "ID requerido para eliminar"));
                    }
                }
            }
            if($array[2]=="cliente"){
                if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="GET" && empty($array[3])){
                    $cursos=new ControladorClientes();
                    $cursos->index();
                }
                elseif(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="GET" && empty($array[4])){
                    if  (isset($array[3])) {
                        $libro=new ControladorClientes();
                        $libro->indexId($array[3]);
                    } else {
                        http_response_code(400);
                        echo json_encode(array("detalle" => "ID es requerido"));
                    }
                }
                if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="POST" && empty($array[3])){
                    $cursos=new ControladorClientes();
                    $cursos->create();
                }
                if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="PUT" && empty($array[4])){
                    if  (isset($array[3])) {
                        $pacientes = new ControladorClientes();
                        $pacientes->update($array[3]);
                    } else {
                        http_response_code(400);
                        echo json_encode(array("detalle" => "ID requerido para actualizar"));
                    }
                }
                if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="DELETE"){
                    if  (isset($array[3])) {
                        $pacientes = new ControladorClientes();
                        $pacientes->delete($array[3]);
                    } else {
                        http_response_code(400);
                        echo json_encode(array("detalle" => "ID requerido para eliminar"));
                    }
                }
            }
            if($array[2]=="genero"){
                if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="GET" && empty($array[3])){
                    $cursos=new ControladorGeneros();
                    $cursos->index();
                }
                elseif(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="GET" && empty($array[4])){
                    if  (isset($array[3])) {
                        $libro=new ControladorGeneros();
                        $libro->indexId($array[3]);
                    } else {
                        http_response_code(400);
                        echo json_encode(array("detalle" => "ID es requerido"));
                    }
                }
                if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="POST" && empty($array[3])){
                    $cursos=new ControladorGeneros();
                    $cursos->create();
                }
                if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="PUT" && empty($array[4])){
                    if  (isset($array[3])) {
                        $pacientes = new ControladorGeneros();
                        $pacientes->update($array[3]);
                    } else {
                        http_response_code(400);
                        echo json_encode(array("detalle" => "ID requerido para actualizar"));
                    }
                }
                if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="DELETE"){
                    if  (isset($array[3])) {
                        $pacientes = new ControladorGeneros();
                        $pacientes->delete($array[3]);
                    } else {
                        http_response_code(400);
                        echo json_encode(array("detalle" => "ID requerido para eliminar"));
                    }
                }
            } 
            if($array[2]=="prestamo"){
                if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="GET" && empty($array[3])){
                    $cursos=new ControladorPrestamos();
                    $cursos->index();
                }
                elseif(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="GET" && empty($array[4])){
                    if  (isset($array[3])) {
                        $cursos=new ControladorPrestamos();
                        $cursos->indexId($array[3]);
                    } else {
                        http_response_code(400);
                        echo json_encode(array("detalle" => "ID requerido para actualizar"));
                    }
                }
                if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="POST" && empty($array[3])){
                    $cursos=new ControladorPrestamos();
                    $cursos->create();
                }
                if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="PUT" && empty($array[4])){
                    if  (isset($array[3])) {
                        $pacientes = new ControladorPrestamos();
                        $pacientes->update($array[3]);
                    } else {
                        http_response_code(400);
                        echo json_encode(array("detalle" => "ID requerido para actualizar"));
                    }
                }
                if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="DELETE"){
                    if  (isset($array[3])) {
                        $pacientes = new ControladorPrestamos();
                        $pacientes->delete($array[3]);
                    } else {
                        http_response_code(400);
                        echo json_encode(array("detalle" => "ID requerido para eliminar"));
                    }
                }
            } 
        }else{
            $json=array(
                "detalle"=>"Por favor haga una solicitud",
            );
            echo json_encode($json,true);
        }

    // }
}

?>