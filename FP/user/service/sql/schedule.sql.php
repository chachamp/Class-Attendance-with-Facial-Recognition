<?php
date_default_timezone_set("Asia/Bangkok");

$current_date = date("Y-m-d"); 
$current_time = date("H:i") . "\n";
echo $current_time;
echo $current_date;
//header schedule
//codeclass,subject,section
    $strSQL = "SELECT * FROM detailsubject WHERE gid = '".$_SESSION['txtcodeclass']."' ";
	$objQuery = mysqli_query($objCon,$strSQL); 
    $objResult = mysqli_fetch_array($objQuery);
//date,time_start,time_end
     $strSQL1 = "SELECT date,time_start,time_end FROM subject WHERE gid = '".$_SESSION['txtcodeclass']."' 
     AND date = '".$current_date."' ";  
     $objQuery1 = mysqli_query($objCon, $strSQL1); 
     $objResult1 = mysqli_fetch_array($objQuery1);


  $strSQL4 ="SELECT C.stu_id,stu_name,status  FROM (SELECT stu_name,stu_id,gid  FROM detailsubject A
INNER JOIN listofname B on A.sub_name = B.sub_name and A.section = B.section) C
INNER JOIN loglistofname D on C.stu_id =D.stu_id AND C.gid=D.guid
WHERE guid = '".$_SESSION['txtcodeclass']."' and walkdate = '".$current_date."' ";
  $objQuery4 = mysqli_query($objCon, $strSQL4);



     ?>