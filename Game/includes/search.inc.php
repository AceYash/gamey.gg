<?php
include './session.inc.php';
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
	<title>Search Results</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body class="welcome"> 
<div class="menu" style="height: 100px; width: 100%;">
	<div class="slogo">
		<img src="../Images/slogo.png" style="cursor: pointer;" onclick=window.location.href='../welcome.php' draggable="false">
	</div>
	<div class="search">
	<form action="search.inc.php" method="POST">
		<input type="text" name="searchstring" value="<?php $searchstring = $_POST['searchstring']; echo $searchstring;?>" placeholder="Search For Friends"></input>
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
		echo  "<li><a href='../profile.php?user=$username'>".$_SESSION['fname']."</a></li>";	
		echo  "<li><a href='../welcome.php'>HOME</a></li>";	
		echo  "<li><a href='#'><i class='fa fa-user-plus' aria-hidden='true'></i></a></li>";
		echo  "<li><a href='#'><i class='fa fa-heart-o' aria-hidden='true'></i></a></li>";
		echo  "<li><a href='#'><i class='fa fa-cog' aria-hidden='true'></i></a></li>";
		echo "</center></ul>";
		}	
		?>
	</div>
	</div>

<?php
if (isset($_POST['search'])) {
	if (isset($_SESSION['userName']) || isset($_SESSION['email'])) {	
	include('connect.inc.php');
	$conn = dbcon();
	$searchstring = mysqli_real_escape_string($conn, $_POST['searchstring']);
	if (!empty($searchstring)) {
	$sql = "SELECT * FROM signup WHERE fname LIKE '%$searchstring%' OR lname LIKE '%$searchstring%' OR uname LIKE '%$searchstring%' OR email LIKE '%$searchstring%'";
	$qr = mysqli_query($conn, $sql);
	$num = mysqli_num_rows($qr);
	if ($num > 0) {
		if ($num == 1) {
		echo "<center><div class='searchresults'>"."<h2 class='header'>There is ".$num." result for ".'"'.$searchstring.'"'."</h2></div></center>";
		while ($array = mysqli_fetch_assoc($qr)) {
		echo "<div class='searchresults'>";
		$username = $array['uname'];
		$followername = $_SESSION['userName'];
		$sqlq = "SELECT * FROM follow WHERE uname='$username' AND followername='$followername'";
		$qra = mysqli_query($conn, $sqlq);
		$numq = mysqli_num_rows($qra);
		$_SESSION['searchres'] = "<div class='subp'><div class='margin-top'><a href='../profile.php?user=$array[uname]'>".$array['fname']." ".$array['lname']."</a></div>";
		echo $_SESSION['searchres'];
		if ($numq >= 1) {
			echo "<form action='follow.inc.php?user=$username' method='POST'>";
			echo "<center><button type='submit' name='unfollow' class='btn'>Following</button></center></div>";
			echo "</div>";	
		}
		else {
		echo "<form action='follow.inc.php?user=$username' method='POST'>";
		echo "<center><button type='submit' name='follow' class='btn'>Follow</button></center></div>";
		echo "</div>";
		}
		}
		}
		if ($num > 1) {
		echo "<center><div class='searchresults'>"."<h2 class='header'>There are ".$num." results for ".'"'.$searchstring.'"'."</h2></div></center>";
		while ($array = mysqli_fetch_assoc($qr)) {
		echo "<div class='searchresults'>";
		$username = $array['uname'];
		$followername = $_SESSION['userName'];
		$sqlq = "SELECT * FROM follow WHERE uname='$username' AND followername='$followername'";
		$qra = mysqli_query($conn, $sqlq);
		$numq = mysqli_num_rows($qra);
		$_SESSION['searchres'] ="<div class='subp'><div class='margin-top'><a href='../profile.php?user=$array[uname]'>".$array['fname']." ".$array['lname']."</a></div>";
		echo $_SESSION['searchres'];
		if ($numq >= 1) {
		echo "<form action='follow.inc.php?user=$username' method='POST'>";
		echo "<center><button type='submit' name='unfollow' class='btn'>Following</button></center></div>";
		echo "</form>";
		echo "</div>";	
		}
		else {
		echo "<form action='follow.inc.php?user=$username' method='POST'>";
		echo "<center><button type='submit' name='follow' class='btn'>Follow</button></center></div>";
		echo "</form>";
		echo "</div>";
		}
		}
	}
	}
	else {
		echo "<center><p class='error'>There Are No Results For"." "."'".$searchstring."'"."</p></center>";
	}
	}	
	else {
		header("location: ../welcome.php?error=emptysearch");
		exit();
	}
}
else {
 echo "<center><p class='error'>You need to login before using the search bar</p>";
 echo "<button class='btn' onclick=window.location.href='../index.php'>Login</button></center>";
 die();
}
}
else {
	header("location: ../welcome.php");
	exit();
}
?>
</body>
</html>