<?php
include("../../../main.service/config/connect.db.service.php");
date_default_timezone_set("Asia/Bangkok");
$current_date = date("Y-m-d"); 
$current_time = date("H:i");
echo $current_date;
echo $current_time;


$time_end=date("H:i",strtotime($current_time."+3 hour"));
echo $time_end;
?>