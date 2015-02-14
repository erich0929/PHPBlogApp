<?php
	/* this index.php file will be loaded by the framework.
	 * so you can use this file as a bootstrapper which load
	 * what your application need to use like controllers, database, mapper etc.
	 */

	$HG =& getInstance ();
	$HG -> loader -> controller ('mainController');

?>