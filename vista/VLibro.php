<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de libros</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>

                <th>Título</th>
                <th>Autor</th>
                <th>Género</th>
                <th>Fecha de Publicación</th>
                <th>Imagen</th>
                <td>
                  <button class="btn btn-primary" onclick="MNuevoLibro()">Nuevo</button>
                </td>
              </tr>
            </thead>

            <tbody>
              <?php
              $libro = ControladorLibroV::ctrInfoLibros();
              // var_dump($libro);
              foreach ($libro as $value) {
              ?>
                <tr>
                  <td><?php echo $value["titulo"]; ?></td>
                  <td><?php echo $value["autor"]; ?></td>
                  <td><?php echo $value["genero"]; ?></td>
                  <td><?php echo $value["fecha_publicacion"]; ?></td>
                  <td><?php
                      if ($value["imagen_libro"]=="") {
                      ?>
        <img src="recursos/img/libros/user-default.png" alt="" width="50" class="img-thumbnail">
                    <?php
                      } else {
                    ?>
  <img src="recursos/img/libros/<?php echo $value["imagen_libro"];?>" alt="" width="100" class="img-thumbnail">
                    <?php
                      }
                    ?>
                  </td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-info" onclick="MVerLibro(<?php echo $value["id_libro"]; ?>)">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button class="btn btn-secondary" onclick="MEditLibro(<?php echo $value["id_libro"]; ?>)">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="btn btn-danger" onclick="MEliLibro(<?php echo $value["id_libro"]; ?>)">
                        <i class="fas fa-trash"></i>
                      </button>
                    </div>
                  </td>
                </tr>
              <?php
              }
              ?>
            </tbody>

          </table>
        </div>
        <!-- /.card-body -->
      </div>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->