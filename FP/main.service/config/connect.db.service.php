<?php
define('servername','localhost');
define('username','root');
define('password','kokkak1');
define('dbname','db_main');

$objCon = mysqli_connect("mysql:3306","hahahaha","12345678","db_main");

// Check for Connecting 

// if($objCon){
// echo "Database Connected.";
// }
// else{
// echo "Database Connect Failed.";
// }
mysqli_set_charset($objCon, "utf8")

?>
