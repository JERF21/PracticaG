<form action="" id="FRegLibro" enctype="multipart/form-data">
  <div class="modal-header">
    <h4 class="modal-title">Registro Nuevo Libro</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body mg-info">
  <table class="table">
    <div class="form-group">
      <label for="exampleInputBorder">Título</label>
      <input type="text" class="form-control" placeholder="" name="tituloLibro" id="tituloLibro">
    </div>
    <div class="form-group">
    <label for="autorLibro">Autor</label>
    <select class="form-control" name="autorLibro" id="autorLibro">
        <option value="">Seleccione un autor</option>
        <?php
        $host = "localhost";
        $db = "biblioteca";
        $userDB = "root";
        $passDB = "";
        
        try {
            $link = new PDO("mysql:host=".$host.";dbname=".$db, $userDB, $passDB);
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $link->prepare("SELECT id_autor, nombre, apellido FROM autor");
            $stmt->execute();
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $nombreCompleto = htmlspecialchars($row['nombre'] . ' ' . $row['apellido']);
                echo "<option value='" . $nombreCompleto . "'>" . $nombreCompleto . "</option>";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    </select>
</div>

<div class="form-group">
    <label for="autorLibro">Género</label>
    <select class="form-control" name="generoLibro" id="generoLibro">
        <option value="">Seleccione un género</option>
        <?php
        $host = "localhost";
        $db = "biblioteca";
        $userDB = "root";
        $passDB = "";
        
        try {
            $link = new PDO("mysql:host=".$host.";dbname=".$db, $userDB, $passDB);
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $link->prepare("SELECT id_genero, nombre FROM genero");
            $stmt->execute();
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $nombre = htmlspecialchars($row['nombre']);
              echo "<option value='" . $nombre . "'>" . $nombre . "</option>";
          }
      } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
      }
        ?>
    </select>
</div>

    <div class="form-group">
      <label for="exampleInputBorder">Sinopsis</label>
      <input type="text" class="form-control" placeholder="" name="sinopsisLibro" id="sinopsisLibro">
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Fecha de Publicacion</label>
      <input type="date" class="form-control" placeholder="" name="fechaLibro" id="fechaLibro">
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Editorial</label>
      <input type="text" class="form-control" placeholder="" name="editorialLibro" id="editorialLibro">
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Páginas</label>
      <input type="text" class="form-control" placeholder="" name="paginasLibro" id="paginasLibro">
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Stock</label>
      <input type="text" class="form-control" placeholder="" name="stockLibro" id="stockLibro">
    </div>

    <div class="row">
      <div class="col-sm-6" >
      <div class="form-group">
        <label>Imagen <span class="text-muted">(Peso máximo 10MB - JPG,PNG)</span></label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="imgLibro" name="imgLibro" onchange="previsualizar()">
            <label class="custom-file-label" for="imgLibro">Elegir archivo</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text">Subir</span>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group" style="text-align:center">
          <img src="recursos/img/libros/user-default.jpg" alt="" width="150" class="img-thumbnail previsualizar">
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
        regLibro()
      }
    });
    $('#FRegLibro').validate({
      rules: {
        nombreLibro: {
          required: true,
          minlength: 3,
        },
        apellidoLibro: {
          required: true,
          minlength: 3,
        },
        emailLibro: {
          required: true,
          minlength: 3,
        },
        telefonoLibro: {
          required: true,
          minlength: 1,
        },
        direccionMedidad: {
          required: true,
          minlength: 1,
        },
        imgLibro: {
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