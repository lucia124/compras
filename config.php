<?php //GLOBAL $db;
   define('DB_SERVER', '10.129.7.156');
   define('DB_USERNAME', 'root');
   //define('DB_PASSWORD', '');
   define('DB_PASSWORD', 'rootroot');
   define('DB_DATABASE', 'classicmodels');
     $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   
   if (!$db) {
		die("Error conexión: " . mysqli_connect_error());
				}
  
?>
