


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
 <html>
     <head>
      <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="bootstrap-3.1.1-dist/js/bootstrap.min.js"></script>        
          
        <script src="jquery/jquery.floatThead.min.js"></script>        
        <link rel="stylesheet" href="bootstrap-3.1.1-dist/css/bootstrap.min.css"  media="screen"/>
        
        <link rel="stylesheet" href="datepicker/css/datepicker.css"  >
        <link rel="stylesheet" href="chosen/chosen.css"  />
        
        <title>Sistema de RH</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- <link rel="stylesheet" type="text/css" href="<?#php echo 'css/'.Config::$mvc_vis_css ?>" />-->
     </head>
     <body id="body_cont">
     	<style>
            .body_cont {
              /* Location of the image */
              /*background-image: url(./img/full_acsa_background_acsa.png);
              /*background-color: #000;*/ /*Default bg, similar to the background's base color*/            
              background-position: right bottom; /*Positioning*/
              background-repeat: no-repeat; /*Prevent showing multiple background images*/
            
            }
            .body_cont img {
              /* the actual 'watermark' */
              position: absolute;
              top: 0; /* or whatever */
              left: 0; /* or whatever, position according to taste */
              opacity: 0.3; /* Firefox, Chrome, Safari, Opera, IE >= 9 (preview) */
              filter:alpha(opacity=30); /* for <= IE 8 */
            }
        </style>
         <div id="cabecera">
             <!--<h1>Sistema de RH</h1>-->
         </div>
		      <nav class="navbar navbar-inverse">
              <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="icon-bar" href="#"><img src="" width="50" height="50"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <!--
                  <ul class="nav navbar-nav">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Modulo de Altas <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="index.php?ctl=alta">Alta de Empleado</a></li>
                        <li><a href="index.php?ctl=fam_select">Alta de Familiares</a></li>
                        <li><a href="index.php?ctl=addAuto">Alta de Automovil</a></li>
                        
                      </ul>
                    </li>
                  </ul>
                  <ul class="nav navbar-nav">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Buscador de Empleados <span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <li><a href="index.php?ctl=activos">Activos</a></li>
                        <li><a href="index.php?ctl=inactivos">Inactivos</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="index.php?ctl=todos">Todos</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="index.php?ctl=buscarFamiliar">Familiares</a></li>
                      </ul>
                    </li>
                  </ul>
                  -->
                  <ul class="nav navbar-nav">
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Monitores<span class="caret"></span></a>
                      <ul class="dropdown-menu">
                        <!-- <li><a href="index.php?ctl=monitorEmp_s">Empleado/Puesto</a></li>-->
                        <li><a href="index.php?ctl=monitorEmp_a">Departamento-Puesto</a></li>

                        <li><a href="index.php?ctl=listarAuto">Automoviles</a></li>
                      </ul>
                    </li>
                  </ul>

                 
                  
                </div><!-- /.navbar-collapse -->
              </div><!-- /.container-fluid -->
            </nav>


          
         <!--<div id="menu">
             <hr/>
             <ul id="MenuBar1" class="MenuBarHorizontal">
               <li><a href="index.php?ctl=inicio">inicio</a>
                 
               </li>
               <li><a href="index.php?ctl=insertar1">agregar empleado</a></li>
               <li><a href="index.php?ctl=listar">ver empleados</a>
                 <ul>
                   <li><a class="MenuBarItemSubmenu" href="index.php?ctl=activos">Activo</a>
                   </li>
                   <li><a href="#">Inactivo</a></li>
                   <li><a href="#">Todos</a></li>
                 </ul>
               </li>
             </ul>
 
             <!--
             <a href="index.php?ctl=buscar">buscar por nombre</a> |
             <a href="index.php?ctl=buscarAlimentosPorEnergia">buscar por numero</a> |
             <a href="index.php?ctl=buscarAlimentosCombinada">búsqueda combinada</a>-->
         <!--    <hr/>
         </div>-->
		<br/>
        <br/>
         <div id="contenido">
             <?php echo $contenido ?>
         </div>
	
  <!--
     <div id="pie">
             <hr/>
             <div align="center">- pie de página -</div>
         </div>-->
     
     </body>
 </html>