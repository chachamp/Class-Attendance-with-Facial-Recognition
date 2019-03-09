<?php

include("../../../main.service/config/connect.db.service.php");

$txtgroup = $_POST['txtgroup'];
$txtstuid = $_POST['txtstuid'];
//$txtgroup = "Embedded System";
//$txtstuid = "61010003";
//echo $txtgroup;


$sqlcheck = "SELECT num_group from listofname where sub_name = '".$txtgroup."'
and stu_id = '".$txtstuid."' ";
$sqlcheckQuery = mysqli_query($objCon,$sqlcheck);
$objsqlcheck = mysqli_fetch_array($sqlcheckQuery);

$stuidsqlcheck = $objsqlcheck["num_group"];

//echo $stuidsqlcheck;
$data['stuidgroup'] = $stuidsqlcheck;

 echo Json_encode($data);

  
?>