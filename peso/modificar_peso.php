<?php
require_once("../bd/conexion.php");
$id = $_POST['id'];
$peso = $_POST['peso'];
// $fecha = $_POST['gramos'];

// $carbohidratos = $_POST['carbohidratos'];

  mysqli_query($link,"UPDATE peso set peso = '$peso' where id='$id'"); 
echo "
                <script language='JavaScript'>
                alert('Se estan modificando los datos.');
                document.location='peso.php';
                </script>";
?>