<?php

include("../../../main.service/config/connect.db.service.php");

$usernametea = $_POST['username_tea'];
#Select GUID
#'".$usernametea."' 

$strSQLALLOT = "SELECT status from loglistofname a inner JOIN 
detailsubject b on a.guid = b.gid and b.username_tea LIKE '".trim($usernametea)."'
AND status = 'Ontime' ";
$objQueryALLOT = mysqli_query($objCon,$strSQLALLOT);
$objResultALLOT = mysqli_num_rows($objQueryALLOT);

$strSQLALLLATE = "SELECT status from loglistofname a inner JOIN 
detailsubject b on a.guid = b.gid and b.username_tea LIKE '".trim($usernametea)."' 
AND status = 'Late' ";
$objQueryALLLATE = mysqli_query($objCon,$strSQLALLLATE);
$objResultALLLATE = mysqli_num_rows($objQueryALLLATE);


$strSQLALLOUTTIME = "SELECT status from loglistofname a inner JOIN 
detailsubject b on a.guid = b.gid and b.username_tea LIKE '".trim($usernametea)."' 
AND status = 'Outtime' ";
$objQueryALLOUTTIME = mysqli_query($objCon,$strSQLALLOUTTIME);
$objResultALLOUTTIME = mysqli_num_rows($objQueryALLOUTTIME);
 

$data['allontime'] = $objResultALLOT;
$data['alllate'] = $objResultALLLATE;
$data['allouttime'] = $objResultALLOUTTIME;
 
 #echo $data['alllate'];
 #echo $data['allontime'];
 #echo $data['allouttime'];
 echo Json_encode($data);

  
?>