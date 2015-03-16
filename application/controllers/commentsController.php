<?php


	$readCommentHandler = new Handler ();
	$readCommentHandler -> rules (array ('/^comments$/'))
	-> handler (function () {
		$HG =& getInstance ();
		$commentsMapper = $HG -> loader -> mapper ('CommentsMapper');
		$boardName = $_GET ['boardName'];
		$articleId = $_GET ['articleId'];			
		
		// TODO : validate $boardName, $articleId
		/*
		 *
		 */

		// get commentPointers
		$commentPointers = $commentsMapper -> getCommentIds ($boardName, $articleId);
		foreach ($commentPointers as $commentPointer) {
			$commentId = $commentPointer ['commentId'];
			$snsName = $commentPointer ['snsName'];
			// get comment table which is storage this pointer's comment info.
			$commentTable = $commentsMapper -> getCommentTable ($snsName);
			if ($snsName == 'facebook') {
				$facebook = $HG -> loader -> mapper ('facebookMapper'); // mapper function return 
				$postId = $facebook -> getPostId ($commentId);
				// $comments = $facebook -> getComments ($postId);
			}
		}		

				
	});
	$HG =& getInstance ();
	$HG -> get ($readCommentHandler -> build ());

?>