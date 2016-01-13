<?php

 class NominasModel
 {
    protected $conexion;

    public function __construct($dbname,$dbuser,$dbpass,$dbhost){
		 //$mvc_bd_conexion = pg_connect("host=localhost dbname=rh_dm user=PHP password=php_dev")
    	//or die('No se ha podido conectar: ' . pg_last_error());
		$mvc_bd_conexion = mysql_connect($dbhost, $dbuser, $dbpass);

		if (!$mvc_bd_conexion) {
			die('No ha sido posible realizar la conexión con la base de datos: ' . mysql_error());
		}
		mysql_select_db($dbname, $mvc_bd_conexion);

		mysql_set_charset('utf8');

		$this->conexion = $mvc_bd_conexion;
    }



	public function bd_conexion() //coneccion a la base de datos
	{
	}

    public function insertarNomina($nomina_new)
			{
			  	extract($nomina_new);
				$cta_cont= htmlspecialchars($cta_cont);
				$centro_costos= htmlspecialchars($centro_costos);
			
				$empleado_id= htmlspecialchars($empleado_id);
				
				$sql = "insert into nom_nomina_adm (cta_cont,centro_costos,empleado_id )
				values('".$cta_cont."','".$centro_costos."','".$empleado_id."')";
				
				$result = mysql_query($sql, $this->conexion) or die(mysql_error());

         		return $result;
			  } 
	
	public function reiniciar_nom(){
		$sql="DELETE FROM `nom_nomias_historico` WHERE semana = YEARWEEK(NOW())";
		$result = mysql_query($sql, $this->conexion) or die(mysql_error());
	}


	public function editarNomina($nomina_new)
	{
		extract($nomina_new);
		$cta_cont= htmlspecialchars($cta_cont);
		$centro_costos= htmlspecialchars($centro_costos);
		$empleado_id= htmlspecialchars($empleado_id);
		

		$sql="Update set nom_nomina_adm cta_cont=".$cta_cont.",centro_costos=".$centro_costos.",empleado_id=".$empleado_id." where id=".$id;
		$result = mysql_query($sql, $this->conexion) or die(mysql_error());
        return $result;
	}


	public function dameNominas() // ajustar a postgress
	{
		 $sql = "select n.*, e.* from nom_nomina_adm n, empleados e where n.empleado_id=e.empleado_id ";
		 $result = mysql_query($sql, $this->conexion);
		 $nomina_adm = array();
		 if($result){
		 	while ($row = mysql_fetch_assoc($result))
		 	{
		     $nomina_adm[] = $row;
		 	}
		 }
		 return $nomina_adm;
	}
	//porsi las dudas
	public function dameNominasActivos() // ajustar a postgress
	{
	 $sql = "select n.*, e.* from nom_nomina_adm n, empleados e where n.empleado_id=e.empleado_id and e.status=1 ";

	 $result = mysql_query($sql, $this->conexion);
	 $nomina_adm = array();
	 if($result){
	 	while ($row = mysql_fetch_assoc($result))
	 	{
	     $nomina_adm[] = $row;
	 	}

	 }
	 return $nomina_adm;
	}
	//porsi las dudas
	public function dameNominasInactivos() // ajustar a postgress
	{
	 $sql = "select n.*, e.* from nom_nomina_adm n, empleados e where n.empleado_id=e.empleado_id and e.status <>1 ";

	 $result = mysql_query($sql, $this->conexion);
	 $nomina_adm = array();
	 if($result){
	 	while ($row = mysql_fetch_assoc($result))
	 	{
	     $nomina_adm[] = $row;
	 	}

	 }
	 return $nomina_adm;
	}

	public function dameCuentas()
	{



		// $mvc_bd_conexion = mysql_connect("localhost", "sebastian2", "");

		// if (!$mvc_bd_conexion) {
		// 	die('No ha sido posible realizar la conexión con la base de datos: ' . mysql_error());
		// }
		// mysql_select_db("rhsys", $mvc_bd_conexion);

		// mysql_set_charset('utf8');

		// $conexion2 = $mvc_bd_conexion;

		$sql = "SELECT SUM(e.su_sem_efectivo ) efectivo , SUM(e.su_sem_fiscal) fiscal , p.cuenta_contable num_cuenta,p.cuenta_contable_alt num_cuenta_alt,p.cuenta_contable_nombre num_cuenta_nom, p.concepto concepto, p.centro_costos centro_costos
		FROM  empleados e, puestos p
		WHERE e.puesto = p.clave  AND p.cuenta_contable <> '' 
		GROUP BY p.cuenta_contable";
		$result = mysql_query($sql, $this->conexion);
		$cuentas = array();
		while ($row = mysql_fetch_assoc($result))
		{
		 $cuentas[] = $row;
		}

		return $cuentas;
	}


	public function comprobar_existencia(){
		$sql="SELECT count(*) cantidad FROM  nom_nomias_historico WHERE semana = YEARWEEK( NOW( ) )";
		$result = mysql_query($sql, $this->conexion);
		$row = mysql_fetch_assoc($result);
		
		return $row['cantidad'];
		
	}


	public function addRegistroHistorico($registro)
	{
		extract($registro);

		$sql="INSERT INTO nom_nomias_historico(nombre, departamento_name,puesto, empresa,cta_contable, centro_costos, num_cta_ban, su_sem, sueldo_neto, fiscal, sueldo_efectivo,semana) 
		VALUES ('".$nombre."','".$departamento_name."','".$puesto_name."','".$Empresa."','".$cta_contable."','".$centro_costos."','".$num_cta_ban."','".$su_sem."','".$neto."','".$fiscal."','".$su_sem_efectivo."', YEARWEEK(NOW()) )";

		$result = mysql_query($sql, $this->conexion) or die(mysql_error());
        return $result;
	}

	public function dameCostoPorEmpresa()
	{
		$sql = "SELECT SUM(e.su_sem_efectivo ) efectivo , SUM(e.su_sem_fiscal) fiscal , r.nombre empresa FROM  empleados e, razones_sociales r WHERE e.razon_social_id = r.razon_social_id and e.area_id=2	GROUP BY e.razon_social_id";
		$cuentas = array();
		if($result = mysql_query($sql, $this->conexion)){
			
			while ($row = mysql_fetch_assoc($result))
			{
			 $cuentas[] = $row;
			}

			return $cuentas;
		}
		else{
			echo $result;
			return $cuentas;
		}
	}

	public function insertarTabla($tabla)
			{
			  	
				$cta_cont= htmlspecialchars($cta_cont);
				$centro_costos= htmlspecialchars($centro_costos);
			
				$empleado_id= htmlspecialchars($empleado_id);
				
				$sql = "insert into nomina.nom_ad_time_machine (arreglo)
				values('".$tabla."')";
				
				$result = mysql_query($sql, $this->conexion) or die(mysql_error());

         		return $result;
			  } 




	

	public function validarDatos($nomina)
	{
	 	return (is_int($empleado_id) &
	 		is_string($cta_cont) &
	         is_string($centro_costos) 
			 );
	}

 }

 ?>