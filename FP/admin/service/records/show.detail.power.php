<?php
include("../../../main.service/config/connect.db.service.php");

$user_tea = $_POST['usertea'];
//echo $user_tea;
// $valuebutton_g2 = "On";

// $button_g2 = "";
// $button_g2 .= '<input type="button" class="power" value="'.$valuebutton_g2.'">' ;


// $data['buttong2'] = $button_g2;
// $data['userteafromphp'] = $user_tea;
// echo Json_encode($data);

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






?>