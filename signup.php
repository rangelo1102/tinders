<?php
//SIGN UP PAGE PHP CODE; NOT YET FINAL
//credentials and stuff
//session_start();

//credential to connect to database
$host = "localhost";
$user = "root";
$pass = "";
$db ="tinders";

//collect info from sign up page
$uname = filter_input(INPUT_POST, 'newUser');
$pword = filter_input(INPUT_POST, 'newPass');
$cPass = filter_input(INPUT_POST, 'confirmPass');


// connect to the database
$conn = new mysqli($host,$user,$pass,$db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//CHECK IF ANY ERRORS
if (isset($uname)&&isset($pword)&&isset($cPass)) {
	//check if user of the same name exists
	$getUsedUsername = mysqli_query($conn, "SELECT username AS taken_user FROM login WHERE username = '".$uname."'");
	$getUname = mysqli_fetch_assoc($getUsedUsername);
	$legitTakenUsername = $getUname['taken_user'];

	//check if database has exceeded maximum capacity
	$getNumOfUsers = mysqli_query($conn, "SELECT COUNT(*) AS number_user FROM login");
	$getNum = mysqli_fetch_assoc($getNumOfUsers);
	$legitNum = $getNum['number_user'];

	if ($pword == $cPass AND $legitTakenUsername === null AND $legitNum < 5) {
		//create user
		$pword = md5($pword);
		$query = "INSERT INTO login (username, password) VALUES ('".$_POST["newUser"]."', '".md5($_POST["newPass"])."')";

		//direct user to homepage
		if (mysqli_query($conn, $query)) {
			echo "<script type='text/javascript'>
				window.confirm('Account Sucessfully Created');
				window.location.href = 'Home.php';
				</script>";
		} 
		else {
		    echo "<script type='text/javascript'>
		    	window.confirm('Error Occured: Try to check your credentials.');
		    	window.location.href = 'Home.php';
		    	</script>";
		}
	}
	//reject user if username is taken
	else if ($legitTakenUsername != null) {
			echo "<script type='text/javascript'>
		    	window.confirm('Error Occured: Username is Taken');
		    	window.location.href = 'Sign Up.php';
		    	</script>";
	}
	//reject user if passwords do not match
	else if ($pword != $cPass) {
		echo "<script type='text/javascript'>
		    	window.confirm('Error Occured: Passwords do not Match');
		    	window.location.href = 'Sign Up.php';
		    	</script>";
	}
	//reject user if more than five users exist
	else if ($legitNum == 5) {
		echo "<script type='text/javascript'>
		    	window.confirm('Error Occured: Maximum of Five Users; For security purposes lol');
		    	window.location.href = 'Sign Up.php';
		    	</script>";
	}
}

?>