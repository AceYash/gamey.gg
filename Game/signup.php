<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Join Gamey</title>
	<link rel="stylesheet" type="text/css" href="./style.css">	
</head>
<body>
<div class="signup">
<div class="img">
<center><img draggable="false" src="./images/blank.png"></center>
</div>
<form method="POST" action="./includes/signup.php">
	<span><?php 
	if (isset($_GET['error'])) {
		if ($_GET['error'] == "fieldsempty") {
			echo "<center><p class='error'>**Fill In all the Fields</p></center>";
		}
	}
?></span>	
	<center><input type="text" name="f_name" placeholder="First Name" id="fname"></center>	
	<center><input type="text" name="l_name" placeholder="Last Name" id="lname"></center>
	<span><?php 
	if (isset($_GET['error'])) {
		if ($_GET['error'] == "usernametaken") {
			echo "<center><p class='error'>**Username already taken</p></center>";
		}
	}
?></span>
	<center><input type="text" name="u_name" placeholder="Username" id="uname"></center>
		<span><?php 
	if (isset($_GET['error'])) {
		if ($_GET['error'] == "userexists") {
			echo "<center><p class='error'>**This User already exists</p><span>Try<a href='./index.php'> Login.</a></span></center>";
		}
	}
?></span>
	<center><input type="email" name="email" placeholder="Enter Your E-mail id" id="mail"></center>
	<center><input type="password" name="password" placeholder="Enter a password" id="pass"></center>
	<center><input type="submit" name="sign" value="Sign Up"></center>
</form>
</div>
</body>
</html>