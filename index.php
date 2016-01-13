<?php
 // web/index.php

 // carga del modelo y los controladores
    require_once __DIR__ . '/app/Config.php';
    require_once __DIR__ . '/app/Models/NominaModel.php';
    require_once __DIR__ . '/app/Models/EmpleadoModel.php';
    require_once __DIR__ . '/app/Models/WelcomeModel.php';
    //require_once __DIR__ . '/app/Models/ExternoModel.php';
    require_once __DIR__ . '/app/NominaController.php';
    require_once __DIR__ . '/app/WelcomeController.php';


 //valido login


 // enrutamiento
    $map = array(
        'login' => array('controller' =>'WelcomeController', 'action' =>'login'),
        'logout' => array('controller' =>'WelcomeController', 'action' =>'logout'),
        'inicio' => array('controller' =>'WelcomeController', 'action' =>'login'),
        'listar' => array('controller' =>'NominaController', 'action' =>'monitores_empleados_simple'),
        //Nomina
        'addNom' => array('controller' =>'NominaController', 'action' =>'addNom'),
        'editNom' => array('controller' =>'NominaController', 'action' =>'editNom'),
        'viewNom' => array('controller' =>'NominaController', 'action' =>'viewNom'),
        'listarNom' => array('controller' =>'NominaController', 'action' =>'listar'),
        //monitores
        'monitorEmp_s' => array('controller' =>'NominaController', 'action' =>'monitores_empleados_simple'),
        'guardar_monitor' => array('controller' =>'NominaController', 'action' =>'guardar_monitores_empleados_simple'),
        'guardar_historicos' => array('controller' =>'NominaController', 'action' =>'guardar_historicos'),
        'm_empleados_guardar' => array('controller' =>'NominaController', 'action' =>'monitores_empleados_guardar'),
        'rkkts' => array('controller' =>'NominaController', 'action' =>'reiniciar_nomina'),
        
    );

 // Parseo de la ruta
 if (isset($_GET['ctl'])) {
     if (isset($map[$_GET['ctl']])) {
         $ruta = $_GET['ctl'];
     } else {
         header('Status: 404 Not Found');
         echo '<html><body><h1>Error 404: No existe la ruta <i>' .
                 $_GET['ctl'] .
                 '</p></body></html>';
         exit;
     }
 } else {
     $ruta = 'inicio';
 }

 $controlador = $map[$ruta];
 // Ejecución del controlador asociado a la ruta

 if (method_exists($controlador['controller'],$controlador['action'])) {
     call_user_func(array(new $controlador['controller'], $controlador['action']));
 } else {

     header('Status: 404 Not Found');
     echo '<html><body><h1>Error 404: El controlador <i>' .
             $controlador['controller'] .
             '->' .
             $controlador['action'] .
             '</i> no existe</h1></body></html>';
 }