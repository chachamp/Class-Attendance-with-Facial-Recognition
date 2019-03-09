<?php

include("../../../main.service/config/connect.db.service.php");

  if(trim($_POST["txtusername"]) == "")
 {
  echo "<body onload=\"window.alert('Please input username!');return history.go(-1)\">";
  
  exit();
 }
 if(trim($_POST["txtpassword"]) == "")
 {
  echo "<body onload=\"window.alert('Please input password!');return history.go(-1)\">";
  exit();
 }
 if(trim($_POST["txtstuid"]) == "")
 {
  echo "<body onload=\"window.alert('Please input student id!');return history.go(-1)\">";
  exit();
    }
    if(trim($_POST["txtsection"]) == "")
 {
  echo "<body onload=\"window.alert('Please input section!');return history.go(-1)\">";
  exit();
 }
 

 
 $strSQL2 = "SELECT * FROM student WHERE username_stu  = '".trim($_POST['txtusername'])."' ";
 $objQuery2 = mysqli_query($objCon,$strSQL2);
 $objResult = mysqli_fetch_array($objQuery2);
 //รับค่า Username จาก Database ที่ตาราง student
 $strSQL1 = "SELECT * FROM student WHERE stu_id  = '".trim($_POST['txtstuid'])."' ";
 $objQuery1 = mysqli_query($objCon,$strSQL1);
 $objResult1 = mysqli_fetch_array($objQuery1);
 //รับค่า รหัส น.ศ. จาก Database ที่ตาราง student
 
 $strSQL3 = "SELECT username_stu FROM student WHERE stu_id  = '".trim($_POST['txtstuid'])."' ";
 $objQuery3 = mysqli_query($objCon,$strSQL3);
 $objResult3 = mysqli_fetch_array($objQuery3);
 

     $check_username_stu = $objResult3['username_stu'];
   




 if($objResult)
 { 
  echo "<body onload=\"window.alert('Username already exists');return history.go(-1)\">";
  //แสดงว่า UserName ซ้ำในระบบ
  exit();
 } 

  else if(!$objResult1){

  echo "<body onload=\"window.alert('Account Invalid');return history.go(-1)\">";
  //แสดงว่าไม่มี รหัส น.ศ.นี้ในระบบ 
  exit(); 
 }

 else if($check_username_stu != trim($_POST["txtusername"])){
  echo "<body onload=\"window.alert('Account already exists');return history.go(-1)\">";
  //แสดงว่าไม่มี รหัส น.ศ.นี้ในระบบ 
  exit(); 
 }

 else
 {
  
  $strSQL = "UPDATE student SET 
  username_stu = '".trim($_POST['txtusername'])."',
  password_stu='".trim($_POST['txtpassword'])."',
  section_stu='".trim($_POST['txtsection'])."'
  WHERE stu_id = '".trim($_POST['txtstuid'])."' ";
  $objQuery = mysqli_query($objCon,$strSQL);

 
 }
  //echo "Register Completed!<br>"; // finished to add in database
  echo "<body onload=\"window.alert('Register Completed!');return history.go(-1)\">";

 mysqli_close($objCon);
?>