<?php
header('Access-Control-Allow-Origin: *');
include("../../../main.service/config/connect.db.service.php");

$id = $_POST['delete_id'];
$subject = $_POST['subject2'];
$section = $_POST['section2'];

echo $id;
echo $subject;
echo $section;

$strSQL = "DELETE FROM subject WHERE date ='$id'
AND sub_name ='$subject'
AND section ='$section' ";
$objQuery = mysqli_query($objCon,$strSQL);

mysqli_close($objCon);
?>
