<?php

if($_SESSION["sub_name"] == "")
	{
		echo "<body onload=\"window.alert('Please choose subject and section!');return history.go(-1)\">";	
		exit();
    } 

else if($_SESSION["section"] == "")
{
    echo "<body onload=\"window.alert('Please choose subject and section!');return history.go(-1)\">";	
    exit();
} 
else {
 
$strSQL8 = "SELECT comment_box,date,time FROM announcement WHERE sub_name = '".$_SESSION["sub_name"]."'
and section = '".$_SESSION["section"]."' ";
$objQuery8 = mysqli_query($objCon,$strSQL8); //จากmysqli_query(จาก Value Config DB, จาก Table อะไรยังไง)


}
?>