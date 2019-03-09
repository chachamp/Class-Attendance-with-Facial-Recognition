<?php

include("../../../main.service/config/connect.db.service.php");


$status_sw_7 =  trim($_POST["status_sw_7"]);


if($status_sw_7 == "On"){
  $button_change = "Off";
  $alert = 70;
$valuebutton_sql = "UPDATE logcontroller SET status_sw = '".$button_change."' 
WHERE group_stu = '7' ";
$valuebutton_query =  mysqli_query($objCon, $valuebutton_sql);

}

elseif($status_sw_7 == "Off"){
  $alert = 71;
  $button_change = "On";
  $valuebutton_sql = "UPDATE logcontroller SET status_sw = '".$button_change."' 
  WHERE group_stu = '7' ";
  $valuebutton_query =  mysqli_query($objCon, $valuebutton_sql);
//  echo $valuebutton_sql;
}


$button7 = "";
$button7 .= '<input type="button" class="power" name="g7" id="g7"  onclick="buttonControlAdmin7()" '; 
$button7 .= 'value="'.$button_change.'" ';
$button7 .= '>';



$data['button7'] = $button7;

$data['alert'] = $alert;
echo Json_encode($data);