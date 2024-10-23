<?php

require_once "../../controladorV/libroControlador.php";
require_once "../../modeloV/libroModelo.php";

$id = $_GET["id"];
$libro = ControladorLibroV::ctrInfoLibro($id);

?>

<div class="modal-header bg-info">
    <h4 class="modal-title">Información de Libro</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-6">
            <table class="table">
                <tr>
                    <th>Título</th>
                    <td><?php echo $libro["titulo"]; ?></td>
                </tr>
                <tr>
                    <th>Autor</th>
                    <td><?php echo $libro["autor"]; ?></td>
                </tr>
                <tr>
                    <th>Género</th>
                    <td><?php echo $libro["genero"]; ?></td>
                </tr>
                <tr>
                    <th>Sinopsis</th>
                    <td><?php echo $libro["sinopsis"]; ?></td>
                </tr>
                <tr>
                    <th>Fecha de Publicación</th>
                    <td><?php echo $libro["fecha_publicacion"]; ?></td>
                </tr>
                <tr>
                    <th>Editorial</th>
                    <td><?php echo $libro["editorial"]; ?></td>
                </tr>
                <tr>
                    <th>Páginas</th>
                    <td><?php echo $libro["numero_paginas"]; ?></td>
                </tr>
                <tr>
                    <th>Stock</th>
                    <td><?php echo $libro["stock"]; ?></td>
                </tr>
            </table>
        </div>
        <div class="col-sm-6">
            <?php
            if ($libro["imagen_libro"]=="") {
            ?>
                <img src="recursos/img/libros/user-default.jpg" alt="" width="300" height="300" class="img-thumbnail">
            <?php
            } else {
            ?>
                <img src="recursos/img/libros/<?php echo $libro["imagen_libro"]; ?> " alt="" width="300" height="300" class="img-thumbnail">
            <?php
            }
            ?>
        </div>
    </div>
</div>



</div>