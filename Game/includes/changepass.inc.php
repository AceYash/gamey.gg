<?php
include './session.inc.php';
?>
<?php
 if (isset($_POST['changepass'])) {
 	if (isset($_SESSION['userName']) || isset($_SESSION['email'])) {
 		include('connect.inc.php');
		$conn=dbcon();
		$username = $_SESSION['userName'];
 		$oldpass = $_POST['oldpass'];
 		$newpass = $_POST['newpass'];
 		$rptpass = $_POST['rptpass'];
 		$sqlm = "select password from signup where uname='$username'";
		$sr = mysqli_query($conn, $sqlm);
		$row = mysqli_fetch_assoc($sr);	
		$pwdcheck = password_verify($oldpass, $row['password']);
 		if (empty($oldpass) || empty($newpass) || empty($rptpass)) {
 			header("Location: ../changepass.php?error=emptyfields");
 			exit();
 		}
 		else if ($newpass !== $rptpass) {
 			header("Location: ../changepass.php?error=passnotmatch");
 			exit();	
 		}
 		else if ($pwdcheck == false) {
 			header("Location: ../changepass.php?error=wrong_oldpass");
 			exit();	
 		}
 		else if ($pwdcheck == true) {
 			$rehash = password_hash($newpass, PASSWORD_DEFAULT);
 			$sql="update signup set password='$rehash' where uname='$username'";
 			$qr = mysqli_query($conn, $sql);
 			if ($qr) {
 				header("Location: ../changepass.php?change=success");
 				exit();
 			}
 			else {
 				header("Location: ../changepass.php?change=Failed");
 				exit();	
 			}
 		}
 	} 
 	else {
 		header("location: ../index.php");
 	}
 }else {
 	header("Location: ../changepass.php");
 	exit();
 }
?>