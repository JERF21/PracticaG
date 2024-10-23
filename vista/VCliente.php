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
          <h3 class="card-title">Lista de clientes</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>

                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Direccion</th>
                <th>Imagen</th>
                <td>
                  <button class="btn btn-primary" onclick="MNuevoCliente()">Nuevo</button>
                </td>
              </tr>
            </thead>

            <tbody>
              <?php
              $cliente = ControladorClienteV::ctrInfoClientes();
              // var_dump($cliente);
              foreach ($cliente as $value) {
              ?>
                <tr>
                  <td><?php echo $value["nombre"]; ?></td>
                  <td><?php echo $value["apellido"]; ?></td>
                  <td><?php echo $value["email"]; ?></td>
                  <td><?php echo $value["telefono"]; ?></td>
                  <td><?php echo $value["direccion"]; ?></td>
                  <td><?php
                      if ($value["imagen_cliente"]=="") {
                      ?>
        <img src="recursos/img/clientes/product_default.png" alt="" width="50" class="img-thumbnail">
                    <?php
                      } else {
                    ?>
  <img src="recursos/img/clientes/<?php echo $value["imagen_cliente"];?>" alt="" width="100" class="img-thumbnail">
                    <?php
                      }
                    ?>
                  </td>
                  <td>
                    <div class="btn-group">
                      <button class="btn btn-info" onclick="MVerCliente(<?php echo $value["id_cliente"]; ?>)">
                        <i class="fas fa-eye"></i>
                      </button>
                      <button class="btn btn-secondary" onclick="MEditCliente(<?php echo $value["id_cliente"]; ?>)">
                        <i class="fas fa-edit"></i>
                      </button>
                      <button class="btn btn-danger" onclick="MEliCliente(<?php echo $value["id_cliente"]; ?>)">
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