<?php

include("../../../main.service/config/connect.db.service.php");


$status_sw_4 =  trim($_POST["status_sw_4"]);

if($status_sw_4 == "On"){
  $button_change = "Off";
  $alert = 40;
$valuebutton_sql = "UPDATE logcontroller SET status_sw = '".$button_change."' 
WHERE group_stu = '4' ";
$valuebutton_query =  mysqli_query($objCon, $valuebutton_sql);

}

elseif($status_sw_4 == "Off"){
  $alert = 41;
  $button_change = "On";
  $valuebutton_sql = "UPDATE logcontroller SET status_sw = '".$button_change."' 
  WHERE group_stu = '4' ";
  $valuebutton_query =  mysqli_query($objCon, $valuebutton_sql);
//  echo $valuebutton_sql;
}


$button4 = "";
$button4 .= '<input type="button" class="power" name="g4" id="g4"  onclick="buttonControlAdmin4()" '; 
$button4 .= 'value="'.$button_change.'" ';
$button4 .= '>';



$data['button4'] = $button4;
$data['alert'] = $alert;
echo Json_encode($data);