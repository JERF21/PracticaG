<?php

require_once "../../controladorV/autorControlador.php";
require_once "../../modeloV/autorModelo.php";

$id = $_GET["id"];
$autor = ControladorAutorV::ctrInfoAutor($id);

?>


<form action="" id="FEditAutor" enctype="multipart/form-data">
  <div class="modal-header bg-secondary">
    <h4 class="modal-title">Editar Autor</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
  
    <div class="form-group">
      <label for="exampleInputBorder">Nombre</label>
      <input type="text" class="form-control" placeholder="" name="nombreAutor" id="nombreAutor" value="<?php echo $autor["nombre"];?>">
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Apellido</label>
      <input type="text" class="form-control" placeholder="" name="apellidoAutor" id="apellidoAutor" value="<?php echo $autor["apellido"];?>">
      <input type="hidden" name="idAutor" value="<?php echo $autor["id_autor"];?>">
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Nacionalidad</label>
      <input type="text" class="form-control" placeholder="" name="nacionalidadAutor" id="nacionalidadAutor" value="<?php echo $autor["nacionalidad"];?>">
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Fecha de Nacimiento</label>
      <input type="date" class="form-control" placeholder="" name="nacimientoAutor" id="nacimientoAutor" value="<?php echo $autor["fecha_nacimiento"];?>">
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Biografia</label>
      <input type="text" class="form-control" placeholder="" name="biografiaAutor" id="biografiaAutor" value="<?php echo $autor["biografia"];?>">
    </div>

    <div class="row">
      <div class="col-sm-6">
      <div class="form-group">
        <label>Imagen <span class="text-muted">(Peso máximo 10MB - JPG,PNG)</span></label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="imgAutor" name="imgAutor" onchange="previsualizar()">
            <input type="hidden" name="imgActual" value="<?php echo $autor["imagen_autor"];?>">
            <label class="custom-file-label" for="imgAutor">Elegir archivo</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text">Subir</span>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group" style="text-align:center">
        <?php
        if($autor["imagen_autor"]==""){
          ?>
          <img src="recursos/img/autors/user-default.jpg" alt="" width="150" class="img-thumbnail previsualizar">
          <?php
        }else{
          ?>
          <img src="recursos/img/autors/<?php echo $autor["imagen_autor"];?>" alt="" width="150" class="img-thumbnail previsualizar">
          <?php
        }
        ?>
          
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
        editAutor()
      }
    });
    $('#FEditAutor').validate({
      rules: {
        codAutor: {
          required: true,
          minlength: 3,
        },
        codAutorSIN: {
          required: true,
          minlength: 3,
        },
        desAutor: {
          required: true,
          minlength: 3,
        },
        preAutor: {
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