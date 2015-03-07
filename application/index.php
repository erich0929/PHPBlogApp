<?php
	/* this index.php file will be loaded by the framework.
	 * so you can use this file as a bootstrapper which load
	 * what your application need to use like controllers, database, mapper etc.
	 */



	$HG =& getInstance ();

	$dbConfig = new DBConfig ();
	$dbConfig 	-> username ('admin')
				-> password ('2642805')
				-> hostname ('192.168.10.101')
				-> database ('blog')
				-> driver ('MysqliDriver');
	$config = $dbConfig -> build ();

	$HG -> loader -> database ('MysqliDriver', $config);
	
	$HG -> loader //-> controller ('mainController')
				-> controller ('jsonController')
				-> controller ('boardsController')
				-> controller ('uploadController')
				-> controller ('insertController')
				-> controller ('articleController')
				-> controller ('deleteController');
?>

