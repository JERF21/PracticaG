<?php

require_once "../../controladorV/usuarioControlador.php";
require_once "../../modeloV/usuarioModelo.php";

$id=$_GET["id"];
$usuario=ControladorUsuarioV::ctrInfoUsuario($id);

?>
<form action="" id="FEditUsuario">
            <div class="modal-header">
              <h4 class="modal-title">Editar Usuario</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="form-group">
                <label for="">Login Usuario</label>
                <input type="text" class="form-control" name="login" id="login" value="<?php echo $usuario["login_usuario"];?>" readonly>
                <input type="hidden" name="idUsuario" value="<?php echo $usuario["id_usuario"]; ?>">
              </div>
              <div class="form-group">
                <label for="">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password" value="<?php echo $usuario["password"];?>">
              </div>
              <div class="form-group">
                <label for="">Repetir Contraseña</label>
                <input type="password" class="form-control" name="vrPassword" id="vrPassword" value="<?php echo $usuario["password"];?>">
            <input type="hidden" value="<?php echo $usuario["password"];?>" name="passActual">  
            </div>
              <div class="form-group">
                <label for="">Perfil</label>
                <select name="perfil" id="perfil" class="form-control">
                    <option value="Director" <?php if($usuario["perfil"]=="Director"):?>selected<?php endif;?>
                        >Director</option>
                    <option value="Bibliotecario"  <?php if($usuario["perfil"]=="Bibliotecario"):?>selected<?php endif;?>
                        >Bibliotecario </option>
                    <option value="Auxiliar" <?php if($usuario["perfil"]=="Auxiliar"):?>selected<?php endif;?>
                        >Auxiliar</option>
                    <option value="Tecnico"  <?php if($usuario["perfil"]=="Tecnico"):?>selected<?php endif;?>
                        >Tecnico </option>
                </select>
              </div>
              <div class="form-group">
              

        
        

        


            </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            </div>
</form>

<script>
$(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      editUsuario()
    }
  });
  $('#FEditUsuario').validate({
    rules: {
 
      password: {
        required: true,
        minlength: 3
      },
      vrPassword: {
        required: true,
        minlength: 3
      },
    },

    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>