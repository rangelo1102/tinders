<?php
//SIGN UP PAGE PHP CODE; NOT YET FINAL
//credentials and stuff
//session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db ="tinders";

// initialize
$uname = filter_input(INPUT_POST, 'newUser');
$pword = filter_input(INPUT_POST, 'newPass');
$cPass = filter_input(INPUT_POST, 'confirmPass');

//echo $uname, $pword, $cPass;

// connect to the database
$conn = new mysqli($host,$user,$pass,$db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//CHECK IF ANY ERRORS
if (isset($uname)&&isset($pword)&&isset($cPass)) {
	
	if ($pword == $cPass) {
		//create user
		$pword = md5($pword);
		$query = "INSERT INTO login (username, password) VALUES ('".$_POST["newUser"]."', '".md5($_POST["newPass"])."')";
		//mysqli_query($conn,$query);

		if (mysqli_query($conn, $query)) {
			echo "<script type='text/javascript'>
				window.confirm('Account Sucessfully Created');
				window.location.href = 'Home.php';
				</script>";
		} else {
		    echo "<script type='text/javascript'>
		    	window.confirm('Error Occured: Try check your credentials or try another username');
		    	window.location.href = 'Home.php';
		    	</script>";
		}
	}
}else {
		echo "<script type='text/javascript'>
		window.confirm('Erroe Occured : try again maybe?');
		window.location.href = 'Sign Up.php';
		</script>
	";
	}

?>