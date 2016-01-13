
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
        }
        .negro{background:black; color: white;font-weight: bold;}
        .bold{font-weight: bold;}
        .encabezados_gris{background-color:rgba(158, 158, 158, 0.85); color: white;}
        .encabezados_gris_less{background-color:rgba(158, 158, 158, 0.65); color: black;}
        .derecha{ text-align: right;}
        .arreglo{text-transform:capitalize;}
        .cuentas_encabesado{background-color:rgba(158, 158, 158, 0.55); text-align: center; font-weight: bold;}
        .cantidades{width: 96px;}
    </style>
<table border="1" width="1883px" style="margin-left: 40px; margin-right: 40px;">
        <tr>
            <td rowspan="3" colspan="8" border="0" ><h2 class="area"><strong>NOMINA: AREA ADMINISTRATIVA</strong></h2></td>
            <th class="encabezados_gris bold centrados" colspan="2">Finaciero</th>
        </tr>
        <tr>
            
            <td class="centrados bold">Fiscal</td>
            <td class="centrados bold">Efectivo</td>
        </tr>
        <tr>
            <td class="centrados negro" ><input class="centrados negro cantidades" type="text" id="total_fiscal" value="<?php echo $total_fiscal; ?>"></td>
            <td class="centrados negro" ><input class="centrados negro cantidades" type="text" id="total_efectivo" value="<?php echo $total_efectivo; ?>"></td>
        </tr>
         <tr><!--encabezados-->
            <th width="320px"  class="centrados encabezados_gris">&nbsp;&nbsp;&nbsp;Nombre</th>
            
            <th width="435px" class="centrados encabezados_gris">&nbsp;&nbsp;&nbsp;Puesto</th>
            <th width="95px" class="centrados encabezados_gris">&nbsp;&nbsp;&nbsp;Empresa</th>
            <th width="175px" class="centrados encabezados_gris">&nbsp;&nbsp;&nbsp;C. Costos</th>
            <th width="174px" class="centrados encabezados_gris">&nbsp;&nbsp;&nbsp;No. Cuenta Bancaria</th>
            <th width="96px" class="centrados encabezados_gris">&nbsp;&nbsp;&nbsp;Sueldo Semanal Bruto</th>
            <th width="96px" class="centrados encabezados_gris">&nbsp;&nbsp;&nbsp;Sueldo Semanal Neto</th>
            <th class="centrados encabezados_gris cantidades">&nbsp;&nbsp;&nbsp;Sueldo Semanal Fiscal</th>
            <th class="centrados encabezados_gris cantidades">&nbsp;&nbsp;&nbsp;Sueldo Semanal Efectivo Neto</th>
         </tr>
    </table>



	<table border="1" width="1883px" style="margin-left: 40px; margin-right: 40px;">
	<?php 
	$contador=0;
	foreach ($params['prueba'] as $prueba) {
		if($prueba!="Guardar"){
			switch ($contador) {
				case 0:
					echo "<tr>";
					echo '<td width="320px">&nbsp;&nbsp;&nbsp;'.$prueba.'</td>';//nombre
					$contador+=1;
					break;
				case 1:
					echo '<td width="435px">&nbsp;&nbsp;&nbsp;'.$prueba.'</td>';//Puesto
					$contador+=1;
					break;

				case 2:
					
					echo '<td width="95px">&nbsp;&nbsp;&nbsp;'.$prueba.'</td>';//Empresa
					$contador+=1;
					break;

				case 3:
					echo '<td width="175px" class="arreglo">&nbsp;&nbsp;&nbsp;'.$prueba.'</td>';//C. Costos
					$contador+=1;
					break;

				case 4:
					echo '<td width="174px" class="arreglo">&nbsp;&nbsp;&nbsp;'.$prueba.'</td>';//No. Cuenta Bancaria
					$contador+=1;
					break;

				case 5:
					echo '<td width="96px" class="derecha">&nbsp;&nbsp;&nbsp;'.$prueba.'</td>';//Sueldo Semanal Bruto
					$contador+=1;
					break;

				case 6:
					echo '<td width="96px" class="derecha">&nbsp;&nbsp;&nbsp;'.$prueba.'</td>';//Sueldo Semanal Neto
					$contador+=1;
					break;

				case 7:
					echo '<td width="96px" class="derecha">&nbsp;&nbsp;&nbsp;'.$prueba.'</td>';//Sueldo Semanal Fiscal
					$contador+=1;
					break;

				case 8:
					echo '<td width="96px" class="derecha">&nbsp;&nbsp;&nbsp;'.$prueba.'</td>';//Sueldo Semanal Efectivo Neto
					echo "</tr>";
					$contador=0;
					break;
					
				default:

					$contador=0;
					break;
			}
			/*
			if($contador==0){echo "<tr>";}
			echo $prueba;
			
			$contador+=1;
			if($contador==10){
			echo "</tr>";
			$contador=0;
			}
			*/
		}
	}
	?>
	</table>
