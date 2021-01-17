<?php
include './includes/session.inc.php';
include './includes/connect.inc.php';
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="./style.css">
	<title><?php echo $_SESSION['fname']."'s".' Followers';?></title>
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
	$username = $_GET['user'];
	$sql= "SELECT followername FROM follow WHERE uname='$username'";
	$result = mysqli_query($conn, $sql);
	$num = mysqli_num_rows($result);
	if ($num == 0) {
		echo "<center><p class='error'>Hmm! Looks Like You have your own way</p></center>";
	}
	else if ($num >= 1) {
		while ($array = mysqli_fetch_assoc($result)) {
			$sqlq= "SELECT * FROM follow WHERE followername='$username' AND uname='$array[followername]'";
			$qr=mysqli_query($conn, $sqlq);
			$numq = mysqli_num_rows($qr);
			echo "<div class='searchresults'>";
			echo "<div class='subp'><div class='margin-top'><a href='./profile.php?user=$array[followername]'>".$array['followername']." "."</a></div>";
			if ($numq >= 1) {	
			echo "<form action='./includes/follow.inc.php?user=$array[followername]' method='POST'>";
			echo "<center><button type='submit' name='unfollow' class='btn'>Following</button></center></div>";
			echo "</div>";	
			}
			else if($numq == 0) {
			echo "<form action='./includes/follow.inc.php?user=$array[followername]' method='POST'>";
			echo "<center><button type='submit' name='follow' class='btn'>Follow</button></center></div>";
			echo "</div>";
			}
		}
	}
}
else {
	header("location: ./index.php");
}
?>
</body>
</html>