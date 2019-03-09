<?php

if($_SESSION["sub_name"] == "")
	{
		echo "<body onload=\"window.alert('Please choose subject and section!');return history.go(-1)\">";	
		exit();
    } 

else if($_SESSION["section"]  == "")
{
    echo "<body onload=\"window.alert('Please choose subject and section!');return history.go(-1)\">";	
    exit();
} 
else {
 
$strSQL = "SELECT date,time_start,time_late,time_end FROM subject WHERE sub_name = '".$_SESSION["sub_name"]."'
and section = '".$_SESSION["section"]."' ";
$objQuery = mysqli_query($objCon,$strSQL); //จากmysqli_query(จาก Value Config DB, จาก Table อะไรยังไง)


}
?>