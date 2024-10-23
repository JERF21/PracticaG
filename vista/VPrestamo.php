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
          <h3 class="card-title">Lista de prestamos</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Cliente</th>
                <th>Libro</th>
                <th>Fecha de préstamo</th>
                <th>Fecha de devolución</th>
                <th>Estado</th>
                <td>
                  <button class="btn btn-primary" onclick="MNuevoPrestamo()">Nuevo</button>
                </td>
              </tr>
            </thead>

            <tbody>
              <?php
              $prestamo = ControladorPrestamoV::ctrInfoPrestamos();
              // var_dump($prestamo);
              foreach ($prestamo as $value) {
              ?>
                <tr>
                <td><?php echo $value["id_prestamo"]; ?></td>
                  <td><?php echo $value["cliente"]; ?></td>
                  <td><?php echo $value["libro"]; ?></td>
                  <td><?php echo $value["fecha_prestamo"]; ?></td>
                  <td><?php echo $value["fecha_devolucion"]; ?></td>

                  <td><?php
                      if ($value["estado"] == 0) {
                      ?>
                      <span class="badge badge-success">Prestado</span>
                    <?php
                      } else {
                    ?>
                      <span class="badge badge-danger">No devuelto</span>
                    <?php
                      } ?>
                  </td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-info" onclick="MVerPrestamo(<?php echo $value["id_prestamo"]; ?>)">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button class="btn btn-secondary" onclick="MEditPrestamo(<?php echo $value["id_prestamo"]; ?>)">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="btn btn-danger" onclick="MEliPrestamo(<?php echo $value["id_prestamo"]; ?>)">
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