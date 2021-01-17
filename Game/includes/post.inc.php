<?php 
include('connect.inc.php');
include 'session.inc.php';
?>
<?php
$conn = dbcon();
if (isset($_POST['post'])) {
	$postbody = mysqli_real_escape_string($conn, $_POST['postbody']);
	$username=$_GET['user'];
	$sqlid = "SELECT id FROM signup WHERE uname='$username'";
	$runid = mysqli_query($conn, $sqlid);
	$arrayid = mysqli_fetch_assoc($runid);
	$userid =  $arrayid['id'];
	$currentdate = date("Y-m-d h:i:sa");
	$sqlpost = "INSERT INTO posts (body, posted_at, user_id, likes) VALUES ('$postbody','$currentdate','$userid','0')";
	if (strlen($postbody) > 160 || strlen($postbody) < 1) {
	header("location: ../profile.php?user=$username&error=invalidlength");	
	exit();
	}
	else {
		$postrun = mysqli_query($conn, $sqlpost);
		header("location: ../profile.php?user=$username");
		if (!$postrun) {
		header("location: ../profile.php?user=$username&error=swr");	
		}
	}
}

?>