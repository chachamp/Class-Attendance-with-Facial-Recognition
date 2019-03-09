<?php
include("../../../main.service/config/connect.db.service.php");
$status_sw = $_POST["status_sw"];
$temp = trim($_POST["walktime"]);

$c1 = trim($_POST["check_controlsubject"]);
$c2 = trim($_POST["check_controlsection"]);
$c3 = trim($_POST["check_controlwalktime"]);
$c4 = trim($_POST["check_controlgroup"]);
$c5 = trim($_POST["check_controlstatussw"]);
if($c1 == "None" && $c2 == "None" && $c3 == "None" && $c4 == "None" && $c5 == "None"){
    $value = "0";
    $button = "0";
    $data['c1'] = "2";
    $data['c2'] = "3";
    $data['c3'] = "4";
    $data['c4'] = "5";
    $data['c5'] = "6";
    $data['button'] = $button;
    $data['value'] = $value;
    echo Json_encode($data);
}

else if($temp == ""){
    $value = "0";
    $button = "0";

    $data['button'] = $button;
    $data['value'] = $value;
    echo Json_encode($data);
}
else if($temp =="None"){
    $value = "0";
    $button = "0";

    $data['button'] = $button;
    $data['value'] = $value;
    echo Json_encode($data);
}
else{
$value = "";
$value =  ''.$temp.'';

$button = "";
$button .= '<input name="buttonvalue" id="buttonvalue" onclick="buttoncontrol()" type="button"'; 
$button .= 'value="'.$status_sw.'" ';
$button .= '>';
$data['value'] = $value;
$data['button'] = $button;
echo Json_encode($data);
}









?>