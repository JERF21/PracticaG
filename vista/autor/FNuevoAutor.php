<form action="" id="FRegAutor" enctype="multipart/form-data">
  <div class="modal-header">
    <h4 class="modal-title">Registro Nuevo Autor</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body mg-info">
  <table class="table">
    <div class="form-group">
      <label for="exampleInputBorder">Nombre</label>
      <input type="text" class="form-control" placeholder="" name="nombreAutor" id="nombreAutor">
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Apellido</label>
      <input type="text" class="form-control" placeholder="" name="apellidoAutor" id="apellidoAutor">
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Nacionalidad</label>
      <input type="text" class="form-control" placeholder="" name="nacionalidadAutor" id="nacionalidadAutor">
    </div>
   <div class="form-group">
      <label for="exampleInputBorder">Fecha de Nacimiento</label>
      <input type="date" class="form-control" placeholder="" name="nacimientoAutor" id="nacimientoAutor">
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Biografia</label>
      <input type="text" class="form-control" placeholder="" name="biografiaAutor" id="biografiaAutor">
    </div>

    <div class="row">
      <div class="col-sm-6" >
      <div class="form-group">
        <label>Imagen <span class="text-muted">(Peso máximo 10MB - JPG,PNG)</span></label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="imgAutor" name="imgAutor" onchange="previsualizar()">
            <label class="custom-file-label" for="imgAutor">Elegir archivo</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text">Subir</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group" style="text-align:center">
          <img src="recursos/img/autors/user-default.jpg" alt="" width="150" class="img-thumbnail previsualizar">
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
        regAutor()
      }
    });
    $('#FRegAutor').validate({
      rules: {
        nombreAutor: {
          required: true,
          minlength: 3,
        },
        apellidoAutor: {
          required: true,
          minlength: 3,
        },
        emailAutor: {
          required: true,
          minlength: 3,
        },
        telefonoAutor: {
          required: true,
          minlength: 1,
        },
        direccionMedidad: {
          required: true,
          minlength: 1,
        },
        imgAutor: {
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