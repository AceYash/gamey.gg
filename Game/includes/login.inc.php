<?php
if (isset($_POST['login'])) {
	include('connect.inc.php');
	$conn=dbcon();
	$username = $_POST['username'];	
	$pwd = $_POST['pass'];
	$sql="select * from signup where uname='$username' or email='$username'";
	$result = mysqli_query($conn, $sql);
	if (empty($username) || empty($pwd)) {
		header("location: ../index.php?error=emptyfields&userName=".$username);
		exit();
	}
	else if (mysqli_num_rows($result) <= 0) {
		header("location: ../index.php?error=usernotfound");
		exit();
	}
	else {
		$sqlm = "select password from signup where uname='$username' or email='$username'";
		$sr = mysqli_query($conn, $sqlm);
		$row = mysqli_fetch_assoc($sr);
		$pwdcheck = password_verify($pwd, $row['password']);
		if ($pwdcheck == false) {
			header("location: ../index.php?error=wrongpassword");
			exit();
		}
		else if($pwdcheck == true) {
			session_start();
			$res2 = mysqli_fetch_assoc($result);
			$_SESSION['fname'] = $res2['fname'];
			$_SESSION['lname'] = $res2['lname'];
			$_SESSION['userName'] = $res2['uname'];
			$_SESSION['email'] = $res2['email'];
			header("location: ../welcome.php?userid=".$_SESSION['fname']);
		}
	}
}	
else {
	header("location: ../index.php");
	exit();
}
?>