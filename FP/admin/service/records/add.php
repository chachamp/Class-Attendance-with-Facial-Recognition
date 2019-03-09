<?php

include("../../../main.service/config/connect.db.service.php");
date_default_timezone_set("Asia/Bangkok");


$current_date = date("Y-m-d"); 
$current_time = date("H:i") ;

	// 	if(trim($_POST["stuidadd"]) == "")
	// {
	// 	echo "<body onload=\"window.alert('Please input student id!');return history.go(-1)\">";
		
	// 	exit();
	// }
	// if(trim($_POST["stunameadd"]) == "")
	// {
	// 	echo "<body onload=\"window.alert('Please input student name!');return history.go(-1)\">";
	// 	exit();
     // }
     $stuidadd = $_POST['stuidadd'];
     $stunameadd = $_POST['stunameadd'];
     $stugroupadd = $_POST['stugroupadd'];
     $subjectadd = $_POST['subjectadd'];
     $sectionadd = $_POST['sectionadd'];

     

	$strSQL = "SELECT * FROM listofname WHERE stu_id  = '".trim($stuidadd)."'
     AND num_group='".trim($stugroupadd)."' 
     AND sub_name='".trim($subjectadd)."' 
     AND section='".trim($sectionadd)."'  ";
	$objQuery = mysqli_query($objCon,$strSQL);
     $objResult = mysqli_fetch_array($objQuery);

     //$_POST["txtsubject"]=$_POST["subjectadd"];
     //$_POST["txtsection"]=$_POST["sectionadd"];
     $tbody = "";
	if($objResult)
	{
          $alert = 0;
		 
	}	
	else
	{
          $alert = 1;
          $query = "INSERT IGNORE INTO student (stu_id,stu_name)  VALUES ('".$stuidadd."','".$stunameadd."') ";  
          mysqli_query($objCon, $query); 

          $strSQL5 = "INSERT IGNORE INTO listofname (stu_id,stu_name,sub_name,section,num_group,msg_status,state_time,state_date)  VALUES 
          ('".$stuidadd."','".$stunameadd."','".$subjectadd."','".$sectionadd."','".$stugroupadd."',1,'".$current_time."','".$current_date."') " ;
          mysqli_query($objCon, $strSQL5);

          $strSQL = "SELECT stu_name,stu_id,num_group FROM listofname WHERE sub_name = '".$subjectadd."'
                    and section = '".$sectionadd."' ";
          $objQueryinsert = mysqli_query($objCon,$strSQL);
          
          mysqli_close($objCon);

          while($row = mysqli_fetch_array($objQueryinsert) )  
          {  
                            
          $tbody .= '<tr id="delete'.$row['stu_id'].'">'; 
          $tbody .= '<td id="add" ><center>'.$row['stu_id'].'</center></td>';  
          $tbody .= '<td id="add">'.$row["stu_name"].'</td>';  
          $tbody .= '<td id="add"> <center>'.$row['num_group'].'</center></td>'; 
          $tbody .= '<td id="add" align="center">';
          $tbody .= '<button onclick="deleteAjax('.$row['stu_id'].')"  class="btn btn-sm btn-danger "><i style="font-size:14px" class="fa">&#xf014;</i></button>';
          $tbody .= '</td>';
          $tbody .= '</tr>';  
                   
          }  
  }
          $data['tbody'] = $tbody;
          $data['alert'] = $alert;
          echo Json_encode($data);

     ?>

