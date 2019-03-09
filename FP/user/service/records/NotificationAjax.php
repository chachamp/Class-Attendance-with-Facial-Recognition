<?php

include("../../../main.service/config/connect.db.service.php");
 @ini_set('display_errors', '0');
    $username_stu = $_POST['annpost'];
   
     
    
     $sqlcheck = "SELECT stu_id from student where username_stu = '".$username_stu."' ";
     $sqlcheckQuery = mysqli_query($objCon,$sqlcheck);
     $objsqlcheck = mysqli_fetch_array($sqlcheckQuery);
 
     $stuidsqlcheck = $objsqlcheck["stu_id"];
 
     $result_increase = "SELECT * FROM `announcement` A 
     inner join listofname B on A.sub_name = B.sub_name and A.section = B.section
     WHERE stu_id = '".$stuidsqlcheck."'  and B.state_date <= A.date and B.state_time <= A.time
     and B.msg_status = 1 ";

     $badge_number = mysqli_query($objCon,$result_increase);
     $rowcount=mysqli_num_rows($badge_number);
       
     $data['badge_number']= array($rowcount);
  
      echo Json_encode($data);

     ?>