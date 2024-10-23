<?php

require_once "../../controladorV/libroControlador.php";
require_once "../../modeloV/libroModelo.php";

$id = $_GET["id"];
$libro = ControladorLibroV::ctrInfoLibro($id);

?>


<form action="" id="FEditLibro" enctype="multipart/form-data">
  <div class="modal-header bg-secondary">
    <h4 class="modal-title">Editar Libro</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
  
    <div class="form-group">
      <label for="exampleInputBorder">Titulo</label>
      <input type="text" class="form-control" placeholder="" name="tituloLibro" id="tituloLibro" value="<?php echo $libro["titulo"];?>">
    </div>
    <div class="form-group">
    <label for="autorLibro">Autor</label>
    <select class="form-control" name="autorLibro" id="autorLibro">
    <option value="<?php echo $libro["autor"];?>"><?php echo $libro["autor"];?></option>
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
    <input type="hidden" name="idLibro" value="<?php echo $libro["id_libro"];?>">
</div>

<div class="form-group">
    <label for="autorLibro">Género</label>
    <select class="form-control" name="generoLibro" id="generoLibro">
        <option value="<?php echo $libro["genero"];?>"><?php echo $libro["genero"];?></option>
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
              // Solo muestra el nombre en el valor de la opción
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
      <input type="text" class="form-control" placeholder="" name="sinopsisLibro" id="sinopsisLibro" value="<?php echo $libro["sinopsis"];?>">
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Fecha de Publicación</label>
      <input type="date" class="form-control" placeholder="" name="fechaLibro" id="fechaLibro" value="<?php echo $libro["fecha_publicacion"];?>">
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Editorial</label>
      <input type="text" class="form-control" placeholder="" name="editorialLibro" id="editorialLibro" value="<?php echo $libro["editorial"];?>">
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Páginas</label>
      <input type="text" class="form-control" placeholder="" name="paginasLibro" id="paginasLibro" value="<?php echo $libro["numero_paginas"];?>">
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Stock</label>
      <input type="text" class="form-control" placeholder="" name="stockLibro" id="stockLibro" value="<?php echo $libro["stock"];?>">
    </div>

    <div class="row">
      <div class="col-sm-6">
      <div class="form-group">
        <label>Imagen <span class="text-muted">(Peso máximo 10MB - JPG,PNG)</span></label>
        <div class="input-group">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="imgLibro" name="imgLibro" onchange="previsualizar()">
            <input type="hidden" name="imgActual" value="<?php echo $libro["imagen_libro"];?>">
            <label class="custom-file-label" for="imgLibro">Elegir archivo</label>
          </div>
          <div class="input-group-append">
            <span class="input-group-text">Subir</span>
          </div>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="form-group" style="text-align:center">
        <?php
        if($libro["imagen_libro"]==""){
          ?>
          <img src="recursos/img/libros/user-default.jpg" alt="" width="150" class="img-thumbnail previsualizar">
          <?php
        }else{
          ?>
          <img src="recursos/img/libros/<?php echo $libro["imagen_libro"];?>" alt="" width="150" class="img-thumbnail previsualizar">
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
        editLibro()
      }
    });
    $('#FEditLibro').validate({
      rules: {
        codLibro: {
          required: true,
          minlength: 3,
        },
        codLibroSIN: {
          required: true,
          minlength: 3,
        },
        desLibro: {
          required: true,
          minlength: 3,
        },
        preLibro: {
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