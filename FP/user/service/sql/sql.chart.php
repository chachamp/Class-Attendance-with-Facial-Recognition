<?php
#ลบincludeด้วย
#include("../../../main.service/config/connect.db.service.php");
  $strSQLOT = "SELECT stu_id,status FROM loglistofname WHERE status='OnTime' AND stu_id = '58010903'" ;
  $objQueryOT = mysqli_query($objCon,$strSQLOT);
  $objResultOT = mysqli_num_rows($objQueryOT);
  #$_SESSION["username_stu"]
 
  $strSQLLATE = "SELECT stu_id,status FROM loglistofname WHERE status='Late' AND stu_id = '58010903'" ;
  $objQueryLATE = mysqli_query($objCon,$strSQLLATE);
  $objResultLATE = mysqli_num_rows($objQueryLATE);
 #$_SESSION["username_stu"]

 $strSQLOUT = "SELECT stu_id,status FROM loglistofname WHERE status='Outtime' AND stu_id = '58010903'" ;
  $objQueryOUT = mysqli_query($objCon,$strSQLOUT);
  $objResultOUT = mysqli_num_rows($objQueryOUT);
 #$_SESSION["username_stu"]
  
?>