<?php


include("../../../main.service/config/connect.db.service.php");

	if(trim($_POST["dateInput"]) == "")
	{
		echo "<body onload=\"window.alert('Please Input Date!');return history.go(-1)\">";
		
		exit();
	}
	if(trim($_POST["timeStartInput"]) == "")
	{
		echo "<body onload=\"window.alert('Please Input Time Start!');return history.go(-1)\">";
		exit();
	}
    
    if(trim($_POST["timeEndInput"]) == "")
	{
		echo "<body onload=\"window.alert('Please Input Time End!');return history.go(-1)\">";
		exit();
    }
    if(trim($_POST["timeLateInput"]) == "")
	{
		echo "<body onload=\"window.alert('Please Input Time Last!');return history.go(-1)\">";
		exit();
	}
	
	$strSQL1 = "SELECT gid FROM detailsubject WHERE sub_name  = '".trim($_POST['txtsubjectpicktime'])."' 
    and section = '".trim($_POST['txtsection'])."' ";
	$objQuery = mysqli_query($objCon,$strSQL1);
	

	while ($row = mysqli_fetch_array($objQuery)) {
		$GID = $row['gid'];
	}
	
	$strSQL = "INSERT INTO subject (sub_name,section,gid,date,time_start,time_end,time_late)  VALUES 
        ('".$_POST["txtsubjectpicktime"]."',
		'".$_POST["txtsection"]."',
		'".$GID."',
		'".$_POST["dateInput"]."',
		'".$_POST["timeStartInput"]."',
		'".$_POST["timeEndInput"]."',
		'".$_POST["timeLateInput"]."')" ;
	$objQuery = mysqli_query($objCon,$strSQL);



/*	
$strSQL2 = "UPDATE listofname SET 
date = '".$_POST["dateInput"]."'
WHERE sub_name = '".trim($_POST['txtsubject'])."' 
and section='".trim($_POST['txtsection'])."' ";
$objQuery2 = mysqli_query($objCon,$strSQL2);*/

	

	
	


		//echo "Register Completed!<br>"; // finished to add in database
    echo "<body onload=\"window.alert('Set time Completed!');return history.go(-1)\">";
        
       
    
    
    


    mysqli_close($objCon);
    

?>	
