<body class="hold-transition layout-top-nav">
  <div class="wrapper">
    <!-- Navbar (Barra Superior) -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <a href="inicio" class="navbar-brand">
        <img src="recursos/img/libros.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">GDB</span>
      </a>

      <!-- Toggle menu for small screens -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <!-- Usuarios -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="usuariosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="nav-icon fas fa-user"></i> Usuarios
            </a>
            <div class="dropdown-menu" aria-labelledby="usuariosDropdown">
              <a class="dropdown-item" href="VUsuario"><i class="far fa-circle nav-icon"></i> Lista de Usuarios</a>
            </div>
          </li>

   
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="clientesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="nav-icon fas fa-users"></i> Clientes
            </a>
            <div class="dropdown-menu" aria-labelledby="clientesDropdown">
              <a class="dropdown-item" href="VCliente"><i class="far fa-circle nav-icon"></i> Lista de Clientes</a>
            </div>
          </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="productosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="nav-icon fas fa-bookmark"></i> Generos
            </a>
            <div class="dropdown-menu" aria-labelledby="productosDropdown">
              <a class="dropdown-item" href="VGenero"><i class="far fa-circle nav-icon"></i> Lista de Generos</a>
            </div>
          </li> 

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="productosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="nav-icon fas fa-star"></i> Autores
            </a>
            <div class="dropdown-menu" aria-labelledby="productosDropdown">
              <a class="dropdown-item" href="VAutor"><i class="far fa-circle nav-icon"></i> Lista de Autores</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="productosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="nav-icon fas fa-book"></i> Libros
            </a>
            <div class="dropdown-menu" aria-labelledby="productosDropdown">
              <a class="dropdown-item" href="VLibro"><i class="far fa-circle nav-icon"></i> Lista de Libros</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="productosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="nav-icon fas fa-address-card"></i> Préstamos
            </a>
            <div class="dropdown-menu" aria-labelledby="productosDropdown">
              <a class="dropdown-item" href="VPrestamo"><i class="far fa-circle nav-icon"></i> Lista de Préstamos</a>
            </div>
          </li>
<!--           <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="productosDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="nav-icon fas fa-box"></i> Productos
            </a>
            <div class="dropdown-menu" aria-labelledby="productosDropdown">
              <a class="dropdown-item" href="VProducto"><i class="far fa-circle nav-icon"></i> Lista de Productos</a>
              <a class="dropdown-item" href="SinCatalogos"><i class="far fa-circle nav-icon"></i> Sincronización Catálogo</a>
            </div>
          </li> -->
<!-- 
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="ventasDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="nav-icon fas fa-cash-register"></i> Ventas
            </a>
            <div class="dropdown-menu" aria-labelledby="ventasDropdown">
              <a class="dropdown-item" href="FormVenta"><i class="far fa-circle nav-icon"></i> Emitir Factura</a>
              <a class="dropdown-item" href="VFactura"><i class="far fa-circle nav-icon"></i> Lista de Facturas</a>
            </div>
          </li> -->

          <!-- Salir -->
          <li class="nav-item">
            <a href="salir" class="nav-link">
              <i class="fas fa-door-open nav-icon"></i> Salir
            </a>
          </li>
        </ul>
      </div>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

        <!-- User Info -->
        <li class="nav-item">
          <a href="#" class="nav-link" id="usuarioLogin"><?php echo $_SESSION["login"]?></a>
          <input type="hidden" id="idUsuario" value="<?php echo $_SESSION["idUsuario"];?>">
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

  </div>
</body>
