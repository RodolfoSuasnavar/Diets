<?php
include 'fsesion.php';
//uso de la funcion verificar_usuario()
if (verificar_usuario()){

	$bandera=$_SESSION['tipo'];
   
	 echo '<script> alert('.$bandera.');</script>';  
 echo "<script>alert('$bandera')</script>";
  

	if ($bandera=='1') {
	header('Location:caloria/caloria.php');
 
	}

	else if ($bandera=='2') {
		header('Location:caloria/caloriadmin.php');
	}
	else if ($bandera=='3') {
		header('Location:caloria/caloria.php');
	}

};

?>