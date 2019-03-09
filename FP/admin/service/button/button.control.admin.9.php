<?php

include("../../../main.service/config/connect.db.service.php");


$status_sw_9 =  trim($_POST["status_sw_9"]);


if($status_sw_9 == "On"){
  $button_change = "Off";
  $alert = 90;
$valuebutton_sql = "UPDATE logcontroller SET status_sw = '".$button_change."' 
WHERE group_stu = '9' ";
$valuebutton_query =  mysqli_query($objCon, $valuebutton_sql);

}

elseif($status_sw_9 == "Off"){
  $alert = 91;
  $button_change = "On";
  $valuebutton_sql = "UPDATE logcontroller SET status_sw = '".$button_change."' 
  WHERE group_stu = '9' ";
  $valuebutton_query =  mysqli_query($objCon, $valuebutton_sql);
//  echo $valuebutton_sql;
}





$button9 = "";
$button9 .= '<input type="button" class="power" name="g9" id="g9"  onclick="buttonControlAdmin9()" '; 
$button9 .= 'value="'.$button_change.'" ';
$button9 .= '>';



$data['button9'] = $button9;

$data['alert'] = $alert;
echo Json_encode($data);