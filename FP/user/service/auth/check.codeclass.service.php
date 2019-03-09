<?php
session_start();

include("../../../main.service/config/connect.db.service.php");
date_default_timezone_set("Asia/Bangkok");
$current_date = date("Y-m-d"); 
$current_time = date("H:i");
// echo$current_date;
// echo$current_time;
 $_SESSION['txtcodeclass'] = $_POST['txtcodeclass'];
$strSQL = "SELECT * FROM detailsubject WHERE gid = '".$_POST['txtcodeclass']."' ";
$objQuery = mysqli_query($objCon,$strSQL);
$objResult = mysqli_fetch_array($objQuery);

$sqlTimer = "SELECT date,time_start,time_end FROM subject WHERE gid = '".$_POST['txtcodeclass']."' 
AND date = '".$current_date."'"; 
$sqlTimerQuery = mysqli_query($objCon,$sqlTimer);
$sqlTimerResult = mysqli_fetch_array($sqlTimerQuery);

//condition 

if(!$objResult)

	{
		echo "<body onload=\"window.alert('Your Code Incorrect!');return history.go(-1)\">";		
    }

else

    {
       if($sqlTimerResult["date"] == $current_date){

        

       $date_start1= $sqlTimerResult["time_start"];//time_start -30 นาที
       $date_end1= date("H:i",strtotime($date_start1."-30 minute"));

       $date_start2= $sqlTimerResult["time_start"];//time_start -60 นาที
       $date_end2= date("H:i",strtotime($date_start2."-1 hour"));
      echo strtotime($date_end2)."ตัวเช็คจากเวลา start - 60นาที"."<br>";
       echo strtotime($date_end1)."ตัวเช็คจากเวลา start - 30นาที"."<br>";
        echo strtotime($current_time)."เวลาปัจจุบัน"."<br>";
    //   echo strtotime($sqlTimerResult["time_end"])."เวลาเลิกเรียน"."<br>";
    //   echo strtotime($sqlTimerResult["time_start"])."เวลาเริ่มเรียน"."<br>";


        if(strtotime($date_end2) < strtotime($current_time) && strtotime($date_end1) > strtotime($current_time)){
        //    echo "เข้า page cooldown";  
            header("location:/FP/user/cooldown.php");
     
        }
        
        else if(strtotime($date_end1) < strtotime($current_time) && strtotime($sqlTimerResult["time_end"]) > strtotime($current_time)){
        //    echo "เข้า page schedule"; 
             header("location:/FP/user/schedule.php");
            
        }
        else{
            header("location:/FP/user/access.html");
            // echo "คิคิ";
        }

        
         $_SESSION["txtcodeclass"] = $_POST["txtcodeclass"];
            
    }

    else{
        // echo "ผิดที่วันจ้า";
        header("location:/FP/user/access.html");
    }

                
   
    
    }

    
    mysqli_close($objCon);

  

?>