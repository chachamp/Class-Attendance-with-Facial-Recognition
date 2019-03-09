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




$strSQL1 = "SELECT gid FROM detailsubject WHERE sub_name  = '".trim($subject)."' 
AND section = '".$sectionsqlcheck."' ";

$objQuery = mysqli_query($objCon,$strSQL1);

while ($row = mysqli_fetch_array($objQuery)) 
{
      $GUID = $row['gid'];
}



    $strTable = "SELECT walkdate,walktime,status from loglistofname
    Where guid = '".$GUID."' AND stu_id = '".$stuidsqlcheck."'   ";
    $objQueryTable= mysqli_query($objCon,$strTable);
   

            
     $tbody = "";
     
   while($objResultTable = mysqli_fetch_array($objQueryTable))  
   {  
    $tbody .= '<tr>';  
    $tbody .= '<td id="add">'.$subject.'</td>';  
    $tbody .= '<td id="add">'.$objResultTable['walkdate'].'</td>';
    $tbody .= '<td id="add">'.$objResultTable['walktime'].'</td>';
    $tbody .= '<td id="add">'.$objResultTable['status'].'</td>';
    $tbody .= '</tr>';  

    }

   
    $data['tbody'] = $tbody;
    
    echo Json_encode($data);

    ?>