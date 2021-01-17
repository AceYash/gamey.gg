<?php
include './includes/session.inc.php';
include './includes/connect.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script>
	//For Avoiding Resubmission of form
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
	<title>Welcome To gamey</title>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="./style.css">
</head>
<body class="welcome">
<div class="menu">
	<div class="slogo">
		<img src="./Images/slogo.png" style="cursor: pointer;" onclick=window.location.href='./welcome.php' draggable="false">
	</div>
	<div class="search">
	<form action="./includes/search.inc.php" method="POST">
		<input type="text" name="searchstring" placeholder="Search For Friends"></input>
		<button type="submit" name="search"><i class="fa fa-search" aria-hidden="true"></i></button>
		<span>
		<?php 
			if (isset($_GET['error'])) {
				if ($_GET['error'] == "emptysearch") {
					echo "<p class='error' style='font-size: 14px;margin-top:5px; margin-left:20px;'>**Please Enter keywords to search</p>";
				}
			}
		?>
		</span>
	</form>			
	</div>
	<div class="options">
		<?php
		if (isset($_SESSION['userName']) || isset($_SESSION['email'])) {	
			$username =	$_SESSION['userName'];
		echo "<ul><center>";	
		echo  "<li><a href='./profile.php?user=$username'>".$_SESSION['fname']."</a></li>";	
		echo  "<li><a href='./welcome.php'>HOME</a></li>";	
		echo  "<li><a href='#'><i class='fa fa-user-plus' aria-hidden='true'></i></a></li>";
		echo  "<li><a href='#'><i class='fa fa-heart-o' aria-hidden='true'></i></a></li>";
		echo  "<li><a href='#'><i class='fa fa-cog' aria-hidden='true'></i></a></li>";
		echo "</center></ul>";
		}	
		?>
	</div>
</div>
<div class="sidebar1">
<center><img src="./Images/blank.png"></center>
<?php
	if (isset($_SESSION['userName']) || isset($_SESSION['email'])) {	
	$username =	$_SESSION['userName'];
	$firstname = $_SESSION['fname']; 
	$conn = dbcon();
	$sql = "SELECT * FROM follow WHERE followername = '$username'";
	$sqla = "SELECT * FROM follow WHERE uname = '$username'";
	$sqlu = "SELECT verified FROM signup WHERE uname = '$username'";
	$resu = mysqli_query($conn, $sqlu);
	$res = mysqli_query($conn, $sql);
	$resa = mysqli_query($conn, $sqla);
	$resq = mysqli_fetch_assoc($resu);
	$nfollowing = mysqli_num_rows($res);
	$nfollowers = mysqli_num_rows($resa);
	if($resq['verified'] == 1) { 
	echo  "<center><b><a class='dn' href='./profile.php?user=$username'>".$firstname." ".$_SESSION['lname']."<i class='fa fa-check' aria-hidden='true'></i>"."</center></a></b>";
	}
	else {
		echo  "<center><b><a class='dn' href='./profile.php?user=$username'>".$firstname." ".$_SESSION['lname']."</center></a></b>";
	}
	echo "<div style='hieght: 30px; float: left; width: 100px;'><a href='./following.php?user=$username' style='float: left; margin: 10px 0 5px 20px;' class='formallink'>Following<br/><center>$nfollowing</center></a></div>";
	echo "<div style='hieght: 30px; float: right; width: 100px;'><a href='./followers.php?user=$username' style='float: right; margin: 10px 0px 5px 10px;' class='formallink'>Followers <br/><center>$nfollowers</center></a></div>";
	echo "<div style='clear: both;'><center><a href='./changepass.php?user=$firstname'class='formallink'>Change Password</a></center></div>";		
}	
?>	
</div>
<div class="sidebar2">
<?php  
if (isset($_SESSION['userName']) || isset($_SESSION['email'])) {
	echo "WELCOME"." "."<b>".$_SESSION['userName']."</b>";

	echo "<br/>You Are Logged In";
	echo"<br/><form method='POST' action='./includes/logout.inc.php'>
		 Want to logut?<button name='logout'>LOGOUT</button>
		</form>";
}
else {
	header("location: ./index.php");
}
?>
<p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p>
<p>abcdefght</p>

<p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p>
<p>abcdefght</p>
<p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p>
<p>abcdefght</p>
<p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p>
<p>abcdefght</p>
<p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p>
<p>abcdefght</p>
<p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p>
<p>abcdefght</p>
<p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p><p>abcdefght</p>
<p>abcdefght</p>
</div>
</body>
</html>