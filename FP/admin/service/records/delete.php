<?php
header('Access-Control-Allow-Origin: *');
include("../../../main.service/config/connect.db.service.php");

$id = $_POST['delete_id'];
$subject = $_POST['subject1'];
$section = $_POST['section1'];

$strSQL = "DELETE FROM listofname WHERE stu_id ='$id'
AND sub_name ='$subject'
AND section ='$section' ";
$objQuery = mysqli_query($objCon,$strSQL);

mysqli_close($objCon);
?>
