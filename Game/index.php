<?php 
include './includes/session.inc.php';
 ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="./style.css">
	<title>Login</title>
<script type="text/javascript" src="./jquery/jquery.js"></script>
<script type="text/javascript">
</script>	
</head>
<body>
<div class="top">
	<div class="logo">
		<img src="./images/logo.png" draggable="false">
		</div>
</div>
<div class="container">
	<div class="imagebox">
		<img src="./images/image_box.jpg" draggable="false">
	</div>
	<div class="loginbox">
		<center><img src="./Images/usericon.gif" draggable="false"></center>
		<form method="POST" action="./includes/login.inc.php">
		<span><?php 
	if (isset($_GET['error'])) {
		if ($_GET['error'] == "emptyfields") {
			echo "<center><p class='error'>**Fill in all the fields</p></center>";
		}
		elseif ($_GET['error'] == "usernotfound") {
			echo "<center><p class='error'>**User Not Found!</p></center>";
		}
		elseif ($_GET['error'] == "wrongpassword") {
			echo "<center><p class='error'>**Incorrect Username or Password</p></center>";
		}
	}
	if (isset($_GET['signup'])) {
		if ($_GET['signup'] == "success") {
			echo "<center><p class='success'>Profile Created. You Just need to sign in</p></center>";
		}
	}
?></span>
			<input type="text" name="username" placeholder="Enter Your Username">
			<input type="password" name="pass" placeholder="Password">
			<p><a href="#">Forget Password</a></p>
			<center><input type="submit" value="Login" name="login"></center>
			<center><input type="button" value="Sign Up" onclick=window.location.href="signup.php"></center>
		</form>
	</div>
</div>
</body>
</html>