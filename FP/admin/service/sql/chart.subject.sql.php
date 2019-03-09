<?php

include("../../../main.service/config/connect.db.service.php");
$subject = $_POST['subject'];
$section = $_POST['section'];
#Select GUID
$strSQL1 = "SELECT gid FROM detailsubject WHERE sub_name  = '".trim($subject)."' 
AND section = '".trim($section)."' ";
$objQuery = mysqli_query($objCon,$strSQL1);

while ($row = mysqli_fetch_array($objQuery)) 
{
      $GUID = $row['gid'];
}

$strSQLOT = "SELECT stu_id FROM loglistofname WHERE status='OnTime' 
AND guid = '".$GUID."' " ;
  $objQueryOT = mysqli_query($objCon,$strSQLOT);
  $objResultOT = mysqli_num_rows($objQueryOT);
 
  $strSQLLATE =  "SELECT stu_id FROM loglistofname WHERE status='Late' 
  AND guid = '".$GUID."' " ;
  $objQueryLATE = mysqli_query($objCon,$strSQLLATE);
  $objResultLATE = mysqli_num_rows($objQueryLATE);
 

 $strSQLOUTTIME =  "SELECT stu_id FROM loglistofname WHERE status='Outtime' 
 AND guid = '".$GUID."' " ;
 $objQueryOUTTIME = mysqli_query($objCon,$strSQLOUTTIME);
  $objResultOUTTIME = mysqli_num_rows($objQueryOUTTIME);

 $data['late'] = $objResultLATE;
 $data['ontime'] = $objResultOT;
 $data['outtime'] = $objResultOUTTIME;
 $data['subjectname'] = $subject;


 
 echo Json_encode($data);

  
?>