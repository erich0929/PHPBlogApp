<?php


	$commentHandler = new Handler ();
	$commentHandler -> rules (array ('/^comment$/'))
					-> handler (function () {
				$HG = getInstance (); 
					
					$isPostToFacebook = isset ($_GET ['post-to-fb']) ? true : false;
					
				
			});
	$HG =& getInstance ();
	$HG -> post ($commentHandler -> build ());

?>