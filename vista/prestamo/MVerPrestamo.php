<?php

require_once "../../controladorV/prestamoControlador.php";
require_once "../../modeloV/prestamoModelo.php";

$id = $_GET["id"];
$prestamo = ControladorPrestamoV::ctrInfoPrestamo($id);

?>

<div class="modal-header bg-info">
    <h4 class="modal-title">Información de Prestamo</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-6">
            <table class="table">
                <tr>
                    <th>Cliente</th>
                    <td><?php echo $prestamo["cliente"]; ?></td>
                </tr>
                <tr>
                    <th>Libro</th>
                    <td><?php echo $prestamo["libro"]; ?></td>
                </tr>
                <tr>
                    <th>Fecha de Préstamo</th>
                    <td><?php echo $prestamo["fecha_prestamo"]; ?></td>
                </tr>
                <tr>
                    <th>Fecha de Devolución</th>
                    <td><?php echo $prestamo["fecha_devolucion"]; ?></td>
                </tr>
                <tr>
                    <th>Estado</th>
                    <td><?php
                      if ($prestamo["estado"] == 0) {
                      ?>
                      <span class="badge badge-success">Prestado</span>
                    <?php
                      } else {
                    ?>
                      <span class="badge badge-danger">No devuelto</span>
                    <?php
                      } ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>



</div>