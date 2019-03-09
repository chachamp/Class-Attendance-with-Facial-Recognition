<?php
//check
//$_SESSION["username_stu"]
$strSQL = "SELECT stu_id  FROM student WHERE username_stu = '".$_SESSION["username_stu"]."' ";
$objQuery = mysqli_query($objCon,$strSQL);


while ($rowtest = mysqli_fetch_array($objQuery)) {
    $stuid = $rowtest['stu_id'];
}

$strSQL2 = "SELECT sub_name  FROM listofname WHERE stu_id = '".$stuid."' ";
$objQuery2= mysqli_query($objCon,$strSQL2);
$strSQL3 = "SELECT sub_name  FROM listofname WHERE stu_id = '".$stuid."' ";
$objQuery3= mysqli_query($objCon,$strSQL3);
$strSQL4 = "SELECT sub_name  FROM listofname WHERE stu_id = '".$stuid."' ";
$objQuery4= mysqli_query($objCon,$strSQL4);
$strSQL6 = "SELECT sub_name  FROM listofname WHERE stu_id = '".$stuid."' ";
$objQuery6= mysqli_query($objCon,$strSQL6);




$strSQL5 = "SELECT stu_id,stu_name  FROM student WHERE username_stu = '".$_SESSION["username_stu"]."' ";
$objQuery5 = mysqli_query($objCon,$strSQL5);
$objResult5 = mysqli_fetch_array($objQuery5);

//while ($rowtest1 = mysqli_fetch_array($objQuery2)) {
   // $stuid1 = $rowtest1['sub_name'];
//}


?>