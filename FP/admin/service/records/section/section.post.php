<?php

include("../../../../main.service/config/connect.db.service.php");

$subject =  trim($_POST["subject6"]);
$username_tea =  trim($_POST["usernametea"]);

$strSQL11 = "SELECT DISTINCT section FROM detailsubject  
WHERE username_tea = '".$username_tea."' and sub_name = '".$subject."' ORDER BY section ASC"; 
$objQuery11 = mysqli_query($objCon, $strSQL11); 
$optionsection = "";
$optionsection .= '<font class="message2" align="left">Section :</font> ';
$optionsection .= '<select name="txtsection" id="txtsection" class="boxlist" style="background-color:#fcfcfc">';
$optionsection .= '<option value="" disabled selected> Please fill in section </option>';

while($row1 = mysqli_fetch_array($objQuery11))  
{  
    $optionsection_chart = $row1["section"];
    $optionsection .= '"<option value="'.$optionsection_chart.'">'.$optionsection_chart.'</option>"';
}
$optionsection .= '</select>';

 $data['optionsection'] = $optionsection;

echo Json_encode($data);

