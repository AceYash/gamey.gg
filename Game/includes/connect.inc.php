<?php
function dbcon()
{
	$conn=mysqli_connect('localhost','root','','user');
	if(!$conn)
	{
		die('connection error'.mysqli_error());
	}
return $conn;
}
?>