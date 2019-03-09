<?php

include("../../../main.service/config/connect.db.service.php");

  $strTable = "SELECT sub_name,walkdate,walktime,status,stu_id from loglistofname a inner JOIN detailsubject b on a.guid = b.gid 
  and a.stu_id LIKE '".trim($_SESSION["stu_id"])."' ";
  $objQuery = mysqli_query($objCon,$strTable);
 
  $strSubname = "SELECT DISTINCT sub_name from loglistofname a inner JOIN detailsubject b on a.guid = b.gid 
  and b.sub_name LIKE 'Embedded System' and stu_id = '61010003'";
  $objQuery1 = mysqli_query($objCon,$strSubname);

  $strSubname2 = "SELECT DISTINCT sub_name from loglistofname a inner JOIN detailsubject b on a.guid = b.gid 
  and b.sub_name LIKE 'Embedded System' and stu_id = '61010003'";
  $objQuery2 = mysqli_query($objCon,$strSubname2);
?>