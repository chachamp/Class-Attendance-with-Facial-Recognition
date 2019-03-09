<?php
include("../../../main.service/config/connect.db.service.php");
$showsection = $_POST['showsection'];
$showsubject = $_POST['showsubject'];


$sw_sql_1 = "Select status_sw From logcontroller Where group_stu = '1' ";
$sw_query_1 = mysqli_query($objCon,$sw_sql_1);
while ($sw_result_1 = mysqli_fetch_array($sw_query_1)) 
{
    $sw_1 = $sw_result_1['status_sw'];
}

$sw_sql_2 = "Select status_sw From logcontroller Where group_stu = '2' ";
$sw_query_2 = mysqli_query($objCon,$sw_sql_2);
while ($sw_result_2 = mysqli_fetch_array($sw_query_2)) 
{
    $sw_2 = $sw_result_2['status_sw'];
}

$sw_sql_3 = "Select status_sw From logcontroller Where group_stu = '3' ";
$sw_query_3 = mysqli_query($objCon,$sw_sql_3);
while ($sw_result_3 = mysqli_fetch_array($sw_query_3)) 
{
    $sw_3 = $sw_result_3['status_sw'];
}

$sw_sql_4 = "Select status_sw From logcontroller Where group_stu = '4' ";
$sw_query_4 = mysqli_query($objCon,$sw_sql_4);
while ($sw_result_4 = mysqli_fetch_array($sw_query_4)) 
{
    $sw_4 = $sw_result_4['status_sw'];
}

$sw_sql_5 = "Select status_sw From logcontroller Where group_stu = '5' ";
$sw_query_5 = mysqli_query($objCon,$sw_sql_5);
while ($sw_result_5 = mysqli_fetch_array($sw_query_5)) 
{
    $sw_5 = $sw_result_5['status_sw'];
}
$sw_sql_6 = "Select status_sw From logcontroller Where group_stu = '6' ";
$sw_query_6 = mysqli_query($objCon,$sw_sql_6);
while ($sw_result_6 = mysqli_fetch_array($sw_query_6)) 
{
    $sw_6 = $sw_result_6['status_sw'];
}
$sw_sql_7 = "Select status_sw From logcontroller Where group_stu = '7' ";
$sw_query_7 = mysqli_query($objCon,$sw_sql_7);
while ($sw_result_7 = mysqli_fetch_array($sw_query_7)) 
{
    $sw_7 = $sw_result_7['status_sw'];
}
$sw_sql_8 = "Select status_sw From logcontroller Where group_stu = '8' ";
$sw_query_8 = mysqli_query($objCon,$sw_sql_8);
while ($sw_result_8 = mysqli_fetch_array($sw_query_8)) 
{
    $sw_8 = $sw_result_8['status_sw'];
}

$sw_sql_9 = "Select status_sw From logcontroller Where group_stu = '9' ";
$sw_query_9 = mysqli_query($objCon,$sw_sql_9);
while ($sw_result_9 = mysqli_fetch_array($sw_query_9)) 
{
    $sw_9 = $sw_result_9['status_sw'];
}




$button1 = "";
$button1 .= '<input type="button" class="power" name="g1" id="g1"  onclick="buttonControlAdmin1()" '; 
$button1 .= 'value="'.$sw_1.'" ';
$button1 .= '>';

$button2 = "";
$button2 .= '<input type="button" class="power" name="g2" id="g2"  onclick="buttonControlAdmin2()" '; 
$button2 .= 'value="'.$sw_2.'" ';
$button2 .= '>';

$button3 = "";
$button3 .= '<input type="button" class="power" name="g3" id="g3"  onclick="buttonControlAdmin3()" '; 
$button3 .= 'value="'.$sw_3.'" ';
$button3 .= '>';


$button4 = "";
$button4 .= '<input type="button" class="power" name="g4" id="g4"  onclick="buttonControlAdmin4()" '; 
$button4 .= 'value="'.$sw_4.'" ';
$button4 .= '>';


$button5 = "";
$button5 .= '<input type="button" class="power" name="g5" id="g5"  onclick="buttonControlAdmin5()" '; 
$button5 .= 'value="'.$sw_5.'" ';
$button5 .= '>';


$button6 = "";
$button6 .= '<input type="button" class="power" name="g6" id="g6"  onclick="buttonControlAdmin6()" '; 
$button6 .= 'value="'.$sw_6.'" ';
$button6 .= '>';


$button7 = "";
$button7 .= '<input type="button" class="power" name="g7" id="g7"  onclick="buttonControlAdmin7()" '; 
$button7 .= 'value="'.$sw_7.'" ';
$button7 .= '>';


$button8 = "";
$button8 .= '<input type="button" class="power" name="g8" id="g8"  onclick="buttonControlAdmin8()" ';  
$button8 .= 'value="'.$sw_8.'" ';
$button8 .= '>';


$button9 = "";
$button9 .= '<input type="button" class="power" name="g9" id="g9"  onclick="buttonControlAdmin9()" '; 
$button9 .= 'value="'.$sw_9.'" ';
$button9 .= '>';

if($showsection == "None" && $showsubject == "None"){
    $alert = 0;
    $data['alert'] = $alert;
}


else{
$data['button1'] = $button1;
$data['button2'] = $button2;
$data['button3'] = $button3;
$data['button4'] = $button4;
$data['button5'] = $button5;
$data['button6'] = $button6;
$data['button7'] = $button7;
$data['button8'] = $button8;
$data['button9'] = $button9;
}


 echo Json_encode($data);


