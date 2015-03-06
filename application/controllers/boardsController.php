<?php

	$boardsHandler = new Handler ();
	$boardsHandler 	-> rules (array ('/^boards$/'))
					-> handler (function () {
						$HG = getInstance ();

						$boardMapper = $HG -> loader -> mapper ('BoardMapper');
						$boards = $boardMapper -> getBoards ();
						$HG -> setContentType ('application/json');
						$boardSet = array_values ($boards);
						echo json_encode ($boardSet);
			});

	$someBoardHandler = new Handler ();
	$someBoardHandler -> rules (array ('/^boards$/', '/^.+$/'))
					-> handler (function () {

						$HG = getInstance ();
						$pathContext = $HG -> getPathContext ();
						$boardName = $pathContext [1];
						$boardMapper = $HG -> loader -> mapper ('BoardMapper');
						if ($boardName == 'All') {
							$articles = $boardMapper -> getAllArticles ();
						} else {
							$articles = $boardMapper -> getArticlesByBoard ($boardName);
						}
						
						$HG -> setContentType ('application/json');
						echo json_encode (array_values ($articles));

					});				
	$HG =& getInstance ();
	$HG -> get ($boardsHandler -> build ());
	$HG -> get ($someBoardHandler -> build ());

?>