<?php

	class BoardMapper {

		private $driver;

		public function __construct () {
			$HG =& getInstance ();
			$this -> driver = $HG -> loader -> database ('MysqliDriver');
		}

		public function getBoards () {
			$resultId = $this -> driver -> query ('SELECT * FROM `Board`');
			if (!is_resource ($resultId) && !is_object ($resultId)) {
				return false;
			}
			$boards = array ();
			while ($board = $this -> driver -> fetchAssoc ($resultId)) {
				array_push ($boards, $board);

			}
			return $boards;
		}

	}

?>