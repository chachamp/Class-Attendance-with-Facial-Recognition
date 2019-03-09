<?php

if(trim($_SESSION['username_tea']) == "")
	{
		echo "<body onload=\"window.alert('Please Login!');return history.go(-1)\">";	
		exit();
    }
?>