<?php

	class CommentsMapper {

		private $HG;
		private $driver;
		private $facebook;

		public function __construct () {
			$this -> HG =& getInstance ();
			$this -> driver = $this -> HG -> loader -> database ('MysqliDriver');
		}

		public function saveInDb ($boardName, $articleId, $comment, ) {
			$sql = "INSERT INTO Comments ()";
			$this -> driver -> query ($sql);
		}

		public function saveInFb () {
			$this -> facebook = $this -> HG -> loader -> mapper ('FacebookMapper');
			$sql = "";
			$this -> driver -> query ($sql);
		}


	}

?>