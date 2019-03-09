<?php
include("../../../main.service/config/connect.db.service.php");

date_default_timezone_set("Asia/Bangkok");
$current_date = date("Y-m-d"); 

//value from mainpage
$username_stu = $_POST['usernamestu'];

$student_sql = "SELECT stu_id,stu_name  FROM student WHERE username_stu = '".$username_stu."' ";
$student_query = mysqli_query($objCon,$student_sql);



while ($student_result = mysqli_fetch_array($student_query)) {
    $student_result_stu_id = $student_result['stu_id'];
    $student_result_stu_name = $student_result['stu_name'];
 }

 //value username from mainpage
//  echo $username_stu."<br>";
// // //value stu_id
//  echo $student_result_stu_id."<br>";
// // //value stu_name
// echo $student_result_stu_name."<br>";]

//test
// SELECT * FROM loglistofname A 
// INNER JOIN subject B on A.guid = B.gid

// WHERE stu_id = '61010003' and B.date = CURRENT_DATE() and CURRENT_TIME() 
// BETWEEN D.time_start and D.time_end


$guid_sql = "SELECT D.gid FROM 
(SELECT stu_name,stu_id,gid FROM detailsubject A 
INNER JOIN listofname B on A.sub_name = B.sub_name and A.section = B.section) C 
INNER JOIN subject D on C.gid = D.gid 
WHERE stu_id = '61010003' and D.date = CURRENT_DATE() and CURRENT_TIME() 
BETWEEN D.time_start and D.time_end  ";
$guid_query = mysqli_query($objCon,$guid_sql);


//  while ($row=mysqli_fetch_array($result)) {
//     print_r($row);
// }
while ($guid_result = mysqli_fetch_array($guid_query)) 
{
     $GUID = $guid_result['gid'];
     
     // $GUID = $guid_result[0];$guid_result[1];
   // echo $GUID;
}


$subject_sql = "Select sub_name,section FROM subject Where date = CURRENT_DATE() and gid = '".$GUID."' and CURRENT_TIME() BETWEEN time_start and time_end";
$subject_query = mysqli_query($objCon,$subject_sql);


while ($subject_result = mysqli_fetch_array($subject_query)) {
    $subject_result_subject = $subject_result['sub_name'];
    $subject_result_section = $subject_result['section'];
 }

// // //value subject ---> show
//   echo $subject_result_subject."<br>";
// // //value section ----> show  
//  echo $subject_result_section."<br>";


$listofname_sql = "SELECT num_group  FROM listofname WHERE stu_id = '".$student_result_stu_id."' 
and sub_name = '".$subject_result_subject."' 
and section = '".$subject_result_section."' ";
$listofname_query = mysqli_query($objCon,$listofname_sql);

while ($listofname_result = mysqli_fetch_array($listofname_query)) {
    $listofname_result_num_group = $listofname_result['num_group'];
//     $listofname_result_sub_name = $listofname_result['sub_name'];
//     $listofname_result_section = $listofname_result['section'];


 }
 //value num group ---> show
 //echo  $listofname_result_num_group."<br>";


 


$logcontroller_sql = "Select * from logcontroller WHERE group_stu = '".$listofname_result_num_group."' Order by id DESC limit 1";


$logcontroller_query = mysqli_query($objCon,$logcontroller_sql);

//$logcontroller_result_status_sw = $logcontroller_result['status_sw'];




while ($logcontroller_result = mysqli_fetch_array($logcontroller_query)) 
{
      $logcontroller_result_status_sw = $logcontroller_result['status_sw'];
}

//status_sw ---> show
// echo $logcontroller_result_status_sw;

if($subject_result_subject == "" && $subject_result_section == "" && $listofname_result_num_group == "" && $logcontroller_result_status_sw == "")
{
    $data['subject'] = "None";
    $data['section']  = "None";
    $data['numgroup'] = "None";
    $data['statussw'] = "None";
}
else{
$data['subject'] = $subject_result_subject;
$data['section']  = $subject_result_section;

$data['numgroup'] = $listofname_result_num_group;
$data['statussw'] = $logcontroller_result_status_sw;
}


 echo Json_encode($data);


?>