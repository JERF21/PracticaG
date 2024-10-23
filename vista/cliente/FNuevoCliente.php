<form action="" id="FRegCliente" enctype="multipart/form-data">
  <div class="modal-header">
    <h4 class="modal-title">Registro Nuevo Cliente</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body mg-info">
  <table class="table">
    <div class="form-group">
      <label for="exampleInputBorder">Nombre</label>
      <input type="text" class="form-control" placeholder="" name="nombreCliente" id="nombreCliente">
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Apellido</label>
      <input type="text" class="form-control" placeholder="" name="apellidoCliente" id="apellidoCliente">
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Email</label>
      <input type="text" class="form-control" placeholder="" name="emailCliente" id="emailCliente">
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Teléfono</label>
      <input type="text" class="form-control" placeholder="" name="telefonoCliente" id="telefonoCliente">
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Dirección</label>
      <input type="text" class="form-control" placeholder="" name="direccionCliente" id="direccionCliente">
    </div>

    <div class="row">
      <div class="col-sm-6" >
      <div class="form-group">
        <label>Imagen <span class="text-muted">(Peso máximo 10MB - JPG,PNG)</span></label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="imgCliente" name="imgCliente" onchange="previsualizar()">
            <label class="custom-file-label" for="imgCliente">Elegir archivo</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text">Subir</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group" style="text-align:center">
          <img src="recursos/img/clientes/user-default.jpg" alt="" width="150" class="img-thumbnail previsualizar">
        </div>
      </div>
    </div>
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
        regCliente()
      }
    });
    $('#FRegCliente').validate({
      rules: {
        nombreCliente: {
          required: true,
          minlength: 3,
        },
        apellidoCliente: {
          required: true,
          minlength: 3,
        },
        emailCliente: {
          required: true,
          minlength: 3,
        },
        telefonoCliente: {
          required: true,
          minlength: 1,
        },
        direccionMedidad: {
          required: true,
          minlength: 1,
        },
        imgCliente: {
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