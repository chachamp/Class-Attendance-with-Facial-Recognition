<?php

include("../../../main.service/config/connect.db.service.php");
date_default_timezone_set("Asia/Bangkok");
session_start();

$current_date = date("Y-m-d"); 
$current_time = date("H:i") . "\n";


$postsubject = $_POST["txtsubjectpost"];
$posttext = $_POST["textarea"];
$postsection = $_POST["txtsection"];
$username = $_POST["username_tea"];

		if($_POST["textarea"] == "")
	{
		echo "<body onload=\"window.alert('Please input comment!');return history.go(-1)\">";
		
		exit();
    }
    
    
	if(isset($posttext) && isset($postsubject) && isset($postsection) && isset($current_date) && isset($current_time) && isset($username)){
		
		$updateSQL = "UPDATE `listofname` SET `msg_status` = '1' ";
		$updateQuery = mysqli_query($objCon,$updateSQL);

		$strSQL = "INSERT INTO announcement (sub_name,section,comment_box,date,time,username_tea) VALUES 
        ('".$_POST["txtsubjectpost"]."',
        '".$_POST["txtsection"]."',
        '".$_POST["textarea"]."',
		'".$current_date."',
		'".$current_time."',
        '".$_POST["username_tea"]."') ";
		$objQuery = mysqli_query($objCon,$strSQL);
		echo "<body onload=\"window.alert('Post Completed!');return history.go(-1)\">";
		
		
  
	}

    mysqli_close($objCon);
    

?>	
