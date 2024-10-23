<?php
//conntroladores
require_once "controlador/rutas.controlador.php";
require_once "controlador/usuarios.controlador.php";
// require_once "controlador/clientes.controlador.php";
require_once "controlador/libros.controlador.php";
require_once "controlador/autor.controlador.php";
require_once "controlador/cliente.controlador.php";
require_once "controlador/genero.controlador.php";
require_once "controlador/prestamo.controlador.php";

//modelos
require_once "modelo/usuarios.modelo.php";
// require_once "modelo/clientes.modelo.php";
require_once "modelo/libros.modelo.php";
require_once "modelo/autor.modelo.php";
require_once "modelo/cliente.modelo.php";
require_once "modelo/genero.modelo.php";
require_once "modelo/prestamo.modelo.php";



require_once "controladorV/plantillaControlador.php";
require_once "controladorV/usuarioControlador.php";
require_once "controladorV/clienteControlador.php";
require_once "controladorV/generoControlador.php";
require_once "controladorV/autorControlador.php";
require_once "controladorV/libroControlador.php";
require_once "controladorV/prestamoControlador.php";
require_once "controladorV/productoControlador.php";


require_once "modeloV/usuarioModelo.php";
require_once "modeloV/clienteModelo.php";
require_once "modeloV/generoModelo.php";
require_once "modeloV/autorModelo.php";
require_once "modeloV/libroModelo.php";
require_once "modeloV/prestamoModelo.php";
require_once "modeloV/productoModelo.php";


echo "prueba conflicto";

$plantilla=new ControladorPlantillaV();
$plantilla->ctrPlantilla();

/* $rutas=new ControladorRutas();
$rutas->inicio(); */
?>