<form action="" id="FRegPrestamo" enctype="multipart/form-data">
  <div class="modal-header">
    <h4 class="modal-title">Registro Nuevo Prestamo</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body mg-info">
  <table class="table">

  <div class="form-group">
    <label for="autorLibro">Cliente</label>
    <select class="form-control" name="clientePrestamo" id="clientePrestamo">
        <option value="">Seleccione un cliente</option>
        <?php
        $host = "localhost";
        $db = "biblioteca";
        $userDB = "root";
        $passDB = "";
        
        try {
            $link = new PDO("mysql:host=".$host.";dbname=".$db, $userDB, $passDB);
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $link->prepare("SELECT id_cliente, nombre, apellido FROM cliente");
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

<!--     <div class="form-group">
      <label for="exampleInputBorder">Cliente</label>
      <input type="text" class="form-control" placeholder="" name="clientePrestamo" id="clientePrestamo">
    </div> -->

    <div class="form-group">
    <label for="autorLibro">Libro</label>
    <select class="form-control" name="libroPrestamo" id="libroPrestamo">
        <option value="">Seleccione un libro</option>
        <?php
        $host = "localhost";
        $db = "biblioteca";
        $userDB = "root";
        $passDB = "";
        
        try {
            $link = new PDO("mysql:host=".$host.";dbname=".$db, $userDB, $passDB);
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $link->prepare("SELECT id_libro, titulo FROM libro");
            $stmt->execute();
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              $titulo = htmlspecialchars($row['titulo']);
              echo "<option value='" . $titulo . "'>" . $titulo . "</option>";
          }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    </select>
</div>

<!--     <div class="form-group">
      <label for="exampleInputBorder">Libro</label>
      <input type="text" class="form-control" placeholder="" name="libroPrestamo" id="libroPrestamo">
    </div> -->
    <div class="form-group">
      <label for="exampleInputBorder">Fecha de Préstamo</label>
      <input type="date" class="form-control" placeholder="" name="fechapPrestamo" id="fechapPrestamo">
    </div>
    <div class="form-group">
      <label for="exampleInputBorder">Fecha de Devolución</label>
      <input type="date" class="form-control" placeholder="" name="fechadPrestamo" id="fechadPrestamo">
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
        regPrestamo()
      }
    });
    $('#FRegPrestamo').validate({
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
        },
        imgPrestamo: {
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