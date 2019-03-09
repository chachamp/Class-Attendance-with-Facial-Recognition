<?php

$strSQL1 = "SELECT DISTINCT sub_name FROM detailsubject WHERE username_tea = '".$_SESSION["username_tea"]."' ORDER BY sub_name ASC"; 
$objQuery1 = mysqli_query($objCon, $strSQL1); 
$strSQL2 = "SELECT DISTINCT section FROM detailsubject  WHERE username_tea = '".$_SESSION["username_tea"]."' ORDER BY section ASC";
$objQuery2 = mysqli_query($objCon, $strSQL2); 

?>