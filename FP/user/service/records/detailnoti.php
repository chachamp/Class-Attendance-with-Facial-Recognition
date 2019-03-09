<?php

include("../../../main.service/config/connect.db.service.php");
 @ini_set('display_errors', '0');
    $username_stu = $_POST['annpost'];
   



     $sqlcheck = "SELECT stu_id from student where username_stu = '".$username_stu."' ";
     $sqlcheckQuery = mysqli_query($objCon,$sqlcheck);
     $objsqlcheck = mysqli_fetch_array($sqlcheckQuery);
 
     $stuidsqlcheck = $objsqlcheck["stu_id"];


  

    //KEY CHECK     
    $result_increase_1 = "SELECT DISTINCT  A.sub_name FROM `announcement` A 
    inner join listofname B on A.sub_name = B.sub_name and A.section = B.section
    WHERE stu_id = '".$stuidsqlcheck."'  and B.state_date <= A.date and B.state_time <= A.time
    and B.msg_status = 1 ";
    $result_increase_query = mysqli_query($objCon,$result_increase_1);
     
    $resultArray = array();

    while($result = mysqli_fetch_array($result_increase_query,MYSQLI_ASSOC))
    {
        $notibox = "";
        $result1 = $result['sub_name'];
        
        $result_increase_2 = "SELECT   A.sub_name FROM `announcement` A 
        inner join listofname B on A.sub_name = B.sub_name and A.section = B.section
        WHERE stu_id = '".$stuidsqlcheck."'  and B.state_date <= A.date and B.state_time <= A.time
        and B.msg_status = 1 and A.sub_name = '".$result1."' ";
        $result_increase_query_2 = mysqli_query($objCon,$result_increase_2);
        $rowcount_2=mysqli_num_rows($result_increase_query_2);
      
        $notibox .= '<div class="innoti">';
        $notibox .= '<a style="text-decoration:none">You has "'.$rowcount_2.'" new notification about <div style="text-transform:uppercase;display:inline;"><b> "'.$result1.'" </b></div></a>';
        $notibox .= '</div>';
       
       
        array_push($resultArray,$notibox);  
    }
      
    $data['notibox'] = $resultArray;
    
      echo Json_encode($data);

     ?>