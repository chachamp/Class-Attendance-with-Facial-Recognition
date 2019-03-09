<?php
session_start();
include("../../../main.service/config/connect.db.service.php");

  $oldpass = trim($_POST["txtpasswordold"]);
  $newpass = trim($_POST["txtpasswordnew"]);
  $connewpass = trim($_POST["txtpasswordconnew"]);




	
	$strSQL2 = "SELECT password_stu FROM student WHERE username_stu  = '".trim($_SESSION['username_stu'])."' ";
	$objQuery2 = mysqli_query($objCon,$strSQL2);
	$objResult2 = mysqli_fetch_array($objQuery2);
	

    $objResult_present_password = $objResult2['password_stu'];
	

	
	if($oldpass != $objResult_present_password){
		echo "<body onload=\"window.alert('Wrong ! Your current password');return history.go(-1)\">";
		exit();
	}

	
	else if($newpass == $oldpass)
	{
		echo "<body onload=\"window.alert('Password exist');return history.go(-1)\">";
		exit();
	}

	  
    else if($connewpass != $newpass)
	{
		echo "<body onload=\"window.alert('Wrong!,Confirm password');return history.go(-1)\">";
		exit();
	}

	else{

		$strSQL = "UPDATE student SET password_stu='".$newpass."'
		WHERE username_stu = '".trim($_SESSION['username_stu'])."' ";
		$objQuery = mysqli_query($objCon,$strSQL);

	
	
		//echo "Register Completed!<br>"; // finished to add in database
		echo "<body onload=\"window.alert('Edit Completed!');return history.go(-1)\">";
	}

	mysqli_close($objCon);
?>	