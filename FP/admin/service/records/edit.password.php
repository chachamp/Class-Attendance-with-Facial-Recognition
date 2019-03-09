<?php
session_start();
include("../../../main.service/config/connect.db.service.php");


  
    if(trim($_POST["connewpass"]) != trim($_POST["newpass"]))
	{
		echo "<body onload=\"window.alert('Password and Confirm password not match!');return history.go(-1)\">";
		exit();
	}
	

	

	
	$strSQL2 = "SELECT password_tea FROM teacher WHERE username_tea  = '".trim($_SESSION['username_tea'])."' ";
	$objQuery2 = mysqli_query($objCon,$strSQL2);
	$objResult = mysqli_fetch_array($objQuery2);
	
	 if($objResult["password_tea"] == trim($_POST["newpass"]))
	{	
		echo "<body onload=\"window.alert('This your current password');return history.go(-1)\">";
		//แสดงว่า UserName ซ้ำในระบบ
		exit();
	}	

	else if($objResult["password_tea"] != trim($_POST["oldpass"])){
		echo "<body onload=\"window.alert('Wrong !,your current password');return history.go(-1)\">";
		//แสดงว่า UserName ซ้ำในระบบ
		exit();
	}

	else
	{
		
		$strSQL = "UPDATE teacher SET 
		password_tea='".trim($_POST['newpass'])."'
		WHERE username_tea = '".trim($_SESSION['username_tea'])."' ";
		$objQuery = mysqli_query($objCon,$strSQL);

	
	}
		//echo "Register Completed!<br>"; // finished to add in database
		echo "<body onload=\"window.alert('Edit Completed!');return history.go(-1)\">";

	mysqli_close($objCon);
?>	