<?php

require_once "../../controladorV/autorControlador.php";
require_once "../../modeloV/autorModelo.php";

$id = $_GET["id"];
$autor = ControladorAutorV::ctrInfoAutor($id);

?>

<div class="modal-header bg-info">
    <h4 class="modal-title">Información de Autor</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-6">
            <table class="table">
                <tr>
                    <th>Nombre</th>
                    <td><?php echo $autor["nombre"]; ?></td>
                </tr>
                <tr>
                    <th>Apellido</th>
                    <td><?php echo $autor["apellido"]; ?></td>
                </tr>
                <tr>
                    <th>Nacionalidad</th>
                    <td><?php echo $autor["nacionalidad"]; ?></td>
                </tr>
                <tr>
                    <th>Fecha de Nacimiento</th>
                    <td><?php echo $autor["fecha_nacimiento"]; ?></td>
                </tr>
                <tr>
                    <th>Biografia</th>
                    <td><?php echo $autor["biografia"]; ?></td>
                </tr>
            </table>
        </div>
        <div class="col-sm-6">
            <?php
            if ($autor["imagen_autor"]=="") {
            ?>
                <img src="recursos/img/autors/user-default.jpg" alt="" width="300" height="300" class="img-thumbnail">
            <?php
            } else {
            ?>
                <img src="recursos/img/autors/<?php echo $autor["imagen_autor"]; ?> " alt="" width="300" height="300" class="img-thumbnail">
            <?php
            }
            ?>
        </div>
    </div>
</div>



</div>