<?php
	
	$uploadHandler = new Handler ();
	$uploadHandler -> rules (array ('/^upload$/'))
					-> handler (function () {
						
						if ($_FILES ['filename']['error']) echo 'error';
						//upload file
						$elementName = 'file';
						$uploadPath = FILEPATH . $_FILES [$elementName]['name'];
						if (!move_uploaded_file($_FILES [$elementName]['tmp_name'], $uploadPath)) {
							echo $_FILES [$elementName]['error'];
						} else {
							echo json_encode(['url' => 'http://blog.erich0929.com/application/public/files/' . $_FILES [$elementName]['name']]);
						}

					});
	$HG =& getInstance ();
	$HG -> post ($uploadHandler -> build ());


?>