<?php
include './includes/session.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>change password</title>
	<link rel="stylesheet" type="text/css" href="./style.css">	
	<script>
	//For Avoiding Resubmission of form
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</head>
<body class="welcome">
<div class="changepass">
<center><p class="changeanim">Decided To Change Your Password?<br/></p></center>
<form action="./includes/changepass.inc.php" method="POST">
<span>
	<?php 
	if (isset($_GET['error'])) {
		if ($_GET['error'] == "emptyfields") {
			echo "<center><p class='error' style='margin-top: 10px;'>**Fill in all the fields</p></center>";
		}
		elseif ($_GET['error'] == "passnotmatch") {
			echo "<center><p class='error' style='margin-top: 10px;'>**Passwords do not match</p></center>";	
		}
		elseif ($_GET['error'] == "wrong_oldpass") {
			echo "<center><p class='error' style='margin-top: 10px;'>**Wrong Old Password</p></center>";	
		}
	}
	if (isset($_GET['change'])) {
		if ($_GET['change'] == "success") {
			echo "<center><p class='success' style='margin-top: 80px;'>Password Changed Successfully</p></center>";
			echo "<center><a href='./welcome.php'class='formallink'>Click here to go back</p></center>";
			die();

		}
		else if ($_GET['change'] == "Failed") {
			echo "<center><p class='error' style='margin-top: 10px;'>Failed To Change Password</p></center>";
		}
	}
	 ?>
</span>
	<center>
	<input type="password" name="oldpass" placeholder="Old Password"></input><br/>
	<input type="password" name="newpass" placeholder="New Password"></input><br/>
	<input type="password" name="rptpass" placeholder="Repeat Password"></input><br/>
	<BUTTON type="submit" name="changepass">Change Password</BUTTON></center>
</form>
</div>
</body>
</html>