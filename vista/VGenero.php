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
          <h3 class="card-title">Lista de generos</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <td>
                  <button class="btn btn-primary" onclick="MNuevoGenero()">Nuevo</button>
                </td>
              </tr>
            </thead>

            <tbody>
              <?php
              $genero = ControladorGeneroV::ctrInfoGeneros();
              // var_dump($genero);
              foreach ($genero as $value) {
              ?>
                <tr>
                  <td><?php echo $value["id_genero"]; ?></td>
                  <td><?php echo $value["nombre"]; ?></td>
                  <td><?php echo $value["descripcion"]; ?></td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-info" onclick="MVerGenero(<?php echo $value["id_genero"]; ?>)">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button class="btn btn-secondary" onclick="MEditGenero(<?php echo $value["id_genero"]; ?>)">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="btn btn-danger" onclick="MEliGenero(<?php echo $value["id_genero"]; ?>)">
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