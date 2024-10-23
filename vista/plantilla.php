<?php
session_start();
?>
<?php

$array = array_values(array_filter(explode("/", $_SERVER["REQUEST_URI"])));

$isApiRequest = !empty($array[1]) && $array[1] == "biblioteca";

if ($isApiRequest) {
    header('Content-Type: application/json');
    if (empty($array[2])) {
        $response["detalle"] = array("mensaje" => "Sin solicitudes");
        echo json_encode($response);
        exit;
    } else {
      if($array[2]=="usuario"){
        if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="GET" && empty($array[3])){
            $usurio=new ControladorUsuarios();
            $usurio->index();
        }
        elseif(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="GET" && empty($array[4])){
            if  (isset($array[3])) {
                $usurio=new ControladorUsuarios();
                $usurio->indexId($array[3]);
            } else {
                http_response_code(400);
                echo json_encode(array("detalle" => "ID es requerido"));
            }
        }
        if(isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"]=="POST" && empty($array[3])){
            $cursos=new ControladorUsuarios();
            $cursos->create();
        }
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

    }


    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>APIREST GDB</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="recursos/css/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="recursos/css/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="recursos/css/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="recursos/css/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="recursos/css/adminlte.min.css">
  <link rel="icon" href="recursos/img/libros.png">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="recursos/css/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- ChartJS -->
  <script src="recursos/css/chart.js/Chart.min.js"></script>
</head>

<?php
if (isset($_SESSION["ingreso"]) && $_SESSION["ingreso"] == "ok") {
  if (isset($_GET["ruta"])) {
    if (
      $_GET["ruta"] == "inicio" ||
      $_GET["ruta"] == "salir" ||
      $_GET["ruta"] == "VUsuario" ||
      $_GET["ruta"] == "VCliente" ||
      $_GET["ruta"] == "VAutor" ||
      $_GET["ruta"] == "VGenero" ||
      $_GET["ruta"] == "VLibro" ||
      $_GET["ruta"] == "VPrestamo" ||
      $_GET["ruta"] == "VProducto"
    ) {
      include "asideMenu.php";

      include $_GET["ruta"].".php";

      include "footer.php";
    }
  } else {
    include "vista/login.php";
  }
} else {
  include "vista/login.php";
}



?>
    
</html>
