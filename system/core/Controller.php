<?php

require_once (BASEPATH . 'core/Loader.php');

class HGController {
	
	private static $INSTANCE;

	// handlerContext : {id, rules, preHook, postHook, handler } 
	private $handlerContext = array ();
	// handlerContext end;

	private $pathContext = array ();
	private $headers;

	public $loader;

	private function __construct () {
		self::$INSTANCE = &$this;
		$this -> pathContext = array_slice (split ('/', urldecode (trim ($_SERVER ['REQUEST_URI'], '/'))),1);
		$this -> headers = getallheaders ();
		$this -> loader = Loader::getInstance ();
	}

	public static function &getInstance () {
		if (!self::$INSTANCE) {
			self::$INSTANCE = new HGController (); 
		}
		return self::$INSTANCE;
	}

	public function showContext () {
		print_r ($this -> handlerContext);
	}

	// $HG -> setRequestHandler ({ id => '_id', rules => {'/pregex/', '/pregex/'}, handler });
	public function get (&$handlerInfo) {
		return $this -> registerHandler ('GET', $handlerInfo);
	}

	public function post (&$handlerInfo) {
		return registerHandler ('POST', $handlerInfo);
	}

	private function registerHandler ($method, &$handlerInfo) {
		if ($handlerInfo ['id'] && 
			is_array ($handlerInfo ['rules']) &&
			$handlerInfo ['handler']) 
		{
			$handlerInfo ['method'] = $method;
			$this -> handlerContext [$handlerInfo ['id']] =& $handlerInfo;
			return true;
		} else {
			return false;
		}
	}

	public function route () {
		$pathContext =& $this -> pathContext;
		$pathLength = count ($pathContext);
		$method = $_SERVER ['REQUEST_METHOD'];

		$accept = false;
		//$found = false;

		foreach ($this -> handlerContext as $handlerInfo) {
			$rules = $handlerInfo ['rules'];
			if ($pathLength == count ($rules) && $method == $handlerInfo ['method']) {
				$i = 0;
				foreach ($rules as $rule) {
					$accept = preg_match ($rule, $pathContext [$i]);
					$i++;
					if (!$accpet) break; 
				}
				if ($accept) {
					//$found = true;
					$next = true;
					
					if (!($next = $this -> callHook ($handlerInfo ['preHook']))) return;
				
					// call handler;
					$handler = $handlerInfo ['handler'];
					$handler ();

					// call postHook;
					$this -> callHook ($handlerInfo ['postHook']);
					return;
				}
			}
		}
		// try static resource;
		if (preg_match ('/\.(html|js|css|png|woff|tff)$/', $pathContext [$pathLength - 1])) {
				$filename = APPPATH . 'public/' . join ('/', $pathContext);
				if (file_exists($filename)) {
					$this -> setContentType ($this -> getAccept ()); 
					require ($filename);
					return;	
				}
								
		} 
			
		echo "404 Page Not Found.";
	
	}

	private function callHook (&$hook) {
		$i = 0;
		$next = true;
		// call preHook;
		$hookLength = count ($hook);
		while ($next && $i < $hookLength) {
			$next = $hook [$i] ();
			$i++;
		}
		return $next;
	}

	public function view ($filename) {
		include (APPPATH . 'views/' . $filename . 'php');
	}

	public function getAccept () {
		$accept = split (',', $this -> headers ['Accept']);
		return $accept [0];
	}

	public function setContentType ($contentType) {
		header ("Content-Type: $contentType");
	}
}

?>