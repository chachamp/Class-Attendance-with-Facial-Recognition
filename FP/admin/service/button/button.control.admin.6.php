<?php

include("../../../main.service/config/connect.db.service.php");

$status_sw_6 =  trim($_POST["status_sw_6"]);

if($status_sw_6 == "On"){
  $button_change = "Off";
  $alert = 60;
$valuebutton_sql = "UPDATE logcontroller SET status_sw = '".$button_change."' 
WHERE group_stu = '6' ";
$valuebutton_query =  mysqli_query($objCon, $valuebutton_sql);

}

elseif($status_sw_6 == "Off"){
  $alert = 61;
  $button_change = "On";
  $valuebutton_sql = "UPDATE logcontroller SET status_sw = '".$button_change."' 
  WHERE group_stu = '6' ";
  $valuebutton_query =  mysqli_query($objCon, $valuebutton_sql);

}


$button6 = "";
$button6 .= '<input type="button" class="power" name="g6" id="g6"  onclick="buttonControlAdmin6()" '; 
$button6 .= 'value="'.$button_change.'" ';
$button6 .= '>';




$data['button6'] = $button6;
$data['alert'] = $alert;
echo Json_encode($data);