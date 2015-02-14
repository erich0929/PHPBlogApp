<?php

	$HG =& getInstance ();
	
	
	$handler = new Handler ();
	$handler -> rule ('/^main$/')
			//-> id ('index')
			-> handler (function () {
				$HG = getInstance (); 
				$HG -> loader -> view ('main');
			})
			-> preHook (function () { echo 'prehook1'; return true;})
			-> preHook (function () { echo 'prehook2'; return true;})
			-> postHook (function () {echo 'posthook1'; return false;})
			-> postHook (function () {echo 'posthook2'; return true;});
	$HG -> get ($handler -> build ());
	//$HG -> showContext ();
	

?>