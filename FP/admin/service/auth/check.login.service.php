<?php
session_start();
include("../../../main.service/config/connect.db.service.php");
$strSQL = "SELECT * FROM teacher WHERE username_tea = '".mysqli_real_escape_string($objCon,$_POST['txtAddusername'])."' 
and password_tea = '".mysqli_real_escape_string($objCon,$_POST['txtAddpassword'])."'";
$objQuery = mysqli_query($objCon,$strSQL);
$objResult  = mysqli_fetch_array($objQuery);

if(!$objResult)
	{
		echo "<body onload=\"window.alert('Username and Password Incorrect!');return history.go(-1)\">";
		
    }
else{
    	

$_SESSION["username_tea"] = $objResult["username_tea"];


 


    header("location:/FP/admin/page.php");
    }
    mysqli_close($objCon);


?>