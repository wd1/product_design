<?php

	// this will avoid mysql_connect() deprecation error.
	
	// but I strongly suggest you to use PDO or MySQLi.
	
	define('DBHOST', 'localhost');
	define('DBUSER', 'root');
	define('DBPASS', '');
	define('DBNAME', 'nymbldb');
	
	// define('DBHOST', 'localhost');
	// define('DBUSER', 'bloomcol_product_generator');
	// define('DBPASS', 'OguBA@*2WlLx');
	// define('DBNAME', 'bloomcol_nymbldb');
	$conn = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);
	// $dbcon = mysqli_select_db(DBNAME);
	
	if ( !$conn ) {
		die("Connection failed : " . mysqli_error());
	}
	
	// if ( !$dbcon ) {
	// 	die("Database Connection failed : " . mysqli_error());
	// }