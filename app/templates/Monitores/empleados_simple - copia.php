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
    <?php 
        $total_fiscal=0;
        $total_efectivo=0;
        foreach ($params['cuentas'] as $cuenta) {
            $total_fiscal+=$cuenta['fiscal'];
            $total_efectivo+=$cuenta['efectivo'];
        }
    ?>
 <p>&nbsp;</p>
 <!-- <form action="index.php?ctl=guardar_monitor" method="post">-->
 
  <div style="float:center">
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
            <th width="300px" class="centrados encabezados_gris">&nbsp;&nbsp;&nbsp;Departamento</th>
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
    <br/>
    

         <?php foreach ($params['cuentas'] as $cuenta) :?>
        <table border="1" width="1883px" style="margin-left: 40px; margin-right: 40px;">
            <tr>
                <td class="cuentas_encabesado" colspan="2">CUENTA CONTABLE: <?php echo $cuenta['num_cuenta']?>  <?php echo $cuenta['num_cuenta_nom']?></td>
                <td class="cuentas_encabesado" >C. COSTOS: <?php echo  $cuenta['centro_costos']?></td>            
                <td class="cuentas_encabesado" colspan="3">CONCEPTO: <?php echo $cuenta['concepto']?></td>            
                <td class="cuentas_encabesado" ></td>
                <td class="cuentas_encabesado" ></td>
                <td class="cuentas_encabesado" ><input class="derecha cuentas_encabesado cantidades" type="text" id="fiscal_cta_<?php echo $cuenta['num_cuenta_alt'] ?>" value="<?php echo $cuenta['fiscal'] ?>"></td>
                <td class="cuentas_encabesado" ><input class="derecha cuentas_encabesado cantidades" type="text" id="efectivo_cta_<?php echo $cuenta['num_cuenta_alt'] ?>" value="<?php echo $cuenta['efectivo'] ?>"></td>
            </tr>

             <?php foreach ($params['empleados_ad'] as $empleado) :
            if($cuenta['num_cuenta']== $empleado['cta_contable']){?>
                <form action="index.php?ctl=guardar_historicos" name="form0" method="post" > 
                    <tr>
                        <input type="hidden" id="nombre_<?php echo $cuenta['num_cuenta_alt'] ?>_<?php echo $empleado['empleado_id']?>" name="nombre" value="<?php echo $empleado['nombre']." ".$empleado['apellido_p']." ".$empleado['apellido_m'] ?>">
                        <input type="hidden" id="puesto_<?php echo $cuenta['num_cuenta_alt'] ?>_<?php echo $empleado['empleado_id']?>" name="puesto" value="<?php echo $empleado['puesto_name'] ?>">
                        <input type="hidden" id="empresa_<?php echo $cuenta['num_cuenta_alt'] ?>_<?php echo $empleado['empleado_id']?>" name="empresa" value="<?php echo $empleado['Empresa'] ?>">
                        <input type="hidden" id="centro_costos_<?php echo $cuenta['num_cuenta_alt'] ?>_<?php echo $empleado['empleado_id']?>" name="centro_costos" value="<?php echo $empleado['centro_costos']; ?>">
                        <input type="hidden" id="num_cta_ban_<?php echo $cuenta['num_cuenta_alt'] ?>_<?php echo $empleado['empleado_id']?>" name="num_cta_ban" value="<?php echo $empleado['num_cta_ban'] ?>">
                        <input type="hidden" id="su_sem_<?php echo $cuenta['num_cuenta_alt'] ?>_<?php echo $empleado['empleado_id']?>" name="su_sem" value="<?php echo number_format($empleado['su_sem'],2,".",",")  ?>">
                        <td width="320px">&nbsp;&nbsp;&nbsp;<a href="index.php?ctl=ver&id=<?php echo $empleado['empleado_id']?>">
                                 <?php echo $empleado['nombre']." ".$empleado['apellido_p']." ".$empleado['apellido_m'] ?></a></td>
                        <td width="300px" class="centrados">&nbsp;&nbsp;&nbsp;<?php echo $empleado['departamento_name'] ?></td>
                        <td width="435px">&nbsp;&nbsp;&nbsp;<?php echo $empleado['puesto_name'] ?></td>
                        <td width="95px">&nbsp;&nbsp;&nbsp;<?php echo $empleado['Empresa'] ?></td>
                        <td width="175px" class="arreglo">&nbsp;&nbsp;&nbsp;<?php echo ucwords(strtolower($empleado['centro_costos'])); ?></td>
                        <td width="174px">&nbsp;&nbsp;&nbsp;<?php echo $empleado['num_cta_ban'] ?></td>
                        <td width="96px" class="derecha">&nbsp;&nbsp;&nbsp;<?php echo number_format($empleado['su_sem'],2,".",",")  ?></td>
                        <?php $neto=$empleado['su_sem']-$empleado['infonavit']; ?>
                        <td width="96px" class="derecha"><input  type="text" min="0" step="0.01" class="derecha cantidades" id="sueldo_neto_<?php echo $cuenta['num_cuenta_alt'] ?>_<?php echo $empleado['empleado_id']?>" name="sueldo_neto" value="<?php echo $neto ?>" readonly/></td>
                        <td width="96px96px" class="derecha"><input  type="number" min="0" step="0.01" class="derecha cantidades" id="fiscal_<?php echo $cuenta['num_cuenta_alt'] ?>_<?php echo $empleado['empleado_id']?>" name="fiscal" value="<?php echo $empleado['su_sem_fiscal'] ?>" ></td>
                        <td width="96px96px" class="derecha"><input  type="text" min="0" step="0.01" class="derecha cantidades" id="sueldo_efectivo_<?php echo $cuenta['num_cuenta_alt'] ?>_<?php echo $empleado['empleado_id']?>"  name="sueldo_efectivo" value="<?php echo $empleado['su_sem_efectivo'] ?>" readonly ></td>
                         <!--datos a mostrar-->
                    </tr>
                </form>
             <?php 
            } 
             endforeach; ?>

        </table>
        <br/>
        
        <?php endforeach; ?>


        <?php 
        $vacio=false;
        foreach ($params['empleados_ad'] as $empleado){
            if( empty($empleado['cta_contable'])){$vacio=true;}

        } 
            if($vacio){
            ?>

                <table border="1" width="1883px" style="margin-left: 40px; margin-right: 40px;">
                    <tr>
                        <td class="cuentas_encabesado" colspan="2">CUENTA CONTABLE: Sin Cuenta</td>                
                        <td class="cuentas_encabesado" >C. COSTOS: Sin Centro de Costos</td>
                        <td class="cuentas_encabesado" colspan="3">CONCEPTO: Sin Concepto</td>                
                        <td class="cuentas_encabesado" ></td>
                        <td class="cuentas_encabesado" ></td>
                        <td class="cuentas_encabesado" ></td>
                     </tr>
                    <?php foreach ($params['empleados_ad'] as $empleado) :
                    if( empty($empleado['cta_contable'])){?>
                    <tr>

                        <td width="320px">&nbsp;&nbsp;&nbsp;<a href="index.php?ctl=ver&id=<?php echo $empleado['empleado_id']?>">
                                 <?php echo $empleado['nombre']." ".$empleado['apellido_p']." ".$empleado['apellido_m'] ?></a></td>
                        <td width="300px" class="centrados">&nbsp;&nbsp;&nbsp;<?php echo $empleado['departamento_name'] ?></td>
                        <td width="435px">&nbsp;&nbsp;&nbsp;<?php echo $empleado['puesto_name'] ?></td>
                        <td width="95px">&nbsp;&nbsp;&nbsp;<?php echo $empleado['Empresa'] ?></td>
                        <td width="175px" class="arreglo">&nbsp;&nbsp;&nbsp;<?php echo ucwords(strtolower($empleado['centro_costos'])); ?></td>
                        <td width="174px">&nbsp;&nbsp;&nbsp;<?php echo $empleado['num_cta_ban'] ?></td>
                        <td width="96px" class="derecha">&nbsp;&nbsp;&nbsp;<?php echo number_format($empleado['su_sem'],2,".",",")  ?></td>
                        <td width="96px" class="derecha">&nbsp;&nbsp;&nbsp;<?php $neto=$empleado['su_sem']-$empleado['infonavit'];  echo number_format($neto,2,".",",")  ?></td>
                        <td width="96px" class="derecha">&nbsp;&nbsp;&nbsp;<?php echo number_format($empleado['su_sem_fiscal'],2,".",",")  ?></td>
                        <td width="96px" class="derecha">&nbsp;&nbsp;&nbsp;<?php echo number_format($empleado['su_sem_efectivo'],2,".",",")  ?></td>
                         <!--datos a mostrar-->
                    </tr>
                     <?php 
                        } 
                    endforeach; ?>
                </table>
                <br/>
                <br/>
            <?php }?>
        </div>

            <table width="1883px" style="margin-left: 40px; margin-right: 40px;">
                <tr>
                    <td width="1695px">
                    </td>
       
                    <td>
                        <table border="1">
                            <tr>
                                <th class="encabezados_gris centrados" colspan="2">Fiscal</th>
                                
                            </tr>
                            <tr>
                                <th class="encabezados_gris_less centrados">Empresa</th>
                                <th class="encabezados_gris_less centrados">Fiscal</th>
                                
                            </tr>
                            
                            <?php foreach ($params['empresas'] as $empresa) : ?>
                                <tr>
                                    <td width="96px" class="derecha" ><?php echo $empresa['empresa']; ?></td>
                                    <td width="96px" class="derecha" ><?php echo number_format($empresa['fiscal'],2,".",","); ?></td>
                                    
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    </td>
                </tr>
                
            </table>
    </div>
   <!-- </form>-->
    <br/>
    <br/>
 <script src="./js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script type="text/javascript">
    
    function submitForms(){
        $('form').each(function() {
        var that = $(this);
        $.post(that.attr('action'), that.serialize());});
    }
    

    <?php foreach ($params['cuentas'] as $cuenta) :?>
        <?php foreach ($params['empleados_ad'] as $empleado) : ?>
            $("#fiscal_<?php echo $cuenta['num_cuenta_alt'] ?>_<?php echo $empleado['empleado_id']?>").focusout(function(){
                var calculo2 = $("#sueldo_neto_<?php echo $cuenta['num_cuenta_alt'] ?>_<?php echo $empleado['empleado_id']?>").val()-$("#fiscal_<?php echo $cuenta['num_cuenta_alt'] ?>_<?php echo $empleado['empleado_id']?>").val();
                calculo2=Math.round(calculo2 * 100) / 100;
                var aux= $("#sueldo_efectivo_<?php echo $cuenta['num_cuenta_alt'] ?>_<?php echo $empleado['empleado_id']?>").val();
                $("#sueldo_efectivo_<?php echo $cuenta['num_cuenta_alt'] ?>_<?php echo $empleado['empleado_id']?>").val(calculo2);

                    var pre_total_fiscal=0;
                    var pre_total_efectivo=0;
                    var verificador=[];
                    var verificador_val=[];
                    var cuenta_1_e=0;
                    var cuenta_1_f=0;
                    $.getJSON("./app/assets/get_emplados_id_with_cc.php",function(data){
                          $.each(data,function(index,item) 
                          {
                            if(item.id != 101){    
                                verificador.push(item.id);
                                var aux_var_text="#fiscal_"+item.cuenta+"_"+item.id;
                                verificador.push($(aux_var_text).val());
                                pre_total_fiscal=parseFloat(pre_total_fiscal)+ parseFloat($("#fiscal_"+item.cuenta+"_"+item.id).val());
                                pre_total_efectivo=parseFloat(pre_total_efectivo) + parseFloat($("#sueldo_efectivo_"+item.cuenta+"_"+item.id).val());
                                if(item.cuenta==<?php echo $cuenta['num_cuenta_alt'];?>){
                                    if(item.id != 114){ 
                                        //verificador_cuenta.push("#fiscal_"+item.cuenta+"_"+item.id);
                                        //verificador_cuenta.push(cuenta_1_f);
                                        cuenta_1_f=parseFloat(cuenta_1_f) + parseFloat($("#fiscal_"+item.cuenta+"_"+item.id).val());
                                        cuenta_1_e=parseFloat(cuenta_1_e) + parseFloat($("#sueldo_efectivo_"+item.cuenta+"_"+item.id).val());
                                        //verificador_cuenta.push($("#fiscal_"+item.cuenta+"_"+item.id).val());
                                        cuenta_1_e=Math.round(cuenta_1_e *100)/100;
                                        cuenta_1_f=Math.round(cuenta_1_f *100)/100;
                                        $('#fiscal_cta_'+item.cuenta).val(cuenta_1_f);
                                        $('#efectivo_cta_'+item.cuenta).val(cuenta_1_e);
                                    }
                                }
                                     
                            }                             
                          });
                        pre_total_fiscal=Math.round(pre_total_fiscal * 100) / 100;
                        pre_total_efectivo=Math.round(pre_total_efectivo * 100) / 100;

                        $("#total_fiscal").val(parseFloat(pre_total_fiscal));
                        $("#total_efectivo").val(parseFloat(pre_total_efectivo));
                    });
                



            });
        <?php endforeach; ?>
    <?php endforeach; ?>



</script>


 <?php $contenido = ob_get_clean() ?>

<?php include './app/templates/layout.php' ?>