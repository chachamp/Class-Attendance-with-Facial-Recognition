<?php
header('Access-Control-Allow-Origin: *');
include("../../../main.service/config/connect.db.service.php");
$comment = $_POST['comment'];
$id = $_POST['delete_id'];
$subject = $_POST['subject3'];
$section = $_POST['section3'];
echo $comment;
echo $id;
echo $subject;
echo $section;

$strSQL = "DELETE FROM announcement WHERE date ='$id'
AND comment_box ='$comment'
AND sub_name ='$subject'
AND section ='$section' ";
$objQuery = mysqli_query($objCon,$strSQL);

mysqli_close($objCon);
?>
