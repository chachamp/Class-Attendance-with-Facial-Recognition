<?php

include("../../../main.service/config/connect.db.service.php");


	


     $subject = $_POST['subject'];
     $annpost = $_POST['annpost'];
    

    $sqlcheck = "SELECT stu_id from student where username_stu = '".$annpost."' ";
    $sqlcheckQuery = mysqli_query($objCon,$sqlcheck);
    $objsqlcheck = mysqli_fetch_array($sqlcheckQuery);

    $stuidsqlcheck = $objsqlcheck["stu_id"];



    $sqlcheck1 = "SELECT section from listofname where stu_id = '".$stuidsqlcheck."'
    and sub_name = '".$subject."' ";
    $sqlcheckQuery1 = mysqli_query($objCon,$sqlcheck1);
    $objsqlcheck1 = mysqli_fetch_array($sqlcheckQuery1);

    $sectionsqlcheck = $objsqlcheck1["section"];

 

     $ann = "SELECT comment_box,username_tea,date,time FROM announcement
     WHERE sub_name = '".$subject."' 
     and section = '".$sectionsqlcheck."' ";
     $annQuery = mysqli_query($objCon,$ann);
            
     $add ="";
     $add .= '<br>';
     $add .= '<div class="container4">';
 
   while($objann = mysqli_fetch_array($annQuery))  
   {  

     $add .= '<div id="talkbubble">';
     $add .= ''.$objann['username_tea'].'';
     $add .= ':<br>';
     $add .= '<div style="line-height:100%;">';
     $add .= ''.$objann['comment_box'].'';
     $add .= '</div>';
     $add .= '<div style="align=right;">';
     $add .= '<b>';
     $add .= ''.$objann['time'].'';
     $add .= '</b>';
     $add .= ''.$objann['date'].''; 
     $add .= '</div></div>';
     
    }

    $add .= '</div>';
        
   
    $data['tbody'] = $add;
    echo Json_encode($data);

    ?>