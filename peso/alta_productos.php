<?php
require_once ("../bd/conexion.php");
$peso = $_POST['peso'];
$fecha = $_POST['fecha'];




$sql = "INSERT INTO peso(peso,fecha) values ('$peso','$fecha')";


$consulta=mysqli_query($link,$sql );

  echo "
 
<script>
    if(confirm(\"\u00bfDesea realizar un nuevo peso?\")){
                window.location.href='registrar_peso.php';
                }else{
                window.location.href='peso.php';
                }
 </script>";
?>