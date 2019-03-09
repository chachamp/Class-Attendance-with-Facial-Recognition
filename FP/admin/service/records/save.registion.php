<?php

include("../../../main.service/config/connect.db.service.php");

		if(trim($_POST["txtAdusername"]) == "")
	{
		echo "<body onload=\"window.alert('Please input username!');return history.go(-1)\">";
		
		exit();
	}
	if(trim($_POST["txtAdpassword"]) == "")
	{
		echo "<body onload=\"window.alert('Please input password!');return history.go(-1)\">";
		exit();
	}
	
	

	
	$strSQL = "SELECT * FROM teacher WHERE username_tea  = '".trim($_POST['txtAdusername'])."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);


	if($objResult)
	{
		echo "<body onload=\"window.alert('Username already exists');return history.go(-1)\">";
	}	
	
	else
	{
		$strSQL = "INSERT INTO teacher (username_tea,password_tea) VALUES 
        ('".$_POST["txtAdusername"]."','".$_POST["txtAdpassword"]."')";
		$objQuery = mysqli_query($objCon,$strSQL);
		//echo "Register Completed!<br>"; // finished to add in database
        echo "<body onload=\"window.alert('Register Completed!');return history.go(-1)\">";
        
       
    }
    
    


    mysqli_close($objCon);
    

?>	
