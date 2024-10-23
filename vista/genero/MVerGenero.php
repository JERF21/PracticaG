<?php

require_once "../../controladorV/generoControlador.php";
require_once "../../modeloV/generoModelo.php";

$id = $_GET["id"];
$genero = ControladorGeneroV::ctrInfoGenero($id);

?>

<div class="modal-header bg-info">
    <h4 class="modal-title">Información de Genero</h4>
    <button type="button" class="close" data-dismiss="modal-default" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-6">
            <table class="table">
                <tr>
                    <th>Nombre</th>
                    <td><?php echo $genero["nombre"]; ?></td>
                </tr>
                <tr>
                    <th>Descripción</th>
                    <td><?php echo $genero["descripcion"]; ?></td>
                </tr>
                </tr>
            </table>
        </div>
    </div>
</div>



</div>