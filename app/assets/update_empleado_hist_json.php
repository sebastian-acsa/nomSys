<?php
	/* desarrollo
	$mvc_bd_hostname = "localhost";
	$mvc_bd_nombre   = "rhsys";
	$mvc_bd_usuario  = "sebastian2";
	$mvc_bd_clave    = "";
	*/
	// produccion
	$mvc_bd_hostname = "localhost";
	$mvc_bd_nombre   = "rhsys";
	$mvc_bd_usuario  = "sebastian_rhsys";
	$mvc_bd_clave    = "Hum4nf0rc3";
	

		
	

	   $mvc_bd_conexion = mysql_connect($mvc_bd_hostname, $mvc_bd_usuario, $mvc_bd_clave);

       if (!$mvc_bd_conexion) {
           die('No ha sido posible realizar la conexión con la base de datos: ' . mysql_error());
       }
       mysql_select_db($mvc_bd_nombre, $mvc_bd_conexion);

       mysql_set_charset('utf8');

       $id= $_GET['id'];
       $fiscal= $_GET['fiscal'];
       $efectivo= $_GET['efectivo'];


       $conexion = $mvc_bd_conexion;
	   $sql = "UPDATE nom_nomias_historico SET fiscal='".$fiscal."', sueldo_efectivo ='".$efectivo."' WHERE id_nom_hist =".$id;

		$result = mysql_query($sql, $conexion) or die(mysql_error());
		echo json_encode($result);

		?>