<?php

	$articleHandler = new Handler ();
	$articleHandler -> rules (array ('/^insert$/'))
					-> handler (function () {
						
						echo 'a';
						$HG = getInstance ();
						$articleMapper = $HG -> loader -> mapper ('ArticleMapper');
						echo 'b';
						print_r ($_POST);
						if ($articleMapper -> insertArticle ($_POST)) {
							echo 'post';
							header ('Location: ' . 'http://blog.erich0929.com/application/public/index.html');
						}
						exit ('500');
					});

	$HG =& getInstance ();
	$HG -> post ($articleHandler -> build ());

?>