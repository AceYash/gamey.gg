<?php
include './includes/session.inc.php';
include './includes/connect.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="./style.css">
	<title><?php echo $_SESSION['fname']."'s".' Followings';?></title>
	<script>
	//For Avoiding Resubmission of form
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
</head>
<body class="welcome">
<?php
if (isset($_SESSION['userName']) || isset($_SESSION['email'])) {
	$conn =dbcon();
	$username = $_SESSION['userName'];
	$sql= "SELECT uname FROM follow WHERE followername='$username'";
	$result = mysqli_query($conn, $sql);
	$num = mysqli_num_rows($result);
	if ($num == 0) {
		echo "<center><p class='error'>Hmm! Looks Like You have your own way</p></center>";
	}
	else if ($num >= 1) {
		while ($array = mysqli_fetch_assoc($result)) {
			$user = $array['uname'];
			echo "<div class='searchresults'>";
			echo "<div class='subp'><div class='margin-top'><a href='./profile.php?user=$array[uname]'>".$array['uname']." "."</a></div>";
			echo "<form action='./includes/follow.inc.php?user=$user' method='POST'>";
			echo "<center><button type='submit' name='unfollow' class='btn'>Following</button></center></div>";
			echo "</div>";
		}
	}
}
else {
	header("location: ./index.php");
}
?>
</body>
</html>