<?php
if (isset($_POST['sign'])) {
include('connect.inc.php');
$conn=dbcon();
		$firstname = $_POST['f_name'];
		$lastname = $_POST['l_name'];
		$username = $_POST['u_name'];	
		$email = $_POST['email'];
		$password = $_POST['password'];	
		$sqlu = "select uname from signup where uname='$username'";
		$sqlm = "select email from signup where email='$email'"; 
		$resultm = mysqli_query($conn, $sqlm);
		$result = mysqli_query($conn, $sqlu);
		if (empty($firstname) || empty($lastname) || empty($username) || empty($email) ||empty($password)) {
			header("location: ../signup.php?error=fieldsempty");
			exit();
		}
		elseif (mysqli_num_rows($result) > 0) {
			header("location: ../signup.php?error=usernametaken&f_name=".$firstname."&l_name=".$lastname."&email=".$email);
			exit();
		}
		elseif (mysqli_num_rows($resultm) > 0) {
			header("location: ../signup.php?error=userexists&f_name=".$firstname."&l_name=".$lastname."&u_name=".$username);
			exit();
		}
		elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z-0-9]*$/", $username)) {
			header("location: ../signup.php?error=invalidmailoruname&f_name=".$firstname."&l_name=".$lastname);
			exit();
		}
		else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header("location: ../signup.php?error=Invalid_mail&f_name=".$firstname."&l_name=".$lastname."&u_name=".$username);
			exit();
		}
		else if (!preg_match("/^[a-zA-Z-0-9]*$/", $username)) {
			header("location: ../signup.php?error=Invalidu_name&f_name=".$firstname."&l_name=".$lastname."&email=".$email);
			exit();
		}
		else {
	$hash = password_hash($password, PASSWORD_DEFAULT);	
	$sql="insert into signup(fname, lname, uname, email, password, verified) values('$firstname', '$lastname', '$username', '$email', '$hash', 0)";
	if(mysqli_query($conn,$sql))
	{
	header("location: ../index.php?signup=success");
	}
	else
	{
		header("location: ../signup.php?signup=Failed");
	}
}
}
else {
	header("location: ../signup.php");
}
?>