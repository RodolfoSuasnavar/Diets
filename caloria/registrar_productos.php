<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Calorie Tracked</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/logo.png" rel="icon">
  <link href="../assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.2.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="caloria.php" class="logo d-flex align-items-center">
        <img src="../assets/img/favicon.png" alt="">
        <span class="d-none d-lg-block">Calorie Tracked</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <!-- <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form> -->
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
        
      </ul>
            <?php
include('../fsesion.php');
if (verificar_usuario()){
    echo '<br><p align="right"> <label>Bienvenido '.$_SESSION['usuario']; echo '<br> &nbsp; <a href="../salir.php"> Cerrar sesi&oacute;n </a> </label></p> ';
    //Aqui adentro se pone el contenido que deseas que sea visualizado por el usuario autenticado
  $valor=$_SESSION['usuario'];
  require_once("../bd/conexion.php");
  $user = mysqli_query($link, "SELECT * FROM usuario WHERE usuario = '$valor'");
  $row_user = mysqli_fetch_array($user);

} else {
    header('Location:../login.html');
}
?>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
      <?php 
        if($row_user['tipo'] == 2){
      ?>
        <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse" href="#">
          <i class="bi bi-cart"></i><span>Control de Alimentos</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="calorias.php">
              <i class="bi bi-circle"></i><span>Consultar info. Alimentos</span>
            </a>
          </li>
          <li>
            <a href="registrar_productos.php">
              <i class="bi bi-circle"></i><span>Registrar alimento</span>
            </a>
          </li>
        </ul>
        
      <?php
        }else{
      ?>
      <li class="nav-item">
        <a class="nav-link " href="registrar_productos.php">
          <i class="bi bi-grid"></i>
          <span>Calorie Tracked</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-square"></i><span>Calorias</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="caloria.php">
              <i class="bi bi-circle"></i><span>Calorias</span>
            </a>
          </li>
          <li>
            <a href="registrar_producto.php">
              <i class="bi bi-circle"></i><span>Agregar</span>
            </a>
          </li>
          
        </ul>
      </li><!-- End Components Nav -->
      
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav1" data-bs-toggle="collapse" href="#">
          <i class="bi bi-person-lines-fill"></i><span>Peso</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav1" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../peso/peso.php">
              <i class="bi bi-circle"></i><span>Peso</span>
            </a>
          </li>
          <li>
            <a href="../peso/registrar_peso.php">
              <i class="bi bi-circle"></i><span>Agregar</span>
            </a>
          </li>
        </ul>
<!-- 
        <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav2" data-bs-toggle="collapse" href="#">
          <i class="bi bi-cart"></i><span>Productos</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav2" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="registrar_productos.php">
              <i class="bi bi-circle"></i><span>Registrar</span>
            </a>
          </li>
          <li>
            <a href="productos.php">
              <i class="bi bi-circle"></i><span>Consultar</span>
            </a>
          </li>
        </ul>
 -->
        <!-- <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav3" data-bs-toggle="collapse" href="#">
          <i class="bi bi-truck"></i><span>Proveedores</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav3" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../proveedores/registrar_proveedores.php">
              <i class="bi bi-circle"></i><span>Registrar</span>
            </a>
          </li>
          <li>
            <a href="../proveedores/proveedores.php">
              <i class="bi bi-circle"></i><span>Consultar</span>
            </a>
          </li>
        </ul>
      <li class="nav-heading">Reportes</li>
 -->
      <!-- <li class="nav-item">
        <a class="nav-link collapsed" onclick="abrirReporte()">
          <i class="bi bi-journals"></i>
          <span>Clientes</span>
        </a>
      </li>End Profile Page Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" onclick="abrirReporte()">
          <i class="bi bi-journals"></i>
          <span>Empleados</span>
        </a>
      </li>End F.A.Q Page Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" onclick="abrirReporte()">
          <i class="bi bi-journals"></i>
          <span>Productos</span>
        </a>
      </li>End Contact Page Nav -->

      <!-- <li class="nav-item">
        <a class="nav-link collapsed" onclick="abrirReporte()">
          <i class="bi bi-journals"></i>
          <span>Proveedores</span>
        </a>
      </li>End Register Page Nav -->
      <?php
        }
      ?>
      
      
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Registrar Calorias</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item">Agregar</a></li>
          <li class="breadcrumb-item active">Calorias</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          </div><!-- End Right side columns -->

      </div>
    </section>

  </main><!-- End #main -->

<section>
      <div class="container">
        <div>
          <div class="col-md-6 offset-md-3">
              <div class="panel panel-primary">
                      
                      <table width="100%">
                      <form action="alta_productos.php" method="post" id="frmcliente" enctype="multipart/form-data">
                      <tr class="espacio"> 
                      <td align="right"> <label for="producto">Producto:</label></td><td><input type="text" class="form-control" name="producto" id="producto" placeholder="Ingresa un producto" autofocus required pattern="[a-zA-Z ]{2,254}"></td>
                      </tr> 
                      <br>
                      <tr class="espacio"> 
                      <tr class="espacio"> 
                      <td align="right"> <label for="gramos">Gramos:</label></td><td><input type="text" class="form-control" name="gramos" id="gramos" placeholder="Ingresa los gramos" required ></td>
                      </tr> 
                       <tr class="espacio"> 
                      <td align="right"> <label for="carbohidratos">Carbohidratos:</label></td><td><input type="text" class="form-control" name="carbohidratos" id="carbohidratos" placeholder="Ingresa los carbohidratos" required></td>
                      </tr> 
                      <!--<tr class="espacio"> 
                      <td align="right"> <label for="cantidad">Cantidad:</label></td><td><input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Ingresa la cantidad" required></td>
                      </tr> 
                      <tr class="espacio"> 
                      <td align="right"> <label for="precio_unitario">Precio Unitario:</label></td><td><input type="number" class="form-control" name="precio_unitario" id="precio_unitario" placeholder="Ingresa el precio_unitario" required step="0.01"></td>
                      </tr>  -->
                                            
                      <tr>
                <td align="center" colspan="2"><input type="submit"  name="registrar" class="btn btn-success w-30" value="Registrar"  title="Registrar"></td>
                      </tr>
                      </form>
                      </table>
                      <br><br><br><br><br><br><br><br><br><br><br><br><br>
                      <!-- termina la tabla -->
                      </div>
                      </div>
          </div>
        </div>
      </div>
    </section>

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; <strong><span>Calorie Tracked</span></strong>. 
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.min.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.min.js"></script>
  <script src="../assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  
  <script>
      function abrirReporte()
      {
        window.open("../reporte_clientes/index.php");
      }
    </script>

</body>

</html>