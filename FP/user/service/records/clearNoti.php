<?php

include("../../../main.service/config/connect.db.service.php");
date_default_timezone_set("Asia/Bangkok");
@ini_set('display_errors', '0');
 $clearkey = $_POST['clear_key'];
 $stuname = $_POST['stuname'];
 $current_date = date("Y-m-d"); 
 $current_time = date("H:i");
  
 $sqlcheck = "SELECT stu_id from student where username_stu = '".$stuname."' ";
 $sqlcheckQuery = mysqli_query($objCon,$sqlcheck);
 $objsqlcheck = mysqli_fetch_array($sqlcheckQuery);

 $stuidsqlcheck = $objsqlcheck["stu_id"];



if($clear_key == 0)
{
   
    $strSQL = "UPDATE listofname SET msg_status = 0,state_time = '".$current_time."',state_date ='".$current_date."'
    WHERE stu_id = '".$stuidsqlcheck."' ";
    $objQuery = mysqli_query($objCon,$strSQL);
 
    $data['alert'] = 1;


}
echo json_encode($data);




     ?>