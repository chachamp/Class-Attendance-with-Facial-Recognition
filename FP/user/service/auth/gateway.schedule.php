<?php


	if(trim($_SESSION['txtcodeclass'] == ""))
	{
		echo "<body onload=\"window.alert('Please Input Your Code');return history.go(-1)\">";	
		exit();
	}
?>