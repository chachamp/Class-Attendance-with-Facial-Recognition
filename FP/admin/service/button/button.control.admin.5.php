<?php

include("../../../main.service/config/connect.db.service.php");


$status_sw_5 =  trim($_POST["status_sw_5"]);

if($status_sw_5 == "On"){
  $button_change = "Off";
  $alert = 50;
$valuebutton_sql = "UPDATE logcontroller SET status_sw = '".$button_change."' 
WHERE group_stu = '5' ";
$valuebutton_query =  mysqli_query($objCon, $valuebutton_sql);

}

elseif($status_sw_5 == "Off"){
  $alert = 51;
  $button_change = "On";
  $valuebutton_sql = "UPDATE logcontroller SET status_sw = '".$button_change."' 
  WHERE group_stu = '5' ";
  $valuebutton_query =  mysqli_query($objCon, $valuebutton_sql);
//  echo $valuebutton_sql;
}

$button5 = "";
$button5 .= '<input type="button" class="power" name="g5" id="g5"  onclick="buttonControlAdmin5()" '; 
$button5 .= 'value="'.$button_change.'" ';
$button5 .= '>';




$data['button5'] = $button5;

$data['alert'] = $alert;
echo Json_encode($data);