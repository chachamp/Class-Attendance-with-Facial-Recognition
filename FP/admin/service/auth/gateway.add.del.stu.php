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
else{
 
$strSQL = "SELECT stu_name,stu_id,num_group FROM listofname WHERE sub_name = '".$_SESSION["sub_name"]."'
and section = '".$_SESSION["section"]."' ORDER BY stu_id ASC ";
$objQuery = mysqli_query($objCon,$strSQL); //จากmysqli_query(จาก Value Config DB, จาก Table อะไรยังไง)
}

?>