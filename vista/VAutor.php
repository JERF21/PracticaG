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
          <h3 class="card-title">Lista de autores</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>

                <th>Nombre</th>
                <th>Apellido</th>
                <th>Nacionalidad</th>
                <th>Fecha de Nacimiento</th>
                <th>Foto</th>
                <td>
                  <button class="btn btn-primary" onclick="MNuevoAutor()">Nuevo</button>
                </td>
              </tr>
            </thead>

            <tbody>
              <?php
              $autor = ControladorAutorV::ctrInfoAutors();
              // var_dump($autor);
              foreach ($autor as $value) {
              ?>
                <tr>
                  <td><?php echo $value["nombre"]; ?></td>
                  <td><?php echo $value["apellido"]; ?></td>
                  <td><?php echo $value["nacionalidad"]; ?></td>
                  <td><?php echo $value["fecha_nacimiento"]; ?></td>
                  <td><?php
                      if ($value["imagen_autor"]=="") {
                      ?>
        <img src="recursos/img/autors/user-default.png" alt="" width="50" class="img-thumbnail">
                    <?php
                      } else {
                    ?>
  <img src="recursos/img/autors/<?php echo $value["imagen_autor"];?>" alt="" width="100" class="img-thumbnail">
                    <?php
                      }
                    ?>
                  </td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-info" onclick="MVerAutor(<?php echo $value["id_autor"]; ?>)">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button class="btn btn-secondary" onclick="MEditAutor(<?php echo $value["id_autor"]; ?>)">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="btn btn-danger" onclick="MEliAutor(<?php echo $value["id_autor"]; ?>)">
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