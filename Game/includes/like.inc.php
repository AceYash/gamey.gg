<?php 
include('connect.inc.php');
include 'session.inc.php';
?>
<?php
if (isset($_GET['postid'])) {
	$conn = dbcon();
	$postid = $_GET['postid'];
	$userid = $_GET['id'];
	$username = $_GET['user'];
	$ln = $_GET['ln'];
	$sqlcheck = "SELECT user_id FROM post_likes WHERE post_id='$postid' AND user_id='$userid'";
	$sqlcheckr = mysqli_query($conn, $sqlcheck); 
	if (!$sqlcheckr) {
		$sql = "UPDATE posts SET likes=likes+1 WHERE id='$postid'";
		$sqlr = mysqli_query($conn, $sql);
		$sqll = "INSERT INTO post_likes (post_id, user_id) VALUES ('$postid', '$userid')";
		$sqllr = mysqli_query($conn, $sqll);
		if ($sqllr) {
			header("location: ../profile.php?user=$username");
		}
	}
	else {
		header("location: ../profile.php?user=$username&alreadyliked");
	}	
}
else {
	header("location: ../profile.php?user=$username");
	header("location: ../index.php");	
}

?>