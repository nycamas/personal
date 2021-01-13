<?php
	if(isset($_POST['nom'])){ $nombre = $_POST['nom'];}
	if(isset($_POST['mail'])){ $mail = $_POST['mail'];}
	if(isset($_POST['tlf'])){ $tlf = $_POST['tlf'];}
	if(isset($_POST['que'])){ $que = $_POST['que'];}
	if(isset($_POST['asunto'])){ $asunto = $_POST['asunto'];}
	$conexion=@mysqli_connect("sql212.byethost.com","b4_24219838","@m7)ubxY*WyB55hhz2WC","b4_24219838_proyectos");
	if (!$conexion) {
    	echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    	echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
   		echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    	exit;
		}
	$query="INSERT INTO `wp-contacto` (id, Nombre, Email, Tlf, Asunto, Texto, Fecha) VALUES (NULL,'$nombre', '$mail', '$tlf', '$que', '$asunto', CURRENT_TIMESTAMP)";
	$resul=$conexion -> query($query);
	if($resul){
		echo "<script> alert('Datos enviados')</script>" ;	
		echo "<script language='javascript'>window.location.href='http://developsevilla.a0001.net/';</script>";
	}else {

		echo "<script> alert('Datos no se han podido intoducir')</script>" ;
	}

?> 