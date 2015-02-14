<?php

	$HG =& getInstance ();
	
	
	$handler = new Handler ();

	$handler -> rule ('/^main$/')
			//-> id ('index')
			-> handler (function () {
				$HG = getInstance (); 

				$dbConfig = new DBConfig ();
				$dbConfig 	-> username ('erich0929')
							-> password ('2642805')
							-> database ('test')
							-> driver ('MysqliDriver');
				$config = $dbConfig -> build ();
				$HG -> loader -> database ('MysqliDriver', $config);
				//$HG -> loader -> showContext ();
				$obj = $HG -> loader -> database ('MysqliDriver');
				print_r ($HG -> loader -> database ('MysqliDriver'));
			})
			-> preHook (function () { echo 'prehook1'; return true;})
			-> preHook (function () { echo 'prehook2'; return true;})
			-> postHook (function () {echo 'posthook1'; return false;})
			-> postHook (function () {echo 'posthook2'; return true;});
	$HG -> get ($handler -> build ());
	//$HG -> showContext ();
	

?>