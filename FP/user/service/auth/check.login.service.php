<?php
session_start();

include("../../../main.service/config/connect.db.service.php");


echo $_POST['txtusername'];
echo $_POST['txtpassword'];
$strSQL = "SELECT * FROM student Where username_stu = '".mysqli_real_escape_string($objCon,trim($_POST['txtusername']))."' 
and password_stu = '".mysqli_real_escape_string($objCon,trim($_POST['txtpassword']))."' ";
$objQuery = mysqli_query($objCon,$strSQL);
$objResult = mysqli_fetch_array($objQuery);

echo $strSQL;


if(!$objResult)
	{
		echo "<body onload=\"window.alert('Username and Password Incorrect!');return history.go(-1)\">";
		exit();
    }
else{
    	

    $_SESSION["username_stu"] = $objResult["username_stu"];
   

    header("location:/FP/user/page2.php");
    }
    mysqli_close($objCon);


?>