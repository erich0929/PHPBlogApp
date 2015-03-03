<?php

	$boardsHandler = new Handler ();
	$boardsHandler 	-> rules (array ('/^boards$/'))
					-> handler (function () {
				$HG = getInstance (); 
	
				

				//$HG -> loader -> showContext ();
				$accept = $HG -> getAccept ();
				if (true) {
					$boardMapper = $HG -> loader -> mapper ('BoardMapper');
					$boards = $boardMapper -> getBoards ();
					$HG -> setContentType ('application/json');
					$boardSet = array_values ($boards);
					echo json_encode ($boardSet);
				}

				//print_r ($HG -> loader -> database ('MysqliDriver'));
			});
	$HG =& getInstance ();
	$HG -> get ($boardsHandler -> build ());

?>