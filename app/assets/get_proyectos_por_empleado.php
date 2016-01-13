
<?php
 	

$query = "select p.nombre_proyecto from proy p, personal_de_proyectos pp where num_proyecto=num_proy and id_admin =? and num_proy in (?)"; 

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
        print_r($proyectos);

        //echo json_encode($proyectos);



?>

