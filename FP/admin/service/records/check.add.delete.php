<?php
session_start();
include("../../../main.service/config/connect.db.service.php");
$strSQL = "SELECT sub_name,section FROM subject WHERE sub_name = '".$_POST["txtsubjectadddel"]."'
and section = '".$_POST["txtsection"]."' ";
$objQuery = mysqli_query($objCon,$strSQL);
$objResult = mysqli_fetch_array($objQuery) ;
     

    $_SESSION["sub_name"] = $objResult["sub_name"];
    $_SESSION["section"] = $objResult["section"];
    
         



    header("location:/FP/admin/page.add.delete.php");
    mysqli_close($objCon);


?>