<?php
require_once("../bd/conexion.php");
$id = $_POST['id'];
$producto = $_POST['producto'];
$gramos = $_POST['gramos'];
$carbohidratos = $_POST['carbohidratos'];

  mysqli_query($link,"UPDATE calorias set producto = '$producto', gramos = '$gramos', carbohidratos = '$carbohidratos' where id='$id'"); 
echo "
                <script language='JavaScript'>
                alert('Se estan modificando los datos.');
                document.location='caloria.php';
                </script>";
?>