<?php

include("../../../main.service/config/connect.db.service.php");


$status_sw_3 =  trim($_POST["status_sw_3"]);


if($status_sw_3 == "On"){
  $button_change = "Off";
  $alert = 30;
$valuebutton_sql = "UPDATE logcontroller SET status_sw = '".$button_change."' 
WHERE group_stu = '3' ";
$valuebutton_query =  mysqli_query($objCon, $valuebutton_sql);

}

elseif($status_sw_3 == "Off"){
  $alert = 31;
  $button_change = "On";
  $valuebutton_sql = "UPDATE logcontroller SET status_sw = '".$button_change."' 
  WHERE group_stu = '3' ";
  $valuebutton_query =  mysqli_query($objCon, $valuebutton_sql);
//  echo $valuebutton_sql;
}


$button3 = "";
$button3 .= '<input type="button" class="power" name="g3" id="g3"  onclick="buttonControlAdmin3()" '; 
$button3 .= 'value="'.$button_change.'" ';
$button3 .= '>';





$data['button3'] = $button3;

$data['alert'] = $alert;
echo Json_encode($data);