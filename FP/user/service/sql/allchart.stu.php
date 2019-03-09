<?php

include("../../../main.service/config/connect.db.service.php");

$annpost = $_POST['annpost'];


$sqlcheck = "SELECT stu_id from student where username_stu = '".$annpost."' ";
$sqlcheckQuery = mysqli_query($objCon,$sqlcheck);
$objsqlcheck = mysqli_fetch_array($sqlcheckQuery);

$stuidsqlcheck = $objsqlcheck["stu_id"];

//echo $stuidsqlcheck;
$strSQLALLOT = "SELECT stu_id FROM loglistofname WHERE status='OnTime' 
AND stu_id = '".$stuidsqlcheck."' " ;
$objQueryALLOT = mysqli_query($objCon,$strSQLALLOT);
$objResultALLOT = mysqli_num_rows($objQueryALLOT);

$strSQLALLLATE =  "SELECT stu_id FROM loglistofname WHERE status='Late' 
AND stu_id = '".$stuidsqlcheck."' " ;
$objQueryALLLATE = mysqli_query($objCon,$strSQLALLLATE);
$objResultALLLATE = mysqli_num_rows($objQueryALLLATE);
 

 $strSQLALLOUTTIME =  "SELECT stu_id FROM loglistofname WHERE status='Outtime' 
 AND stu_id = '".$stuidsqlcheck."' " ;
 $objQueryALLOUTTIME = mysqli_query($objCon,$strSQLALLOUTTIME);
 $objResultALLOUTTIME = mysqli_num_rows($objQueryALLOUTTIME);



$data['allontime_stu'] = $objResultALLOT;
$data['alllate_stu'] = $objResultALLLATE;
$data['allouttime_stu'] = $objResultALLOUTTIME;
 
 #echo $data['allontime_stu'];
 #echo $data['allontime_stu'];
 #echo $data['allouttime_stu'];
 echo Json_encode($data);

  
?>