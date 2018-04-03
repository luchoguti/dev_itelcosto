<?php 

$controller_default='Home';

if(!isset($_REQUEST['controller'])){

	require_once 'app/Controllers/'.$controller_default.'Controller.php';
	$controller = $controller_default.'Controller';
	$controller = new $controller;
	$controller->index();

}else{

	//obtenemos el controlador que queremos cargar.
	$controller = strtolower($_REQUEST['controller']);
	$accion= isset($_REQUEST['action'])?$_REQUEST['action']:'index';

	//instaciamos el controlador
	require_once 'app/Controllers/'.$controller.'Controller.php';
	$controller = $controller.'Controller';
	$controller = new $controller;

	//Llama la accion
	call_user_func(array($controller,$accion));	

}



?>