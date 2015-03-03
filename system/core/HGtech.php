<?php

	require_once (BASEPATH . 'core/Controller.php');
	require_once (BASEPATH . 'core/Builder.php');

	function &getInstance () {
		return HGController::getInstance ();
	}

	require_once (APPPATH . 'index.php');

	$HG -> route ();

?>