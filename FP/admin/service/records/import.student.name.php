<?php 
include("../../../main.service/config/connect.db.service.php"); 
date_default_timezone_set("Asia/Bangkok");

$current_date = date("Y-m-d"); 
$current_time = date("H:i") . "\n";

 if(!empty($_FILES["employee_file"]["name"]))  
 {  
         
      $output = '';  
      $allowed_ext = array("csv");  
      $extension = end(explode(".", $_FILES["employee_file"]["name"]));  
      if(in_array($extension, $allowed_ext))  
      {  
           $file_data = fopen($_FILES["employee_file"]["tmp_name"], 'r');  
           fgetcsv($file_data); 

           $count = 0;
           $num_group = 1;
           $count2 =0;
           $numbergp = $_POST["numbergp"];
          #เลข5 กำหนดตัวแปรที่รับจาก web
           while($row = fgetcsv($file_data))  
           {    
                $stu_id = mysqli_real_escape_string($objCon, $row[0]);  
                $stu_name = mysqli_real_escape_string($objCon, $row[1]);  
                
                $query = "INSERT IGNORE INTO student (stu_id,stu_name)  VALUES ('$stu_id','$stu_name') ";  
                mysqli_query($objCon, $query);

                #pukan.loop
                if($count2 == 0){
                    $count2 = $count2+1;
                }
                else{
               $count = $count+1;
                 if($count == $numbergp)
                 {
                    $count = 0;
                    $num_group = $num_group+1;
                 }
               }

                $strSQL5 = "INSERT IGNORE INTO listofname (stu_id,stu_name,sub_name,section,num_group,state_time,state_date)  VALUES 
                ('$stu_id',
                '$stu_name',
                '".$_POST["txtsubject2"]."',
                '".$_POST["txtsection2"]."',
                '$num_group',
                '$current_time',
                '$current_date' )" ;
                mysqli_query($objCon, $strSQL5); 
           }  
           echo "<script type=\"text/javascript\">
           alert(\"Upload Success.\");
           window.location = \"../../page.php\"
      </script>";
          
        }
      else  
      {  
          echo "<script type=\"text/javascript\">
          alert(\"Fail Upload.\");
          window.location = \"../../page.php\"
     </script>"; 
      }  
 }  
 else  
 {  
     echo "<script type=\"text/javascript\">
     alert(\"No file\");
    
</script>";
 }  
 ?>  
