<?php

include("../../../main.service/config/connect.db.service.php");

$status_sw_1 =  trim($_POST["status_sw_1"]);
$status_sw_2 =  trim($_POST["status_sw_2"]);
$status_sw_3 =  trim($_POST["status_sw_3"]);
$status_sw_4 =  trim($_POST["status_sw_4"]);
$status_sw_5 =  trim($_POST["status_sw_5"]);
$status_sw_6 =  trim($_POST["status_sw_6"]);
$status_sw_7 =  trim($_POST["status_sw_7"]);
$status_sw_8 =  trim($_POST["status_sw_8"]);
$status_sw_9 =  trim($_POST["status_sw_9"]);

// //  echo $button."<br>";
// // echo $group."<br>";
// // echo $stuid."<br>";

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
//  echo $valuebutton_sql;
}

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





$button1 = "";
$button1 .= '<input type="button" class="power" name="g1" id="g1"  onclick="buttonControlAdmin1()" '; 
$button1 .= 'value="'.$button_change.'" ';
$button1 .= '>';

$button2 = "";
$button2 .= '<input type="button" class="power" name="g2" id="g2"  onclick="buttonControlAdmin2()" '; 
$button2 .= 'value="'.$button_change.'" ';
$button2 .= '>';

$button3 = "";
$button3 .= '<input type="button" class="power" name="g3" id="g3"  onclick="buttonControlAdmin3()" '; 
$button3 .= 'value="'.$button_change.'" ';
$button3 .= '>';


$button4 = "";
$button4 .= '<input type="button" class="power" name="g4" id="g4"  onclick="buttonControlAdmin4()" '; 
$button4 .= 'value="'.$button_change.'" ';
$button4 .= '>';


$button5 = "";
$button5 .= '<input type="button" class="power" name="g5" id="g5"  onclick="buttonControlAdmin5()" '; 
$button5 .= 'value="'.$button_change.'" ';
$button5 .= '>';


$button6 = "";
$button6 .= '<input type="button" class="power" name="g6" id="g6"  onclick="buttonControlAdmin6()" '; 
$button6 .= 'value="'.$button_change.'" ';
$button6 .= '>';


$button7 = "";
$button7 .= '<input type="button" class="power" name="g7" id="g7"  onclick="buttonControlAdmin7()" '; 
$button7 .= 'value="'.$button_change.'" ';
$button7 .= '>';


$button8 = "";
$button8 .= '<input type="button" class="power" name="g8" id="g8"  onclick="buttonControlAdmin8()" ';  
$button8 .= 'value="'.$button_change.'" ';
$button8 .= '>';


$button9 = "";
$button9 .= '<input type="button" class="power" name="g9" id="g9"  onclick="buttonControlAdmin9()" '; 
$button9 .= 'value="'.$button_change.'" ';
$button9 .= '>';


$data['button1'] = $button1;
$data['button2'] = $button2;
$data['button3'] = $button3;
$data['button4'] = $button4;
$data['button5'] = $button5;
$data['button6'] = $button6;
$data['button7'] = $button7;
$data['button8'] = $button8;
$data['button9'] = $button9;

$data['alert'] = $alert;
echo Json_encode($data);