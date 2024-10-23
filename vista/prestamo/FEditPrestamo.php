<?php

require_once "../../controladorV/prestamoControlador.php";
require_once "../../modeloV/prestamoModelo.php";

$id = $_GET["id"];
$prestamo = ControladorPrestamoV::ctrInfoPrestamo($id);

?>


<form action="" id="FEditPrestamo" enctype="multipart/form-data">
  <div class="modal-header bg-secondary">
    <h4 class="modal-title">Editar Prestamo</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
  
    <div class="form-group">
      <label for="exampleInputBorder">Cliente</label>
      <input type="text" class="form-control" placeholder="" name="clientePrestamo" id="clientePrestamo" value="<?php echo $prestamo["cliente"];?>" readonly>
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Libro</label>
      <input type="text" class="form-control" placeholder="" name="libroPrestamo" id="libroPrestamo" value="<?php echo $prestamo["libro"];?>" readonly>
      <input type="hidden" name="idPrestamo" value="<?php echo $prestamo["id_prestamo"];?>">
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Fecha de Préstamo</label>
      <input type="text" class="form-control" placeholder="" name="fechapPrestamo" id="fechapPrestamo" value="<?php echo $prestamo["fecha_prestamo"];?>" readonly>
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Fecha de Devolución</label>
      <input type="text" class="form-control" placeholder="" name="fechadPrestamo" id="fechadPrestamo" value="<?php echo $prestamo["fecha_devolucion"];?>" readonly>
    </div>


      <div class="form-group">
        <label for="">Estado</label>
        <div class="row">
          <div class="col-sm-6">
            <div class="custom-control custom-radio">
            <input type="radio" id="estadoActivo" name="estadoPrestamo" value="0" <?php if($prestamo["estado"]=="0"):?>checked<?php endif;?>>
            <label for="estadoActivo">Prestado</label>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="custom-control custom-radio">
            <input type="radio" id="estadoInactivo" name="estadoPrestamo" value="1" <?php if($prestamo["estado"]=="1"):?>checked<?php endif;?>>
            <label for="estadoActivo">No devuelto</label>
            </div>
          </div>
        </div>
      </div>

    </div>
    </div>



  </div>
  <div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
  </div>
</form>

<script>
  $(function() {
    $.validator.setDefaults({
      submitHandler: function() {
        editPrestamo()
      }
    });
    $('#FEditPrestamo').validate({
      rules: {
        codPrestamo: {
          required: true,
          minlength: 3,
        },
        codPrestamoSIN: {
          required: true,
          minlength: 3,
        },
        desPrestamo: {
          required: true,
          minlength: 3,
        },
        prePrestamo: {
          required: true,
          minlength: 1,
        },
        unidadMedidad: {
          required: true,
          minlength: 1,
        },
        unidadMedidadSIN: {
          required: true,
          minlength: 1,
        }
      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>