<?php
session_start();
//credentials and stuff
$host = "localhost";
$user = "root";
$pass = "";
$db ="tinders";

// initialize
$uname = '';
$pword = '';
$cPass = '';


// connect to the database
$conn = new mysqli($host,$user,$pass,$db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$uname = filter_input(INPUT_POST, 'newUser');
$pword = filter_input(INPUT_POST, 'newPass');
$cPass = filter_input(INPUT_POST, 'confirmPass');;
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
  
  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array

	/*
  $user_check_query = "SELECT * FROM users WHERE username='$uname'";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
	}
  }
 */
}
?>