<?php ob_start() ?>

<style>
body{color:#9C3100;}

.bajos{color:#000;}
.altos{color:#9C3100;
font-size:14px;
font:bold;}
td{text-transform:capitalize;}
table{
	background-color:rgba(158, 158, 158, 0.25);}
</style>

    <form action="" method="post">
        <fieldset>
            <legend>Edicion de Nominas</legend>
            <table>
              <tr>
                <td class="altos">Empleado</td>
                <td class="altos">Cuenta Contable</td>
                <td class="altos">Centro de Costos</td>
              </tr>
              <tr>
                <td class="bajos" colspan="2">
                    <select id="empleado_id" name="empleado_id">
                          <option value="">Seleccione Uno</option>
                        <?php foreach ($params['empleados'] as $empleado) :?>
                          <option value="<?php echo $empleado['empleado_id']?>" <?php if($empleado['empleado_id']==$params['empleado_id']){ echo "selected";}?> ><?php echo $empleado['nombre']." ".$empleado['apellido_p']." ".$empleado['apellido_m']?></option>
                        <?php endforeach; ?>
                    </select>
                 </td>
                <td class="bajos"><input type="text" id="cta_cont" name="cta_cont" value="<?php echo $params['cta_cont']?>" /></td>
                <td class="bajos"><input type="text" id="centro_costos" name="centro_costos" value="<?php echo $params['centro_costos']?>"/></td>
                
              </tr>
              
              <tr>
                <td colspan="7" align="right"><input type="submit" value="insertar" name="insertar" /></td>
              </tr>
            </table>
        </fieldset>
    </form>


 <?php $contenido = ob_get_clean() ?>

 <?php include '/app/templates/layout.php' ?>