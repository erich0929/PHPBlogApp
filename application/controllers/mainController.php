<?php

	$HG =& getInstance ();
	
	
	$handler = new Handler ();

	$handler -> rule ('/^main$/')
			//-> id ('index')
			-> handler (function () {
				$HG = getInstance (); 
	
				$dbConfig = new DBConfig ();
				$dbConfig 	-> username ('admin')
							-> password ('2642805')
							-> hostname ('192.168.10.101')
							-> database ('blog')
							-> driver ('MysqliDriver');
				$config = $dbConfig -> build ();

				$HG -> loader -> database ('MysqliDriver', $config);

				//$HG -> loader -> showContext ();
				$accept = $HG -> getAccept ();
				if (true) {
					$boardMapper = $HG -> loader -> mapper ('BoardMapper');
					$boards = $boardMapper -> getBoards ();
					$HG -> setContentType ('application/json');
					echo json_encode ($boards);
				}

				//print_r ($HG -> loader -> database ('MysqliDriver'));
			});
		//	-> preHook (function () { echo 'prehook1'; return true;})
		//	-> preHook (function () { echo 'prehook2'; return true;})
		//	-> postHook (function () {echo 'posthook1'; return false;})
		//	-> postHook (function () {echo 'posthook2'; return true;});
	$HG -> get ($handler -> build ());
	//$HG -> showContext ();
	

?>