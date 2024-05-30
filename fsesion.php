<?php
//funcion para conectar a la base de datos y verificar la existencia del usuario
function conexiones($usuario, $clave) {
  //conexion con el servidor de base de datos MySQL
	$conectar = mysqli_connect('localhost','root','','dietas');

	if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $validate_user = htmlentities($usuario);
  $validate_pass = htmlentities($clave);

	//sentencia sql para consultar el nombre del usuario
 $sql="SELECT * FROM usuario WHERE usuario='$validate_user' AND clave='$validate_pass'";
 $result=mysqli_query($conectar,$sql);

	//si existe inicia una sesion y guarda el nombre del usuario
	if (mysqli_num_rows($result)!=0){

		//inicio de sesion
		session_start();
		//configurar un elemento usuario dentro del arreglo global $_SESSION
		$row = mysqli_fetch_array($result);
 	$tipo = $row[3];
 	 echo '<script type="text/javascript"> alert('.$tipo.')</script>';	
	$_SESSION['usuario']=$row['usuario'];
    $_SESSION['nombre']=$row['nombre'];
    $_SESSION['tipo']=$tipo;
		//retornar verdadero
		return true;
	} else {
		//retornar falso
		return false;
	}
	mysqli_close($conectar);
}

//funcion para verificar que dentro del arreglo global $_SESSION existe el nombre del usuario
function verificar_usuario(){
	//continuar una sesion iniciada
	session_start();
	//comprobar la existencia del usuario
	if ($_SESSION['tipo']){
		return true;
	}
  	if ($_SESSION['nombre']){
		return true;
	}
}
?>