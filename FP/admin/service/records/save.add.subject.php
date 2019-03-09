<?php

session_start();
include("../guid/create.guid.php");
include("../../../main.service/config/connect.db.service.php");

	if(trim($_POST["txtsubjectaddadmin"]) == "")
	{
		echo "<body onload=\"window.alert('Please input subject name!');return history.go(-1)\">";
		
		exit();
	}
	if(trim($_POST["txtsectionaddadmin"]) == "")
	{
		echo "<body onload=\"window.alert('Please input section!');return history.go(-1)\">";
		exit();
	}
    
    if(trim($_POST["txtclasscodeaddadmin"]) == "")
	{
		echo "<body onload=\"window.alert('Please input code class!');return history.go(-1)\">";
		exit();
	}
	

    $strSQL = "SELECT * FROM detailsubject WHERE sub_name  = '".trim($_POST['txtsubjectaddadmin'])."' 
    and section = '".trim($_POST['txtsectionaddadmin'])."' ";
	$objQuery = mysqli_query($objCon,$strSQL);
    $objResult = mysqli_fetch_array($objQuery);
	
	
    $strSQL1 = "SELECT * FROM detailsubject WHERE sub_code  = '".trim($_POST['txtclasscodeaddadmin'])."' 
    and section = '".trim($_POST['txtsectionaddadmin'])."' ";
	$objQuery1 = mysqli_query($objCon,$strSQL1);
    $objResult1 = mysqli_fetch_array($objQuery1);
    
    
	if($objResult)
	{
        echo "<body onload=\"window.alert('Subject and Section already exists');return history.go(-1)\">";
    
    }
    else if($objResult1){

        echo "<body onload=\"window.alert('Code Class and Section already exists');return history.go(-1)\">";

    }
   
	else
	{
	

		$strSQL2 = "INSERT INTO detailsubject (sub_name,sub_code,section,gid,username_tea)  VALUES 
        ('".$_POST["txtsubjectaddadmin"]."',
		'".$_POST["txtclasscodeaddadmin"]."',
		'".$_POST["txtsectionaddadmin"]."',
		'".$_SESSION["GUID"]."',
		'".$_SESSION["username_tea"]."')" ;
		$objQuery2 = mysqli_query($objCon,$strSQL2);
		//echo "Register Completed!<br>"; // finished to add in database
		echo "<body onload=\"window.alert('Public code = $GUID');return history.go(-1)\">";
        
       
    }
    
    


    mysqli_close($objCon);
    

?>	





