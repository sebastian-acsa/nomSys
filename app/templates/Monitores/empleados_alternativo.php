 <?php ob_start() ?>
 <style>
.sangria{
    margin-right:10px;
    }
table{
    margin: 0 auto;
}
h2.area{
    text-align: center;
}
.centrados{
    text-align: center;
    background-color:rgba(158, 158, 158, 0.25);
}
.ancla{
    text-decoration:none;
    color:black;

}
.ancla:link {color: black; text-decoration: none }
.ancla:hover {color: black; text-decoration: none }
.ancla:visited {color: black; text-decoration: none }
</style>

<h2 class="area"><strong>AREA OPERATIVA</strong>&nbsp; <a href="./app/assets/Monitor_empleados.php" target="_blank"><img src="./img/xlsbtn.jpg" width="25px" height="25px"></a></h2>
 <div style="float:center">
     <table border="1" width="720px">
        
         <tr><!--encabezados-->
             <th width="350" class="centrados" style="background-color: rgba(158, 158, 158, 0.76);">&nbsp;&nbsp;&nbsp;Nombre</th>
             
             <th width="350" class="centrados" style="background-color: rgba(158, 158, 158, 0.76);">&nbsp;&nbsp;&nbsp;Puesto</th>
             
         </tr>
         <tr><td colspan="2" class="centrados"><?php echo $params['diseno'][0]['departamento_name'];?></td></tr>

         <?php foreach ($params['diseno'] as $empleado) :?>

         <tr>
            <td>&nbsp;&nbsp;&nbsp;<a href="index.php?ctl=ver&id=<?php echo $empleado['empleado_id']?>&zona=<?php echo $empleado['empleado_id']?>">
                     <?php echo $empleado['nombre']." ".$empleado['apellido_p']." ".$empleado['apellido_m']; ?></a></td> 
            <td><a class="ancla" name="<?php echo $empleado['empleado_id']?>">&nbsp;&nbsp;&nbsp;<?php echo $empleado['puesto_name'] ?></a></td>

             <!--datos a mostrar-->
         </tr>
         <?php endforeach; ?>

         <tr><td colspan="2" class="centrados"><?php echo $params['presupuestos'][0]['departamento_name'];?></td></tr>
         <?php foreach ($params['presupuestos'] as $empleado) :?>
         <tr>
            <td>&nbsp;&nbsp;&nbsp;<a href="index.php?ctl=ver&id=<?php echo $empleado['empleado_id']?>&zona=<?php echo $empleado['empleado_id']?>">
                     <?php echo $empleado['nombre']." ".$empleado['apellido_p']." ".$empleado['apellido_m']; ?></a></td> 
            <td><a class="ancla" name="<?php echo $empleado['empleado_id']?>">&nbsp;&nbsp;&nbsp;<?php echo $empleado['puesto_name'] ?></a></td>

             <!--datos a mostrar-->
         </tr>
         <?php endforeach; ?>

         <tr><td colspan="2" class="centrados"><?php echo $params['planeacion'][0]['departamento_name'];?></td></tr>
         <?php foreach ($params['planeacion'] as $empleado) :?>
         <tr>
            <td>&nbsp;&nbsp;&nbsp;<a href="index.php?ctl=ver&id=<?php echo $empleado['empleado_id']?>&zona=<?php echo $empleado['empleado_id']?>">
                     <?php echo $empleado['nombre']." ".$empleado['apellido_p']." ".$empleado['apellido_m']; ?></a></td> 
            <td><a class="ancla" name="<?php echo $empleado['empleado_id']?>">&nbsp;&nbsp;&nbsp;<?php echo $empleado['puesto_name'] ?></a></td>

             <!--datos a mostrar-->
         </tr>
         <?php endforeach; ?>
     
        <tr><td colspan="2" class="centrados"><?php echo $params['admin_proy'][0]['departamento_name'];?></td></tr>
         <?php foreach ($params['admin_proy'] as $empleado) :?>
         <tr>
            <td>&nbsp;&nbsp;&nbsp;<a href="index.php?ctl=ver&id=<?php echo $empleado['empleado_id']?>&zona=<?php echo $empleado['empleado_id']?>">
                     <?php echo $empleado['nombre']." ".$empleado['apellido_p']." ".$empleado['apellido_m']; ?></a></td> 
            <td><a class="ancla" name="<?php echo $empleado['empleado_id']?>">&nbsp;&nbsp;&nbsp;<?php echo $empleado['puesto_name'] ?></a></td>

             <!--datos a mostrar-->
         </tr>
         <?php endforeach; ?>

         <tr><td colspan="2" class="centrados"><?php echo $params['calidad'][0]['departamento_name'];?></td></tr>
         <?php foreach ($params['calidad'] as $empleado) :?>
         <tr>
            <td>&nbsp;&nbsp;&nbsp;<a href="index.php?ctl=ver&id=<?php echo $empleado['empleado_id']?>&zona=<?php echo $empleado['empleado_id']?>">
                     <?php echo $empleado['nombre']." ".$empleado['apellido_p']." ".$empleado['apellido_m']; ?></a></td> 
            <td><a class="ancla" name="<?php echo $empleado['empleado_id']?>">&nbsp;&nbsp;&nbsp;<?php echo $empleado['puesto_name'] ?></a></td>

             <!--datos a mostrar-->
         </tr>
         <?php endforeach; ?>


         <tr><td colspan="2" class="centrados"><?php echo $params['construccion'][1]['departamento_name'];?></td></tr>

         <?php foreach ($params['construccion'] as $empleado) :?>
         <tr>
            <td>&nbsp;&nbsp;&nbsp;<a href="index.php?ctl=ver&id=<?php echo $empleado['empleado_id']?>&zona=<?php echo $empleado['empleado_id']?>">
                     <?php echo $empleado['nombre']." ".$empleado['apellido_p']." ".$empleado['apellido_m']; ?></a></td> 
            <td><a class="ancla" name="<?php echo $empleado['empleado_id']?>">&nbsp;&nbsp;&nbsp;<?php echo $empleado['puesto_name'] ?></a></td>

             <!--datos a mostrar-->
         </tr>
         <?php endforeach; ?>
     </table>
</div>
      <h2 class="area" name="adminstrativa"><strong>AREA ADMINISTRATIVA</strong></h2>
  <div style="float:center">
    <table border="1" width="720px">
        <tr><!--encabezados-->
             <th width="350" class="centrados" style="background-color: rgba(158, 158, 158, 0.76);">&nbsp;&nbsp;&nbsp;Nombre</th>
             
             <th width="350" class="centrados" style="background-color: rgba(158, 158, 158, 0.76);">&nbsp;&nbsp;&nbsp;Puesto</th>
             
         </tr>
        
         <tr><td colspan="2" class="centrados"><?php echo $params['direccion'][0]['departamento_name'];?></td></tr>
         <?php foreach ($params['direccion'] as $empleado) :?>
         <tr>
            <td>&nbsp;&nbsp;&nbsp;<a href="index.php?ctl=ver&id=<?php echo $empleado['empleado_id']?>&zona=<?php echo $empleado['empleado_id']?>">
                     <?php echo $empleado['nombre']." ".$empleado['apellido_p']." ".$empleado['apellido_m']; ?></a></td> 
            <td><a class="ancla" name="<?php echo $empleado['empleado_id']?>">&nbsp;&nbsp;&nbsp;<?php echo $empleado['puesto_name'] ?></a></td>

             <!--datos a mostrar-->
         </tr>
         <?php endforeach; ?>

         <tr><td colspan="2" class="centrados"><?php echo $params['relaciones'][0]['departamento_name'];?></td></tr>
         <?php foreach ($params['relaciones'] as $empleado) :?>
         <tr>
            <td>&nbsp;&nbsp;&nbsp;<a href="index.php?ctl=ver&id=<?php echo $empleado['empleado_id']?>&zona=<?php echo $empleado['empleado_id']?>">
                     <?php echo $empleado['nombre']." ".$empleado['apellido_p']." ".$empleado['apellido_m']; ?></a></td> 
            <td><a class="ancla" name="<?php echo $empleado['empleado_id']?>">&nbsp;&nbsp;&nbsp;<?php echo $empleado['puesto_name'] ?></a></td>

             <!--datos a mostrar-->
         </tr>
         <?php endforeach; ?>
        
        
         <tr><td colspan="2" class="centrados"><?php echo $params['comercial'][0]['departamento_name'];?></td></tr>
         <?php foreach ($params['comercial'] as $empleado) :?>
         <tr>
            <td>&nbsp;&nbsp;&nbsp;<a href="index.php?ctl=ver&id=<?php echo $empleado['empleado_id']?>&zona=<?php echo $empleado['empleado_id']?>">
                     <?php echo $empleado['nombre']." ".$empleado['apellido_p']." ".$empleado['apellido_m']; ?></a></td> 
            <td><a class="ancla" name="<?php echo $empleado['empleado_id']?>">&nbsp;&nbsp;&nbsp;<?php echo $empleado['puesto_name'] ?></a></td>

             <!--datos a mostrar-->
         </tr>
         <?php endforeach; ?>

        <?php if(isset($params['finanzas'][0]['departamento_name'])&& !empty($params['finanzas'][0]['departamento_name'])){?>
          <table border="1" width="720px">
        
         
         <tr><td colspan="2" class="centrados"><?php echo $params['finanzas'][0]['departamento_name'];?></td></tr>
         <?php foreach ($params['finanzas'] as $empleado) :?>
         <tr>
            <td>&nbsp;&nbsp;&nbsp;<a href="index.php?ctl=ver&id=<?php echo $empleado['empleado_id']?>&zona=<?php echo $empleado['empleado_id']?>">
                     <?php echo $empleado['nombre']." ".$empleado['apellido_p']." ".$empleado['apellido_m']; ?></a></td> 
            <td><a class="ancla" name="<?php echo $empleado['empleado_id']?>">&nbsp;&nbsp;&nbsp;<?php echo $empleado['puesto_name'] ?></a></td>

             <!--datos a mostrar-->
         </tr>
         <?php endforeach; ?>

     
     <?php }?>

        <tr><td colspan="2" class="centrados"><?php echo $params['contabilidad'][0]['departamento_name'];?></td></tr>
         <?php foreach ($params['contabilidad'] as $empleado) :?>
         <tr>
            <td>&nbsp;&nbsp;&nbsp;<a href="index.php?ctl=ver&id=<?php echo $empleado['empleado_id']?>&zona=<?php echo $empleado['empleado_id']?>">
                     <?php echo $empleado['nombre']." ".$empleado['apellido_p']." ".$empleado['apellido_m']; ?></a></td> 
            <td><a class="ancla" name="<?php echo $empleado['empleado_id']?>">&nbsp;&nbsp;&nbsp;<?php echo $empleado['puesto_name'] ?></a></td>

             <!--datos a mostrar-->
         </tr>
         <?php endforeach; ?>
        
         
         <tr><td colspan="2" class="centrados" ><?php echo $params['control'][0]['departamento_name'];?></td></tr>
         <?php foreach ($params['control'] as $empleado) :?>
         <tr>
            <td>&nbsp;&nbsp;&nbsp;<a href="index.php?ctl=ver&id=<?php echo $empleado['empleado_id']?>&zona=<?php echo $empleado['empleado_id']?>">
                     <?php echo $empleado['nombre']." ".$empleado['apellido_p']." ".$empleado['apellido_m']; ?></a></td> 
            <td><a class="ancla" name="<?php echo $empleado['empleado_id']?>">&nbsp;&nbsp;&nbsp;<?php echo $empleado['puesto_name'] ?></a></td>

             <!--datos a mostrar-->
         </tr>
         <?php endforeach; ?>

        <tr><td colspan="2" class="centrados"><?php echo $params['contraloria'][0]['departamento_name'];?></td></tr>
         <?php foreach ($params['contraloria'] as $empleado) :?>
         <tr>
            <td>&nbsp;&nbsp;&nbsp;<a href="index.php?ctl=ver&id=<?php echo $empleado['empleado_id']?>&zona=<?php echo $empleado['empleado_id']?>">
                     <?php echo $empleado['nombre']." ".$empleado['apellido_p']." ".$empleado['apellido_m']; ?></a></td> 
            <td><a class="ancla" name="<?php echo $empleado['empleado_id']?>">&nbsp;&nbsp;&nbsp;<?php echo $empleado['puesto_name'] ?></a></td>

             <!--datos a mostrar-->
         </tr>
         <?php endforeach; ?>

         
         <tr><td colspan="2" class="centrados"><?php echo $params['abastecimiento'][0]['departamento_name'];?></td></tr>
         <?php foreach ($params['abastecimiento'] as $empleado) :?>
         <tr>
            <td>&nbsp;&nbsp;&nbsp;<a href="index.php?ctl=ver&id=<?php echo $empleado['empleado_id']?>&zona=<?php echo $empleado['empleado_id']?>">
                     <?php echo $empleado['nombre']." ".$empleado['apellido_p']." ".$empleado['apellido_m']; ?></a></td> 
            <td><a class="ancla" name="<?php echo $empleado['empleado_id']?>">&nbsp;&nbsp;&nbsp;<?php echo $empleado['puesto_name'] ?></a></td>

             <!--datos a mostrar-->
         </tr>
         <?php endforeach; ?>

     
        <tr><td colspan="2" class="centrados"><?php echo $params['rh'][0]['departamento_name'];?></td></tr>
         <?php foreach ($params['rh'] as $empleado) :?>
         <tr>
            <td>&nbsp;&nbsp;&nbsp;<a href="index.php?ctl=ver&id=<?php echo $empleado['empleado_id']?>&zona=<?php echo $empleado['empleado_id']?>">
                     <?php echo $empleado['nombre']." ".$empleado['apellido_p']." ".$empleado['apellido_m']; ?></a></td> 
            <td><a class="ancla" name="<?php echo $empleado['empleado_id']?>">&nbsp;&nbsp;&nbsp;<?php echo $empleado['puesto_name'] ?></a></td>

             <!--datos a mostrar-->
         </tr>
         <?php endforeach; ?>

         <?php if(isset($params['juridico'][0]['departamento_name'])&& !empty($params['juridico'][0]['departamento_name'])){?>
     
        
         
         <tr><td colspan="2" class="centrados"><?php echo $params['juridico'][0]['departamento_name'];?></td></tr>
         <?php foreach ($params['juridico'] as $empleado) :?>
         <tr>
            <td>&nbsp;&nbsp;&nbsp;<a href="index.php?ctl=ver&id=<?php echo $empleado['empleado_id']?>&zona=<?php echo $empleado['empleado_id']?>">
                     <?php echo $empleado['nombre']." ".$empleado['apellido_p']." ".$empleado['apellido_m']; ?></a></td> 
            <td><a class="ancla" name="<?php echo $empleado['empleado_id']?>">&nbsp;&nbsp;&nbsp;<?php echo $empleado['puesto_name'] ?></a></td>

             <!--datos a mostrar-->
         </tr>
         <?php endforeach; ?>

     </table>
        <?php }?>

        <tr><td colspan="2" class="centrados"><?php echo $params['sistemas'][0]['departamento_name'];?></td></tr>
         <?php foreach ($params['sistemas'] as $empleado) :?>
         <tr>
            <td name="<?php echo $empleado['nombre']?>">&nbsp;&nbsp;&nbsp;<a href="index.php?ctl=ver&id=<?php echo $empleado['empleado_id']?>&zona=<?php echo $empleado['nombre']?>">
                     <?php echo $empleado['nombre']." ".$empleado['apellido_p']." ".$empleado['apellido_m']; ?></a></td> 
            <td><a class="ancla" name="<?php echo $empleado['empleado_id']?>">&nbsp;&nbsp;&nbsp;<?php echo $empleado['puesto_name'] ?></a></td>

             <!--datos a mostrar-->
         </tr>
         <?php endforeach; ?>

        
         <tr><td colspan="2" class="centrados"><?php echo $params['limpieza'][0]['departamento_name'];?></td></tr>
         <?php foreach ($params['limpieza'] as $empleado) :?>
         <tr>
            <td>&nbsp;&nbsp;&nbsp;<a href="index.php?ctl=ver&id=<?php echo $empleado['empleado_id']?>&zona=<?php echo $empleado['empleado_id']?>">
                     <?php echo $empleado['nombre']." ".$empleado['apellido_p']." ".$empleado['apellido_m']; ?></a></td> 
            <td><a class="ancla" name="<?php echo $empleado['empleado_id']?>">&nbsp;&nbsp;&nbsp;<?php echo $empleado['puesto_name'] ?></a></td>

             <!--datos a mostrar-->
         </tr>
         <?php endforeach; ?>

     </table>

 </div>
</br>
</br>
</br>

 <!--
 <h2 class="area"><strong>AREA ADMINISTRATIVA</strong></h2>
  <div style="float:center">
     <table border="1" width="900px">
         <tr>
             <th width="35%" class="centrados" style="background-color:rgba(158, 158, 158, 0.25);">&nbsp;&nbsp;&nbsp;Nombre</th>
             <th width="35%" class="centrados" style="background-color:rgba(158, 158, 158, 0.25);">&nbsp;&nbsp;&nbsp;Departamento</th>
             <th width="30%" class="centrados" style="background-color:rgba(158, 158, 158, 0.25);">&nbsp;&nbsp;&nbsp;Puesto</th>
             
         </tr>
         <?php foreach ($params['empleados_ad'] as $empleado) :?>
         <tr>
            <td>&nbsp;&nbsp;&nbsp;<a href="index.php?ctl=ver&id=<?php echo $empleado['empleado_id']?>&zona=<?php echo $empleado['empleado_id']?>">
                     <?php echo $empleado['nombre']." ".$empleado['apellido_p']." ".$empleado['apellido_m']; ?></a></td>
            <td class="centrados">&nbsp;&nbsp;&nbsp;<?php echo $empleado['departamento_name'] ?></td>
            <td><a class="ancla" name="<?php echo $empleado['empleado_id']?>">&nbsp;&nbsp;&nbsp;<?php echo $empleado['puesto_name'] ?></a></td>

             
         </tr>
         <?php endforeach; ?>

     </table>
 </div>
-->


 <?php $contenido = ob_get_clean() ?>

<?php include './app/templates/layout.php' ?>