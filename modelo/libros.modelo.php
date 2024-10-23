<?php
require_once "conexion.php";
class ModeloLibros{
    public static function index($tabla){
        $stmt=Conexion::conectar()->prepare("select * from $tabla");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$stmt->close();
        //$stmt->null;
    }
    public static function indexId($id,$tabla){
        $stmt=Conexion::conectar()->prepare("select * from $tabla where id_libro='$id'");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$stmt->close();
        //$stmt->null;
    }
    public static function create($datos){
        $titulo=$datos["titulo"];
        $autor=$datos["autor"];
        $genero=$datos["genero"];
        $sinopsis=$datos["sinopsis"];
        $fecha_publicacion=$datos["fecha_publicacion"];
        $editorial=$datos["editorial"];
        $numero_paginas=$datos["numero_paginas"];
        $stock=$datos["stock"];
        $imagen_libro=$datos["imagen_libro"];
        $stmt=Conexion::conectar()->prepare("insert into libro(titulo,autor,genero,sinopsis,fecha_publicacion,editorial,numero_paginas,stock, imagen_libro) values('$titulo','$autor','$genero','$sinopsis','$fecha_publicacion','$editorial','$numero_paginas','$stock', '$imagen_libro')");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
        //$stmt->close();
        //$stmt->null;
    }

    public static function delete($id){
        $stmt=Conexion::conectar()->prepare("DELETE FROM libro WHERE id_libro = '$id'");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public static function update($id,$datos){
        $titulo=$datos["titulo"];
        $autor=$datos["autor"];
        $genero=$datos["genero"];
        $sinopsis=$datos["sinopsis"];
        $fecha_publicacion=$datos["fecha_publicacion"];
        $editorial=$datos["editorial"];
        $numero_paginas=$datos["numero_paginas"];
        $stock=$datos["stock"];
        $imagen_libro=$datos["imagen_libro"];
        $stmt=Conexion::conectar()->prepare("update libro set titulo='$titulo',autor='$autor',genero='$genero',sinopsis='$sinopsis',fecha_publicacion='$fecha_publicacion',editorial='$editorial',numero_paginas='$numero_paginas',stock='$stock',imagen_libro='$imagen_libro' where id_libro=$id");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

}
?>