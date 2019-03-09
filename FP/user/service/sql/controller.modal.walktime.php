<?php
include("../../../main.service/config/connect.db.service.php");
@ini_set('display_errors', '0');
date_default_timezone_set("Asia/Bangkok");
$current_date = date("Y-m-d"); 


//value from mainpage
$username_stu = $_POST['usernamestu'];
// echo $username_stu."<br>";

$student_sql = "SELECT stu_id  FROM student WHERE username_stu = '".$username_stu."' ";
$student_query = mysqli_query($objCon,$student_sql);



while ($student_result = mysqli_fetch_array($student_query)) {
    $student_result_stu_id = $student_result['stu_id'];
    
 }
//  echo $student_result_stu_id."<br>";

 
 
 $guid_sql = "SELECT D.gid FROM 
 (SELECT stu_name,stu_id,gid FROM detailsubject A 
 INNER JOIN listofname B on A.sub_name = B.sub_name and A.section = B.section) C 
 INNER JOIN subject D on C.gid = D.gid 
 WHERE stu_id = '".$student_result_stu_id."' and D.date = CURRENT_DATE() and CURRENT_TIME() 
 BETWEEN D.time_start and D.time_end ";
 $guid_query = mysqli_query($objCon,$guid_sql);
 
 while ($guid_result = mysqli_fetch_array($guid_query)) 
 {
       $GUID = $guid_result['gid'];
 }

//echo $GUID."<br>";

$subject_sql = "SELECT sub_name,section  FROM subject WHERE  date = CURDATE()
 AND gid = '".$GUID."' 
 AND CURTIME() BETWEEN time_start  AND time_end ";
$subject_query = mysqli_query($objCon,$subject_sql);


while ($subject_result = mysqli_fetch_array($subject_query)) {
    $subject_result_subject = $subject_result['sub_name'];
    $subject_result_section = $subject_result['section'];
 }

// echo $subject_result_subject."<br>";
// echo $subject_result_section."<br>";


$loglistofname_sql = "SELECT walktime  FROM loglistofname WHERE stu_id = '".$student_result_stu_id."' 
and walkdate = '".$current_date."' 
and guid = '".$GUID."' ";


$loglistofname_query = mysqli_query($objCon,$loglistofname_sql);

while ($loglistofname_result = mysqli_fetch_array($loglistofname_query)) 
{
    $loglistofname_result_walktime = $loglistofname_result['walktime'];
}
if($loglistofname_result_walktime == ""){
    $loglistofname_result_walktime = "None";
    $data['walktime'] = $loglistofname_result_walktime;
}
else{
$data['walktime'] = $loglistofname_result_walktime;
}



 echo Json_encode($data);
?>