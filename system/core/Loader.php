<?php

	class Loader {

		private static $INSTANCE;

		private $context = array ();

		private function __construct () {

		}

		public static function &getInstance () {
			if (!self::$INSTANCE) {
				self::$INSTANCE = new Loader ();
			}
			return self::$INSTANCE;
		}

		public function controller ($controller) {
			require_once (APPPATH . "controllers/$controller.php");
		}

		public function view ($view) {
			require (APPPATH . "views/$view.php");
		}

		public function mapper ($mapper, $singleton = true) {
			if (!$this -> context [$mapper]) {
				require_once (APPPATH . "mappers/$mapper.php");
				$obj = new $mapper ();
				$this -> context [$mapper] = $obj;
			}
			if ($singleton) {
				return $this -> context [$mapper];
			} else {
				return new $mapper ();
			}
		}
	}

?>