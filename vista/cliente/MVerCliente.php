<?php

require_once "../../controladorV/clienteControlador.php";
require_once "../../modeloV/clienteModelo.php";

$id = $_GET["id"];
$cliente = ControladorClienteV::ctrInfoCliente($id);

?>

<div class="modal-header bg-info">
    <h4 class="modal-title">Información de Cliente</h4>
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
                    <td><?php echo $cliente["nombre"]; ?></td>
                </tr>
                <tr>
                    <th>Apellido</th>
                    <td><?php echo $cliente["apellido"]; ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?php echo $cliente["email"]; ?></td>
                </tr>
                <tr>
                    <th>Teléfono</th>
                    <td><?php echo $cliente["telefono"]; ?></td>
                </tr>
                <tr>
                    <th>Dirección</th>
                    <td><?php echo $cliente["direccion"]; ?></td>
                </tr>
            </table>
        </div>
        <div class="col-sm-6">
            <?php
            if ($cliente["imagen_cliente"]=="") {
            ?>
                <img src="recursos/img/clientes/user-default.jpg" alt="" width="300" class="img-thumbnail">
            <?php
            } else {
            ?>
                <img src="recursos/img/clientes/<?php echo $cliente["imagen_cliente"]; ?> " alt="" width="300" class="img-thumbnail">
            <?php
            }
            ?>
        </div>
    </div>
</div>



</div>