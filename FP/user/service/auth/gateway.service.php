<?php

	if(trim($_SESSION['username_stu'] == ""))
	{
		echo "<body onload=\"window.alert('Please Input Your Code');return history.go(-1)\">";	
		exit();
	}
?>