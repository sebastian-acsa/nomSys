<?php

 class NominaController
 {



 	
	public function inicio()//index
	{  session_start();
		if(!isset($_session['user_id'])){
	    	header('Location:  index.php?ctl=login');	
	 	}


		$m = new NominaModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
		             Config::$mvc_bd_clave, Config::$mvc_bd_hostname); //coneccion al modelo

		$params = array( //parametros
		     'empleados_nom' => $m->dameEmpleados(),
		);

	 require __DIR__ . '/templates/mostrarEmpleados.php';
	}

	public function listar() //listar
    { 	session_start();
     	if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:  index.php?ctl=login');
	 	}

        $m = new NominasModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname); //coneccion al modelo

		$params = array( //parametros
			'autos' => $m->dameNominas(),
		);

        require __DIR__ . '/templates/mostrarNominas.php';
    }
     

    public function addNomina() //insert
	{ 	
		session_start();	
		if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:  index.php?ctl=login');
	 	}
     	$m = new NominasModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
     	//poner accesos a la otra DB
     	$m2 = new EmpleadosModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
     	$empleados= $m2->dameEmpleados();

     	

		$params = array( //parametros que envio
			'cta_cont' => '',
			'centro_cost' => '',
			'empleados' => $empleados,
		);

        


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

             // comprobar campos formulario
			$equipo_new=$_POST;
             if ($m->validarDatos($equipo_new)) {
				//usamos metodo del modelo
                 $m->insertarNomina($equipo_new);
					 //header('Location:  index.php?ctl=listarNominas'); //redirect				
            } else {
                $params = array( //parametros que envio
						
			'cta_cont' => $_POST['cta_cont'],
			'centro_cost' => $_POST['centro_cost'],
			'empleados' => $empleados,
				);
                $params['mensaje'] = 'No se ha podido registrar el Empleado. Revisa el formulario';
            }
             
         }

         require __DIR__ . '/templates/Nomina/AltaNomina.php';
    }


    public function buscarPorNombre()
    { 
     	session_start();
     	if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:  index.php?ctl=login');
	 	}
         $params = array(
             'nombre' => '',
             'resultado' => array(),
         );

         $m = new EmpleadosModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             $params['nombre'] = $_POST['nombre'];
             $params['resultado'] = $m->buscarEmpleadoPorNombre($_POST['nombre']);
         }

         //require __DIR__ . '/templates/Empleado/buscarPorNombre.php';
    }
	 
	public function buscarActivos()
    {
     	session_start();
     	if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:  index.php?ctl=login');
	 	}
		 $m = new EmpleadosModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
         $params = array(
             'nombre' => '',
             'resultado' => array(),
			 'empleados' => $m->dameEmpleadosActivos(),
         );

         

         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             $params['nombre'] = $_POST['nombre'];
             $params['resultado'] = $m->buscarEmpleadoActivo($_POST['nombre']);
         }

         //require __DIR__ . '/templates/Empleado/buscarActivos.php';
    }

    public function buscarInactivos()
    {
     	session_start();
     	if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:  index.php?ctl=login');
	 	}
		 $m = new EmpleadosModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
         $params = array(
             'nombre' => '',
             'resultado' => array(),
			 'empleados' => $m->dameEmpleadosInactivos(),
         );

         

         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
             $params['nombre'] = $_POST['nombre'];
             $params['resultado'] = $m->buscarEmpleadoInactivo($_POST['nombre']);
         }

         //require __DIR__ . '/templates/Empleado/buscarInactivos.php';
    }
    public function buscarTodos()
    {
     	session_start();
     	if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:  index.php?ctl=login');
	 	}
		$m = new EmpleadosModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
		         Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
		$params = array(
			'nombre' => '',
			'resultado' => array(),
			'empleados' => $m->dameEmpleados(),
		);

         

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$params['nombre'] = $_POST['nombre'];
			$params['resultado'] = $m->buscarEmpleadoActivo($_POST['nombre']);
		}

        //require __DIR__ . '/templates/Empleado/buscarTodos.php';
     }

	public function viewNomina()
	{
		session_start();
		if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		echo "no tiene session";
	 		#header('Location:  index.php?ctl=login');

	 	}
		if (!isset($_GET['id'])) {
		 throw new Exception('Página no encontrada');
		}

		$id = $_GET['id'];

		$m = new NominasModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
		         Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
		$m2 = new EmpleadosModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
		         Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

		$empleados = $m2->dameEmpleados();
		$automovil= $m->dameAutomovil($id);
		$params = array('empleados' => $empleados,'automovil' => $automovil);

		require __DIR__ . '/templates/Automovil/viewAutomovil.php';
	}

	public function editNomina()
	{
		session_start();
		if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:  index.php?ctl=login');
	 	}
		$m2 = new EmpleadosModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
	                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
		$m = new NominaesModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
		         Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$m->editarTelefono($_POST['id'],$_POST['compania'],$_POST['telefono'],$_POST['numcuenta'],$_POST['razon_social'],$_POST['empleado_id']);
			header('Location:  index.php?ctl=viewCel&id='.$_POST['id']);
		}
		else{
			$id = $_GET['id'];
			
			$empleados= $m2->dameEmpleados();

			$params = array( //parametros que envio
						'compania' => $_POST['compania'],
						'telefono' => $_POST['telefono'],
						'num_cuenta' => $_POST['numcuenta'],
						'razon_social' => $_POST['razon_social'],
						'empleado_id' => $_POST['empleado_id'],
						'empleados' => $empleados,
				);
		}
		require __DIR__ . '/templates/Nomina/editNomina.php';

	}

	public function monitores_empleados_guardar() //monitor basico
    { 	session_start();
     	if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:index.php?ctl=login');
	 	}
        $m = new EmpleadosModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                    Config::$mvc_bd_clave, Config::$mvc_bd_hostname); //coneccion al modelo
        $m2 = new NominasModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                    Config::$mvc_bd_clave, Config::$mvc_bd_hostname); //coneccion al modelo
        $empleados= $m->dameEmpleados_monitor_ad();
        $cuentas = $m->dameCuentas();
        $existe= $m2->comprobar_existencia();
        //echo "cuantos:".$existe;
        if($existe<1){
	        foreach ($cuentas as $cuenta){
	        	foreach ( $empleados as $empleado){
	        		if($cuenta['num_cuenta']== $empleado['cta_contable']){
	        			$neto=$empleado['su_sem']-$empleado['infonavit'];
	        			$empleado_a_pagar= array(
	        				'nombre'=>$empleado['nombre']." ".$empleado['apellido_p']." ".$empleado['apellido_m'],
							'cta_contable'=>$empleado['cta_contable'],
							'departamento_name'=>$empleado['departamento_name'],
							'puesto_name' =>$empleado['puesto_name'],
							'Empresa'=>$empleado['Empresa'],
							'centro_costos'=>$empleado['centro_costos'],
							'num_cta_ban'=>$empleado['num_cta_ban'],
							'su_sem'=>$empleado['su_sem'],
							'neto'=>$neto,
							'fiscal'=>$empleado['su_sem_fiscal'],
							'su_sem_efectivo'=>$empleado['su_sem_efectivo'],
	        				);
	        				
	        			$resultado= $m2->addRegistroHistorico($empleado_a_pagar);
	        		}
	        	}
	        }
    	}


        $params = array( //parametros
            'empleados_ad' => $m->dameEmpleados_monitor_ad_del_historial(),
            'cuentas'=> $m->dameCuentas(),
            'cantidad' => $m->dameEmpleados_monitor_ad_id(),


            'empresas'=> $m2->dameCostoPorEmpresa(),
        );
        require __DIR__ . '/templates/Monitores/empleados_simple_guardar.php';
    }

	

	public function monitores_empleados_simple() //monitor basico
    { 	session_start();
     	if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:index.php?ctl=login');
	 	}
        $m = new EmpleadosModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                    Config::$mvc_bd_clave, Config::$mvc_bd_hostname); //coneccion al modelo
        $m2 = new NominasModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                    Config::$mvc_bd_clave, Config::$mvc_bd_hostname); //coneccion al modelo

        $params = array( //parametros
            'empleados_ad' => $m->dameEmpleados_monitor_ad(),
            'cuentas'=> $m->dameCuentas(),
            'cantidad' => $m->dameEmpleados_monitor_ad_id(),

            'empresas'=> $m2->dameCostoPorEmpresa(),
        );
        require __DIR__ . '/templates/Monitores/empleados_simple.php';
    }

    public function guardar_monitores_empleados_simple() //monitor basico
    { 	session_start();
     	if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:index.php?ctl=login');
	 	}
	 	
        $m = new EmpleadosModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                    Config::$mvc_bd_clave, Config::$mvc_bd_hostname); //coneccion al modelo
        $m2 = new NominasModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                    Config::$mvc_bd_clave, Config::$mvc_bd_hostname); //coneccion al modelo

		/*
        $params = array( //parametros
            'empleados_ad' => $m->dameEmpleados_monitor_ad(),
            'cuentas'=> $m2->dameCuentas(),
            'cantidad' => $m->dameEmpleados_monitor_ad_id(),
            'empresas'=> $m2->dameCostoPorEmpresa(),
        );
        */
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$asd=$_POST;
        	//$m2->insertarTabla($asd);
        	$params = array('prueba'=>$asd,);
        }


        require __DIR__ . '/templates/Nomina/topdf.php';
    }

    public function reiniciar_nomina(){
    	session_start();
     	if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:index.php?ctl=login');
	 	}
    	$m = new NominasModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                    Config::$mvc_bd_clave, Config::$mvc_bd_hostname); //coneccion al modelo
    	$m -> reiniciar_nom();
    	header('Location:index.php?ctl=m_empleados_guardar');
    }

    public function guardar_historicos(){
    	session_start();
     	if(isset($_SESSION['user_id'])){
	 	}
	 	else{
	 		header('Location:index.php?ctl=login');
	 	}
	 	echo "llamo usted?";
	 	 $m = new NominasModel(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                    Config::$mvc_bd_clave, Config::$mvc_bd_hostname); //coneccion al modelo
	 	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	 		$registro=$_POST;
			$m->addRegistroHistorico($registro);
			echo "listo";
		}
    }

    public function asignar_porcentaje(){
    	$m=new ExternoModel;





	}


 }
 