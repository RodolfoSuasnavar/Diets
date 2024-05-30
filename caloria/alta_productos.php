<?php
require_once ("../bd/conexion.php");
$producto = $_POST['producto'];
$gramos = $_POST['gramos'];
$carbohidratos = $_POST['carbohidratos'];



$sql = "INSERT INTO calorias(producto,gramos,carbohidratos) values ('$producto','$gramos','$carbohidratos')";


$consulta=mysqli_query($link,$sql );

  echo "
 
<script>
    if(confirm(\"\u00bfDesea realizar un nuevo registro?\")){
                window.location.href='registrar_productos.php';
                }else{
                window.location.href='productos.php';
                }
 </script>";
?>