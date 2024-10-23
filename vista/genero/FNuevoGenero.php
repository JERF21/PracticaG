<form action="" id="FRegGenero" enctype="multipart/form-data">
  <div class="modal-header">
    <h4 class="modal-title">Registrar Nuevo Genero</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body mg-info">
  <table class="table">
    <div class="form-group">
      <label for="exampleInputBorder">Nombre</label>
      <input type="text" class="form-control" placeholder="" name="nombreGenero" id="nombreGenero">
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Descripcion</label>
      <input type="text" class="form-control" placeholder="" name="descripcionGenero" id="descripcionGenero">
    </div>



</table>
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
        regGenero()
      }
    });
    $('#FRegGenero').validate({
      rules: {
        codGenero: {
          required: true,
          minlength: 3,
        },
        codGeneroSIN: {
          required: true,
          minlength: 3,
        },
        desGenero: {
          required: true,
          minlength: 3,
        },
        preGenero: {
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
        },
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