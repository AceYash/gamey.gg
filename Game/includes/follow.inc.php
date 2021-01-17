<?php 
include('connect.inc.php');
include 'session.inc.php';
?>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script>
	//For Avoiding Resubmission of form
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</head>
<?php
$conn = dbcon();
$followername = $_SESSION['userName'];
$username = $_GET['user'];
if (isset($_SESSION['userName']) || isset($_SESSION['email'])) {
	if (isset($_POST['follow'])) {	
	$sql = "INSERT INTO follow (uname, followername) VALUES('$username','$followername')";
		if ($followername == "verified") {
			$sqla = "UPDATE signup set verified='1' WHERE uname = '$username'";
			mysqli_query($conn, $sqla);
		}
		if (mysqli_query($conn, $sql)) {
			header("location: ../profile.php?follow=success&user=$username");
			exit();
		}
		else {
			header("location: ../profile.php?follow=failed&user=$username");
			exit();	
		}
	}
	elseif (isset($_POST['unfollow'])) {
	 	$sqlu = "DELETE FROM follow WHERE uname='$username' AND followername='$followername'";
		if (mysqli_query($conn, $sqlu)) {
			header("location: ../profile.php?follow=unfollow&user=$username");
			exit();
		}
		else {
			header("location: ../profile.php?follow=following&user=$username");
			exit();	
			}
	}
	} 
else {
	echo "<center><p class='error'>You Need To login to follow someone!</p></center>";
	echo "<center><button onclick=window.location.href='../index.php'>Login</button></center>";
	die();
}
?>