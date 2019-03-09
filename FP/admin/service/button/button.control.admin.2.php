<?php

include("../../../main.service/config/connect.db.service.php");

$status_sw_2 =  trim($_POST["status_sw_2"]);


if($status_sw_2 == "On"){
    $button_change = "Off";
    $alert = 20;
 $valuebutton_sql = "UPDATE logcontroller SET status_sw = '".$button_change."' 
 WHERE group_stu = '2' ";
$valuebutton_query =  mysqli_query($objCon, $valuebutton_sql);

}

elseif($status_sw_2 == "Off"){
    $alert = 21;
    $button_change = "On";
    $valuebutton_sql = "UPDATE logcontroller SET status_sw = '".$button_change."' 
    WHERE group_stu = '2' ";
    $valuebutton_query =  mysqli_query($objCon, $valuebutton_sql);
  //  echo $valuebutton_sql;
}





$button2 = "";
$button2 .= '<input type="button" class="power" name="g2" id="g2"  onclick="buttonControlAdmin2()" '; 
$button2 .= 'value="'.$button_change.'" ';
$button2 .= '>';


$data['button2'] = $button2;

$data['alert'] = $alert;
echo Json_encode($data);