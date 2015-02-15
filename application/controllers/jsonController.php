<?php

	$jsonHandler = new Handler ();
	$jsonHandler 	-> rules (array ('/^json$/'))
					-> handler (function () {
						$HG =& getInstance ();
						if ($HG -> getAccept () == 'application/json') {
							echo json_encode (array ('data' => 'Hello world!'));
						} else {
							echo "Hello world!";
						}
					});
	$HG =& getInstance ();
	$HG -> get ($jsonHandler -> build ());

?>