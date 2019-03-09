<?php

include("../../../main.service/config/connect.db.service.php");

$status_sw_1 =  trim($_POST["status_sw_1"]);


if($status_sw_1 == "On"){
    $button_change = "Off";
    $alert = 10;
 $valuebutton_sql = "UPDATE logcontroller SET status_sw = '".$button_change."' 
 WHERE group_stu = '1' ";
$valuebutton_query =  mysqli_query($objCon, $valuebutton_sql);

}

elseif($status_sw_1 == "Off"){
    $alert = 11;
    $button_change = "On";
    $valuebutton_sql = "UPDATE logcontroller SET status_sw = '".$button_change."' 
    WHERE group_stu = '1' ";
    $valuebutton_query =  mysqli_query($objCon, $valuebutton_sql);
  //  echo $valuebutton_sql;
}





$button1 = "";
$button1 .= '<input type="button" class="power" name="g1" id="g1"  onclick="buttonControlAdmin1()" '; 
$button1 .= 'value="'.$button_change.'" ';
$button1 .= '>';


$data['button1'] = $button1;

$data['alert'] = $alert;
echo Json_encode($data);