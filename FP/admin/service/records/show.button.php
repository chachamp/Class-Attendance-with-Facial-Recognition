<?php

include("../../../main.service/config/connect.db.service.php");
$status_sw = $_POST["status_sw"];
$temp = trim($_POST["walktime"]);
if($temp == ""){
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