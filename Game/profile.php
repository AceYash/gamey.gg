<?php 
include('./includes/connect.inc.php');
include './includes/session.inc.php';
?>
<?php
$username = $_GET['user'];
$conn = dbcon();
$sql = "SELECT * FROM signup WHERE uname='$username'";
$result = mysqli_query($conn, $sql);
$array = mysqli_fetch_assoc($result);
$firstname = $array['fname'];
$lastname = $array['lname'];
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $username."'s Profile";?></title>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<script>
	//For Avoiding Resubmission of form
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
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
<div class="profile-head">
<img style='float: left;'src="./Images/blank.png">
	<?php
	$username =	$_GET['user'];
	$sqla = "SELECT verified FROM signup WHERE uname = '$username'";
	$resa = mysqli_query($conn, $sqla);
	$resq = mysqli_fetch_assoc($resa);
	if ($resq['verified'] == 1) {
		echo "<p class='dn' style='margin-left: 50px; line-height: 250px;'>".$firstname." ".$lastname."<i class='fa fa-check' aria-hidden='true'></i>"."</p>";
	}
	else {
	echo "<p class='dn' style='margin-left: 50px; line-height: 250px;'>".$firstname." ".$lastname."</p>";
	}
	?>
	<form action="./includes/follow.inc.php?<?php $username = $_GET['user']; echo"user=$username"?>" method="POST">
	<?php
		$username = $_GET['user'];
		$followername = $_SESSION['userName'];
		$sqlm = "SELECT * FROM follow WHERE uname='$username' AND followername='$followername'";
		$qr = mysqli_query($conn, $sqlm);
		$num = mysqli_num_rows($qr);
		if (isset($_SESSION['userName']) || isset($_SESSION['email'])) {
			if ($username !== $followername) {
			if ($num >= 1) {
				echo "<button style='float: right;' type='submit' name='unfollow' class='btn'>FOLLOWING</button>";
			}
			elseif (isset($_GET['follow'])) {
				if ($_GET['follow'] == "success") {
				echo "<button type='submit' style='float: right;' name='unfollow' class='btn'>FOLLOWING</button>";
				}
				if ($_GET['follow'] == "unfollow") {
					echo "<button type='submit'style='float: right;' name='follow' class='btn'>FOLLOW</button>";
				}
				if ($_GET['follow'] == "following") {
					echo "<button type='submit' style='float: right;'name='unfollow' class='btn'>FOLLOWING</button>";
				}
				if ($_GET['follow'] == "failed") {
				echo "<button type='submit' style='float: right;' name='follow' class='btn'>FOLLOW</button>";		
				}
			}
			else {
			echo "<button type='submit' name='follow' style='float: right;' class='btn'>FOLLOW</button>";
			}
		}
		}
	else {
		header("location: ./index.php");
		}
		?>
	</form>
	<?php
	if (isset($_SESSION['userName']) || isset($_SESSION['email'])) {	
	$username =	$_GET['user']; 
	$conn = dbcon();
	$sql = "SELECT * FROM follow WHERE followername = '$username'";
	$sqla = "SELECT * FROM follow WHERE uname = '$username'";
	$res = mysqli_query($conn, $sql);
	$resa = mysqli_query($conn, $sqla);
	$nfollowing = mysqli_num_rows($res);
	$nfollowers = mysqli_num_rows($resa);
	echo "<div style='height: 30px; float: left; width: 100px;'><a href='./following.php?user=$username' style='float: left; margin: 10px 0 5px 20px;' class='formallink'>Following<br/><center>$nfollowing</center></a></div>";
	echo "<div style='height: 30px; float: left; width: 100px;'><a href='./followers.php?user=$username' style='float: left; margin: 10px 0px 5px 20px;' class='formallink'>Followers <br/><center>$nfollowers</center></a></div>";
	echo "<div style='height: 30px; float: left; width: 100px;'><a href='./profile.php?user=$username' style='float: left; margin: 10px 0px 5px 20px;' class='formallink'>Posts<br/></a></div>";
	echo "<div style='height: 30px; float: left; width: 100px;'><a href='./followers.php?user=$username' style='float: left; margin: 10px 0px 5px 0px;' class='formallink'>Pictures<br/></a></div>";		
}	
?>
</div>
<div class="profile-body">
<?php 
$username =	$_GET['user'];
if ($_SESSION['userName']==$username) {
	$username=$_GET['user'];
echo "<form action='./includes/post.inc.php?user=$username' method='POST'>
	<center><textarea rows='8' class='textarea' name='postbody' cols='100'></textarea></center><br/>
	<center><button type='submit' class='btn' name='post'>POST</button></center>
	</form>";
if (isset($_GET['error'])) {
	if ($_GET['error'] == "invalidlength") {
	echo "<p class='error'>"."You Can't Post More Than 160 characters or less than 1 character"."</p>";
	}
	if ($_GET['error'] == 'swr') {
	echo "<p class='error'>"."Hmm! Something Went Wrong. Try Again"."</p>";
	}
	}	
$sqlid = "SELECT id FROM signup WHERE uname='$username'";
$runid = mysqli_query($conn, $sqlid);
$arrayid = mysqli_fetch_assoc($runid);
$userid =  $arrayid['id'];
$sql = "SELECT * FROM posts WHERE user_id='$userid' ORDER BY posted_at DESC";
$sqlr = mysqli_query($conn, $sql);
$numrows = mysqli_num_rows($sqlr);
if ($numrows <= 0) {
	echo "No Posts Yet!";
}
else {
	while ($arraypost = mysqli_fetch_assoc($sqlr)) {
		$post[] = $arraypost;
	}
	foreach ($post as $key) {
	echo "<div class='posts'>
	<div class='postdetails'>
	<b style='font-family: sans-serif; margin:10px; color:#202225; font-size: 15px;'>
	Posted By: </b><a href='./profile.php?user=$username' class='formallink'>".$username."</a><p style='margin:10px; color: grey;'>At: $key[posted_at]</p><br/></div><div class='postbody'><p>".htmlspecialchars($key['body'])."</p><br/><form action='./includes/like.inc.php?user=$username&id=$userid&ln=pro&postid=".$key['id']."' method='POST'>
		<input type='submit' name='like' value='like'>
		</form>
	</div></div><hr/>";
	}
}
}
else {
	$sqlid = "SELECT id FROM signup WHERE uname='$username'";
	$runid = mysqli_query($conn, $sqlid);
	$arrayid = mysqli_fetch_assoc($runid);
	$userid =  $arrayid['id'];
	$sql = "SELECT * FROM posts WHERE user_id='$userid' ORDER BY posted_at DESC";
	$sqlr = mysqli_query($conn, $sql);
	$numrows = mysqli_num_rows($sqlr);
	if ($numrows <= 0) {
		echo "No Posts Yet!";
	}
	else {
		while ($arraypost = mysqli_fetch_assoc($sqlr)) {
			$post[] = $arraypost;
		}
		foreach ($post as $key) {
		echo "<div class='posts'><div class='postdetails'><b style='font-family: sans-serif; margin:10px; color:#202225; font-size: 15px;'>Posted By: </b><a href='./profile.php?user=$username' class='formallink'>".$username."</a><p style='margin:10px; color: grey;'>At: $key[posted_at]</p><br/></div><div class='postbody'><p>".htmlspecialchars($key['body'])."</p><br/>"."</div></div><hr/>";
		}
	}	
}
	/*if (isset($_POST['post'])) {
	$username = $_GET['user'];
	$postbody = $_POST['postbody'];
	$sqlid = "SELECT id FROM signup WHERE uname='$username'";
	$runid = mysqli_query($conn, $sqlid);
	$arrayid = mysqli_fetch_assoc($runid);
	$userid =  $arrayid['id'];
	$date = date("Y-m-d h:i:sa");
	$sqlpost = "INSERT INTO posts(body, posted_at, user_id, likes) VALUES ('$postbody', '$date', $userid, '0')";
	if (strlen($postbody) > 160 || strlen($postbody) < 1) {
		echo "<p class='error'>"."You Can't Post More Than 160 characters or less than 1 character"."</p>";
	}
	else {
		$postrun = mysqli_query($conn, $sqlpost);
		$sql = "SELECT * FROM posts where user_id='$userid'";
		$sqlr = mysqli_query($conn, $sql);
		if ($sqlr) {
		$posts = mysqli_fetch_assoc($sqlr);
		$body = $posts['body'];
		echo $body."<br/>"."<hr>";
		}
	}	
	}*/		
?>

</div>
</body>
</html>