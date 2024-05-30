<?php

include 'fsesion.php';

//usuario y clave pasados por el formulario
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];


//usa la funcion conexiones() que se ubica dentro de fsesion.php
if (conexiones($usuario, $clave)){
	//si es valido accedemos a ingreso.php
  header("Location:ingreso.php");
} else {
	//si no es valido volvemos al formulario inicial
 
     header("Location:login.html?msg='Error'");
} 
?>