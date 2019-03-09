<?php
include("../../../main.service/config/connect.db.service.php");
@ini_set('display_errors', '0');
date_default_timezone_set("Asia/Bangkok");

//value from mainpage
$user_tea = trim($_POST['usertea']);
// echo  $user_tea;


$guid_sql = "SELECT B.gid FROM 
(SELECT gid FROM detailsubject WHERE username_tea = '".$user_tea."') A 
INNER JOIN subject B ON A.gid = B.gid
WHERE  B.date = CURRENT_DATE() and CURRENT_TIME() 
BETWEEN B.time_start and B.time_end ";
$guid_query = mysqli_query($objCon,$guid_sql);



while ($guid_result = mysqli_fetch_array($guid_query)) 
{
     $GUID = $guid_result['gid'];
     
}
// echo $GUID."<br>";


$subject_sql = "Select sub_name,section FROM subject Where date = CURRENT_DATE() and gid = '".$GUID."' and CURRENT_TIME() BETWEEN time_start and time_end";
$subject_query = mysqli_query($objCon,$subject_sql);


while ($subject_result = mysqli_fetch_array($subject_query)) {
    $subject_result_subject = $subject_result['sub_name'];
    $subject_result_section = $subject_result['section'];
 }

// // //value subject ---> show
     // echo $subject_result_subject."<br>";
     // // //value section ----> show  
     // echo $subject_result_section."<br>";

     if($subject_result_subject == "" && $subject_result_section == ""){
          $data['subject'] = "None";
          $data['section']  = "None";
          }
          else{
          $data['subject'] = $subject_result_subject;
          $data['section']  = $subject_result_section;
          }
// echo  $data['subject'];
// echo $data['section'];
echo Json_encode($data);








?>