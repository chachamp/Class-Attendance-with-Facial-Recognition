<?php

include("../../../main.service/config/connect.db.service.php");
$subject = $_POST['subject']; //Unity
$annpost = $_POST['annpost']; //user


$sqlcheck = "SELECT stu_id from student where username_stu = '".$annpost."' ";
$sqlcheckQuery = mysqli_query($objCon,$sqlcheck);
$objsqlcheck = mysqli_fetch_array($sqlcheckQuery);

$stuidsqlcheck = $objsqlcheck["stu_id"];



$sqlcheck1 = "SELECT section from listofname where stu_id = '".$stuidsqlcheck."'
and sub_name = '".$subject."' ";
$sqlcheckQuery1 = mysqli_query($objCon,$sqlcheck1);
$objsqlcheck1 = mysqli_fetch_array($sqlcheckQuery1);

$sectionsqlcheck = $objsqlcheck1["section"];




$strSQL1 = "SELECT gid FROM detailsubject WHERE sub_name  = '".trim($subject)."' 
AND section = '".$sectionsqlcheck."' ";

$objQuery = mysqli_query($objCon,$strSQL1);

while ($row = mysqli_fetch_array($objQuery)) 
{
      $GUID = $row['gid'];
}

$strSQLOT = "SELECT stu_id FROM loglistofname WHERE status='OnTime' 
AND guid = '".$GUID."'
AND stu_id = '".$stuidsqlcheck."' " ;
  $objQueryOT = mysqli_query($objCon,$strSQLOT);
  $objResultOT = mysqli_num_rows($objQueryOT);
 
  $strSQLLATE =  "SELECT stu_id FROM loglistofname WHERE status='Late' 
  AND guid = '".$GUID."' 
  AND stu_id = '".$stuidsqlcheck."' " ;
  $objQueryLATE = mysqli_query($objCon,$strSQLLATE);
  $objResultLATE = mysqli_num_rows($objQueryLATE);
 

 $strSQLOUTTIME =  "SELECT stu_id FROM loglistofname WHERE status='Outtime' 
 AND guid = '".$GUID."' 
 AND stu_id = '".$stuidsqlcheck."' " ;
 $objQueryOUTTIME = mysqli_query($objCon,$strSQLOUTTIME);
  $objResultOUTTIME = mysqli_num_rows($objQueryOUTTIME);

 $data['late'] = $objResultLATE;
 $data['ontime'] = $objResultOT;
 $data['outtime'] = $objResultOUTTIME;
 $data['subjectname'] = $subject;


 
 echo Json_encode($data);

  
?>