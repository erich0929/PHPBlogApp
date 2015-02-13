<?php

	require_once (BASEPATH . 'core/Controller.php');
	require_once (BASEPATH . 'core/Builder.php');

	function &getInstance () {
		return HGController::getInstance ();
	}

	
	function index () {
		
	}

	$HG =& getInstance ();
	
	$arr = array ('id' => 'index', 'rules' => array ('/^main$/'), 
		'handler' => function () {echo 'Welcome to my php blog!!';},
		'preHook' => array (function () { echo 'prehook'; return true;},
							function () { echo 'it will be stopped.'; return true;}),
		'postHook' => array (function () { echo 'posthook'; return false;}));
	$handler = new Handler ();
	$handler -> rule ('/^main$/')
			//-> id ('index')
			-> handler (function () {echo 'Welcome to my php blog!!';})
			-> preHook (function () { echo 'prehook1'; return true;})
			-> preHook (function () { echo 'prehook2'; return true;})
			-> postHook (function () {echo 'posthook1'; return false;})
			-> postHook (function () {echo 'posthook2'; return true;});
	$HG -> get ($handler -> build ());
	//$HG -> showContext ();
	$HG -> route ();

?>