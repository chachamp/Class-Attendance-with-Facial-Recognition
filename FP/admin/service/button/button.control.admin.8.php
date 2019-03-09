<?php

include("../../../main.service/config/connect.db.service.php");


$status_sw_8 =  trim($_POST["status_sw_8"]);


if($status_sw_8 == "On"){
  $button_change = "Off";
  $alert = 80;
$valuebutton_sql = "UPDATE logcontroller SET status_sw = '".$button_change."' 
WHERE group_stu = '8' ";
$valuebutton_query =  mysqli_query($objCon, $valuebutton_sql);

}

elseif($status_sw_8 == "Off"){
  $alert = 81;
  $button_change = "On";
  $valuebutton_sql = "UPDATE logcontroller SET status_sw = '".$button_change."' 
  WHERE group_stu = '8' ";
  $valuebutton_query =  mysqli_query($objCon, $valuebutton_sql);
//  echo $valuebutton_sql;
}

$button8 = "";
$button8 .= '<input type="button" class="power" name="g8" id="g8"  onclick="buttonControlAdmin8()" ';  
$button8 .= 'value="'.$button_change.'" ';
$button8 .= '>';





$data['button8'] = $button8;


$data['alert'] = $alert;
echo Json_encode($data);