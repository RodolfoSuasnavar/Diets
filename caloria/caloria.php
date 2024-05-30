<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Calorie Tracked</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

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
        <img src="../assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Calorie Tracked</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

  
<!-- aqui -->
    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown">

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

      <li class="nav-item">
        <a class="nav-link " href="caloria.php">
          <i class="bi bi-grid"></i>
          <span>Calorie Tracked</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Caloria</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="calorias.php">
              <i class="bi bi-circle"></i><span>Caloria</span>
            </a>
          </li>
          <li>
            <a href="registrar_productos.php">
              <i class="bi bi-circle"></i><span>Agregar Caloria</span>
            </a>
          </li>
          </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-journal-text"></i><span>Peso</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="../peso/peso.php">
              <i class="bi bi-circle"></i><span>Peso</span>
            </a>
          </li>
          <li>
            <a href="../peso/registrar_peso.php">
              <i class="bi bi-circle"></i><span>Agregar Peso</span>
            </a>
          </li>
          </ul>
      </li><!-- End Forms Nav -->


    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Caloria</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="caloria.php">Caloria</a></li>
          <li class="breadcrumb-item active">Inicio</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
    <div class="col-md-8 offset-md-3">
      <table  border="0" cellspacing="0" >
    <form action="#" method="post" id="frmbuscar">
     <tr class="espacio">
     <td align="right"> <label for="producto">Nombre del producto:</label></td><td><input type="text" class="form-control" name="producto" id="producto" autocomplete="off"></td>
     <td align="center" colspan="2"><input type="submit"  class="btn btn-success w-100" value="Consultar"  title="Consultar"></td>
     </tr>
    <?php
      
      if(isset($_POST['producto']) ){
  
            require_once("../bd/conexion.php");
        
      $result = mysqli_query($link, "SELECT * FROM calorias WHERE producto  like '$_POST[producto]%'");
         
      echo "<table class='table table-striped'>";
      echo "<tr>               
                  <th class='success'>Producto</th>   
                  <th class='success'>Gramos</th>  
                  <th class='success'>Carbohidratos</th> 
                  <th class='success'>Modificar</th>  
                  <th class='success'>Eliminar</th>  

        

            </tr>";
            while  (($row = mysqli_fetch_array($result))!=NULL)
            {
            
            $id =  $row['id']; 
            $producto =  $row['producto']; 
            $gramos =  $row['gramos'];
            $carbohidratos =  $row['carbohidratos'];

          ?>
           <tr>
            <td class='active'><?php echo $producto ?></td>
            <td class='active'><?php echo $gramos ?></td>
            <td class='active'><?php echo $carbohidratos ?></td>


            
            <?php 
              // if($row_user['tipo'] != 3){
            ?>
            <td class="active text-center"><center><a href='modificar.php?id=<?php echo $id ?>'><i class='bi bi-journals'></i></a></center></td>
            <td class='active' align='center'><a onClick='confirmar(<?php echo $id ?>)'><i class='bi bi-person-dash-fill'></i></a></td>
            
            </tr> 
            <?php
              }
            ?>
      
            <?php 
            }
            echo "</table>";
            // }
            ?> 
            </form>                                                                                                                             
            </table> 
          </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy;  <strong><span>Calorie Tracked</span></strong>. 
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
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
  <script language="javascript"> 
    


    function confirmar(id){ 
    confirmar=confirm("\u00bfRealmente deseas eliminar el registro?"); 
    if (confirmar) 
    {
    document.location="eliminar_productos.php?opcion="+id;
    }
    else  
    {
      document.location="caloria.php";
    } 
    }
    </script>

</body>

</html>