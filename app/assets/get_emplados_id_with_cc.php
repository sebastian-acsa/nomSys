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

       $conexion = $mvc_bd_conexion;
	$sql = "SELECT DISTINCT(e.empleado_id) id, p.cuenta_contable_alt cuenta FROM  empleados e, puestos p WHERE e.puesto = p.clave  AND p.cuenta_contable <> '' and e.area_id=2 ";

		$result = mysql_query($sql, $conexion);
		$empleados = array();
		if($result){
			while ($row = mysql_fetch_assoc($result))
			{
		 		$empleados[] = $row;
			}

		}
		$empleado_id = array();
		foreach ($empleados as $empleado) {
			$empleado_id[] =$empleado;
		}
		echo json_encode($empleado_id);

		?>