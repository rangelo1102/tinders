<?php
//SIGN UP PAGE PHP CODE; NOT YET FINAL
//credentials and stuff
$host = "localhost";
$user = "root";
$pass = "";
$db ="login";

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
if (isset($_POST['signUpButton'])) {
	session_start();
	$uname = mysql_real_escape_string($_POST['newUser']);
	$pword = mysql_real_escape_string($_POST['newPass']);
	$cPass = mysql_real_escape_string($_POST['confirmPass']);
	
	if ($pword == $cPass) {
		//create user
		$pword = md5($pword);
		$sql = "INSERT INTO login(username, password) VALUES('$uname, $pword')";
		mysqli_query($db, $sql);
		$_SESSION['username'] = $username;
		echo "<script type='text/javascript'>
		window.confirm('u did it');
		window.location.href = 'Home.php';
		</script>
	";
	}
	else {
		echo "<script type='text/javascript'>
		window.confirm('epic funny');
		window.location.href = 'Sign Up.php';
		</script>
	";
	}
	
	
	/*if (empty($uname)) { 
	  echo "<script type='text/javascript'>
		window.confirm('Username is Required');
		window.location.href = 'Sign Up.php';
		</script>
	";

	echo "uname";

	}
	else if (empty($pword)) { 
	  echo "<script type='text/javascript'>
		window.confirm('Password is Required');
		window.location.href = 'Sign Up.php';
		</script>
	";

	echo "pword";

  }
	else if (empty($cPass)) { 
	  echo "<script type='text/javascript'>
		window.confirm('Please Confirm Your Password');
		window.location.href = 'Sign Up.php';
		</script>
	";

	echo "cPass";

  }
	else if ($pword != $cPass) {
	 echo "<script type='text/javascript'>
		window.confirm('Passwords Do Not Match');
		window.location.href = 'Sign Up.php';
		</script>
	";

	echo "pword != cPass";

	}
	else {
	 echo "<script type='text/javascript'>
		window.confirm('ok cool ur input's good n all);
		window.location.href = 'Home.php';
		</script>
	";

	echo "great";

	}
  
  $user_check_query = "SELECT * FROM login WHERE username='$uname' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  echo $result, $user;

  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($pword);//encrypt the password before saving in the database

  	$query = "INSERT INTO login (username password) 
  			  VALUES('$uname', ''$pword')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $uname;
  	$_SESSION['success'] = "You are now logged in";
  	echo "<script type='text/javascript'>
		window.confirm('ok cool ur input's good n all);
		window.location.href = 'Home.php';
		</script>";
  }
  */
}
?>