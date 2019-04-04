<?php
//credentials and stuff
$host = "localhost";
$user = "root";
$pass = "";
$db ="tinders";

//initalizing or getting the values 
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

//connecting to db
$conn = new mysqli($host,$user,$pass,$db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//(Queeer)y
$query = "SELECT username, password FROM login";
$result = $conn->query($query);
// or die ("failed to query database ".mysql_error());

//check if correct password
$row = mysqli_fetch_array($result);

if($row["username"]== $username && $row["password"]== $password){
	header('Location: Home.html');
}else{
	echo "<script type='text/javascript'>
	alert('Login Failed. Please Check Your Goddamn Password');
	</script>
	";

}

?>