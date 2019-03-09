<?php

$strSQL1 = "SELECT DISTINCT sub_name FROM detailsubject WHERE username_tea = '".$_SESSION["username_tea"]."' 
ORDER BY sub_name ASC"; 
$objQuery1 = mysqli_query($objCon, $strSQL1);




$strSQL3 = "SELECT DISTINCT sub_name FROM detailsubject  WHERE username_tea = '".$_SESSION["username_tea"]."' ORDER BY sub_name ASC"; 
$objQuery3 = mysqli_query($objCon, $strSQL3); 

$strSQL5 = "SELECT username_tea FROM teacher";
$objQuery5 = mysqli_query($objCon,$strSQL5);
$objResult5 = mysqli_fetch_array($objQuery5);

$strSQL6 = "SELECT DISTINCT sub_name FROM detailsubject  WHERE username_tea = '".$_SESSION["username_tea"]."' ORDER BY sub_name ASC";
$objQuery6 = mysqli_query($objCon, $strSQL6); 
 

$strSQL8 = "SELECT DISTINCT sub_name FROM detailsubject  WHERE username_tea = '".$_SESSION["username_tea"]."' ORDER BY sub_name ASC";
$objQuery8 = mysqli_query($objCon, $strSQL8); 


$strSQL10 = "SELECT DISTINCT sub_name FROM detailsubject  WHERE username_tea = '".$_SESSION["username_tea"]."' ORDER BY sub_name ASC";
$objQuery10 = mysqli_query($objCon, $strSQL10); 
$strSQL11 = "SELECT DISTINCT section FROM detailsubject  WHERE username_tea = '".$_SESSION["username_tea"]."' ORDER BY section ASC"; 
$objQuery11 = mysqli_query($objCon, $strSQL11); 

$strSQL12 = "SELECT DISTINCT sub_name FROM detailsubject  WHERE username_tea = '".$_SESSION["username_tea"]."' ORDER BY sub_name ASC";
$objQuery12 = mysqli_query($objCon, $strSQL12); 

$strSQL14 = "SELECT DISTINCT sub_name FROM detailsubject  WHERE username_tea = '".$_SESSION["username_tea"]."' ORDER BY sub_name ASC";
$objQuery14 = mysqli_query($objCon, $strSQL14); 

?>