<?php 
    include("../../../main.service/config/connect.db.service.php");
    date_default_timezone_set("Asia/Bangkok");

    $user_tea = "admin12345";

    $subject_sql = "SELECT sub_name,section  FROM subject INNER JOIN detailsubject WHERE  subject.CURDATE() AND subject.CURTIME() BETWEEN subject.time_start  AND subject.time_end ON subject.gid=detailsubject.gid";
    $subject_query = mysqli_query($objCon,$subject_sql);


    while ($subject_result = mysqli_fetch_array($subject_query)) {
    $subject_result_subject = $subject_result['sub_name'];
    $subject_result_section = $subject_result['section'];
    }
    echo $subject_result_subject;
    echo $subject_result_section;   


    /*$strpower = "SELECT gid FROM detailsubject WHERE username_tea ='".$user_tea."' ";


    $objQuery = mysqli_query($objCon,$strpower);

    while ($row = mysqli_fetch_array($objQuery)) 
{
      $GUID = $row['gid'];
}
*/
?>