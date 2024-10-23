<?php
require_once "conexion.php";
class ModeloUsuarioV{

    static public function mdlAccesoUsuario($usuario){
        $stmt=ConexionV::conectar()->prepare("select * from usuario where login_usuario='$usuario'");
        $stmt->execute();

        return $stmt->fetch();

  /*       $stmt->close();
        $stmt->null;  */
    }

    static public function mdlActualizarAcceso($fechaHora, $id){
        $stmt=ConexionV::conectar()->prepare("update usuario set ultimo_login='$fechaHora' where id_usuario='$id'");
        
        if($stmt->execute()){
          return "ok";
        }else{
          return "error";
        }
      }

    
    static public function mdlInfoUsuarios(){
        $stmt=ConexionV::conectar()->prepare("select * from usuario");
        $stmt->execute();

        return $stmt->fetchAll();

  /*       $stmt->close();
        $stmt->null;  */
        
    }


    
    static public function mdlRegUsuario($data){
        $loginUsuario=$data["loginUsuario"];
        $password=$data["password"];
        $perfil=$data["perfil"];

        $stmt=ConexionV::conectar()->prepare("insert into usuario(login_usuario, password, perfil) values('$loginUsuario', 
        '$password', '$perfil')");

        if($stmt->execute()){
            return "ok";
        }
        else{
            return "error";
        }

  /*       $stmt->close();
        $stmt->null();
 */

    }

    static public function mdlInfoUsuario($id){
        $stmt=ConexionV::conectar()->prepare("select * from usuario where id_usuario=$id");
        $stmt->execute();

        return $stmt->fetch();

  /*   $stmt->close();
        $stmt->null; */ 
    }

static public function mdlEditUsuario($data){

        $password=$data["password"];
        $perfil=$data["perfil"];
        $estado=$data["estado"];
        $id=$data["id"]; 

        $stmt=ConexionV::conectar()->prepare("update usuario set password='$password', perfil='$perfil',
        estado='$estado' where id_usuario=$id");

        if($stmt->execute()){
            return "ok";
        }
        else{
            return "error";
        }
/* 
        $stmt->close();
        $stmt->null();
 */
}

static public function mdlEliUsuario($id){

    $stmt=ConexionV::conectar()->prepare("delete from usuario where id_usuario=$id");

    if($stmt->execute()){
        return "ok";
    }
    else{
        return "error";
    }
/* 
    $stmt->close();
    $stmt->null();
*/

}

static public function mdlCantidadUsuarios(){
    $stmt=ConexionV::conectar()->prepare("select count(*) as usuario from usuario");
    $stmt->execute();

    return $stmt->fetch();

    /*   $stmt->close();
    $stmt->null; */ 
}

}//final