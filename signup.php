<?php
//SIGN UP PAGE PHP CODE; NOT YET FINAL
session_start();
//credentials and stuff
$host = "localhost";
$user = "root";
$pass = "";
$db ="tinders";

// initialize
$uname = filter_input(INPUT_POST, 'newUsername');
$pword = filter_input(INPUT_POST, 'newPass');
$cPass = filter_input(INPUT_POST, 'confPass');

// connect to the database
$conn = new mysqli($host,$user,$pass,$db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//CHECK IF ANY ERRORS
if (isset($_POST['registerUser'])) {
	if (empty($uname)) { 
	  echo "<script type='text/javascript'>
		window.confirm('Username is Required');
		window.location.href = 'Sign Up.php';
		</script>
	";
	}
	else if (empty($pword)) { 
	  echo "<script type='text/javascript'>
		window.confirm('Password is Required');
		window.location.href = 'Sign Up.php';
		</script>
	";
  }
	else if (empty($cPass)) { 
	  echo "<script type='text/javascript'>
		window.confirm('Please Confirm Your Password');
		window.location.href = 'Sign Up.php';
		</script>
	";
  }
	else if ($pword != $cPass) {
	 echo "<script type='text/javascript'>
		window.confirm('Passwords Do Not Match');
		window.location.href = 'Sign Up.php';
		</script>
	";
	}
	else {
	 echo "<script type='text/javascript'>
		window.confirm('ok cool ur input's good n all);
		window.location.href = 'Home.php';
		</script>
	";
	}
  
  $user_check_query = "SELECT * FROM login WHERE username='$uname' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($pword);//encrypt the password before saving in the database

  	//$query = "INSERT INTO users (username, email, password) 
  			  //VALUES('$uname', ''$pword')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $uname;
  	$_SESSION['success'] = "You are now logged in";
  	echo "<script type='text/javascript'>
		window.confirm('ok cool ur input's good n all);
		window.location.href = 'Home.php';
		</script>";
  }
}
?>