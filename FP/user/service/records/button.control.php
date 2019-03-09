<?php

include("../../../main.service/config/connect.db.service.php");

$button =  trim($_POST["status_sw"]);
$group =  trim($_POST["group"]);
$stuid = trim($_POST["stuid"]);

//  echo $button."<br>";
// echo $group."<br>";
// echo $stuid."<br>";

if($button == "On"){
    $button_change = "Off";
    $alert = 0;
 $valuebutton_sql = "UPDATE logcontroller SET status_sw = '".$button_change."', stu_id = '".$stuid."'
 WHERE group_stu = '".$group."' ";
$valuebutton_query =  mysqli_query($objCon, $valuebutton_sql);

}

elseif($button == "Off"){
    $alert = 1;
    $button_change = "On";
    $valuebutton_sql = "UPDATE logcontroller SET status_sw = '".$button_change."',stu_id = '".$stuid."' 
    WHERE group_stu = '".$group."' ";
    $valuebutton_query =  mysqli_query($objCon, $valuebutton_sql);
  //  echo $valuebutton_sql;
}
$button = "";
$button .= '<input name="buttonvalue" id="buttonvalue" onclick="buttoncontrol()" type="button"'; 
$button .= 'value="'.$button_change.'" ';
$button .= '>';

$data['button'] = $button;
$data['valueon'] = "On";
$data['valueoff'] = "Off";
$data['alert'] = $alert;
echo Json_encode($data);


// $mysql = "INSERT INTO logcontroller (group_stu,stu_id,status_sw)  VALUES ('".$group."','".$stuid."','".$button."')";

// $query =  mysqli_query($objCon, $mysql); 

?>