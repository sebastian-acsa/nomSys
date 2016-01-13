<?php
class ExternoModel
 {
    protected $conexion;

    public function __construct(){
    }

    public function dame_empleados(){
    	//$query = "SELECT num_proy, nombre_proyecto, tipo_proyecto, estatus FROM proyectos.proy where estatus in ('3','4','6')"; 
		$dbconn = pg_connect("host=localhost port=5432 dbname=proyectos user=postgres password=qwerty");
		$query = "select p.nombre_proyecto from proyectos.proy p, proyectos.personal_de_proyectos pp where num_proyecto=num_proy and id_admin =82"; 
		    $result = pg_query($query); 
		    if (!$result) { 
		        echo "Problem with query " . $query . "<br/>"; 
		        echo pg_last_error(); 
		        exit(); 
		    }
		    $proyectos=array();
		    while($myrow = pg_fetch_assoc($result)) { 
		         $proyectos[] = $row;    
		    } 
		    return($proyectos);
    }


}
?>