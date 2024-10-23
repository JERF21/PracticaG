 <!-- Main Footer -->
 <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Sistema de Gestión de Biblioteca
    </div>
    <!-- Default to the left -->
    <strong><a href="https://google.com">jerf-industries.com</a></strong>
  </footer>
</div>
<!-- ./wrapper -->
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="recursos/css/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="recursos/css/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="recursos/js/adminlte.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="recursos/css/datatables/jquery.dataTables.min.js"></script>
<script src="recursos/css/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="recursos/css/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="recursos/css/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="recursos/css/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="recursos/css/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="recursos/css/jszip/jszip.min.js"></script>
<script src="recursos/css/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="recursos/css/datatables-buttons/js/buttons.print.min.js"></script>
<script src="recursos/css/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- SweetAlert2 -->
<script src="recursos/css/sweetalert2/sweetalert2.min.js"></script>
<!-- ChartJS -->
<script src="recursos/css/chart.js/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="assest/dist/js/pages/dashboard.js"></script> -->

<script src="recursos/js/usuario.js"></script>
<script src="recursos/js/cliente.js"></script>
<script src="recursos/js/genero.js"></script>
<script src="recursos/js/autor.js"></script>
<script src="recursos/js/libro.js"></script>
<script src="recursos/js/prestamo.js"></script>
<!-- <script src="assest/js/usuario.js"></script>
<script src="assest/js/cliente.js"></script>-->
<!-- <script src="assest/js/producto.js"></script> -->

<!--===============
seccion de modals
=================-->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content" id="content-default">

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
 
<div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content" id="content-lg">
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <div class="modal fade" id="modal-xl">
        <div class="modal-dialog modal-xl">
          <div class="modal-content" id="content-xl">
            
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

  <!-- jquery-validation -->
<script src="recursos/css/jquery-validation/jquery.validate.min.js"></script>
<script src="recursos/css/jquery-validation/additional-methods.min.js"></script>
<script src="recursos/css/jquery-validation/localization/messages_es.js"></script>

<script>
 $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    
  });
</script>
</body>
</html>
