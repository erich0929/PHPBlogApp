<?php

	class CommentsMapper {

		private $HG;
		private $driver;
		private $facebook;

		public function __construct () {
			$this -> HG =& getInstance ();
			$this -> driver = $this -> HG -> loader -> database ('MysqliDriver');
		}

		public function getCommentTable ($snsName) {
			$sql = "SELECT `commentTable` FROM `Sns` WHERE `name` = {$snsName}";
			$res = getResultByArray ($sql);
			return $res [0]['commentTable'];
		}

		public function getCommentIds ($boardName, $articleId) {
			$sql = "SELECT * FROM `Comments` WHERE `boardName` = {$boardName} AND `articleId` = {$articleId}";
			return $this -> getResultByArray ($sql);
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

		private function getResultByArray ($sql) {
			//
			$resultId = $this -> driver -> query ($sql);
			if (!is_resource ($resultId) && !is_object ($resultId)) {
				return false;
			}
			$records = array ();
			while ($record = $this -> driver -> fetchAssoc ($resultId)) {
				array_push ($records, $record);
			}
			return $records;
		}

	}

?>