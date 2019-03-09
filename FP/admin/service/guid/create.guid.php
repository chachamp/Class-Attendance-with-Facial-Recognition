<?php

function GUID()
	{
//Function check value exists 
if (function_exists('com_create_guid') === true)
{
return trim(com_create_guid(), '{}');
}
//Config Value ('count num',range num)
return sprintf('%04X', mt_rand(0, 65535));
}
//ประกาศค่าตัวแปร Function
$GUID = GUID();
$_SESSION["GUID"] = $GUID;

?>