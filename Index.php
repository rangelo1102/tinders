<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
	<link rel = "icon"
	type = "image/png"
	href = "icon.png">
	
	<style>
		body {
			background-color: dimgray;
		}
		#TindersTitle {
			position: absolute;
			font-size: 20px;
			left: 30px;
			top: 5px;
			color: white;
			font-family: raleway;
			font-weight: bold;
		}
		
		#logo {
			position: absolute;
			left: 720px;
			top: 175px;
			width: 75px;
			height: 75px;
		}
		#Tinders {
			position: absolute;
			font-size: 52px;
			left: 650px;
			top: 200px;
			color: white;
			font-family: raleway;
			font-weight: bold;
		}
		#username input [type='text']{
			width: 100%;
			margin: 8px 0;
		}
		#username {
			position: absolute;
			left: 550px;
			top: 340px;
			width: 425px;
			height: 25px;
			background-color: gray;
			border: none;
		}
		#username::placeholder{
			font-family: raleway;
			font-weight: bold;
			color: white;
		}
		#password input [type='text']{
			width: 100%;
			margin: 8px 0;
		}
		#password {
			position: absolute;
			left: 550px;
			top: 410px;
			width: 425px;
			height: 25px;
			background-color: gray;
			border: none;
		}
		#password::placeholder{
			font-family: raleway;
			font-weight: bold;
			color: white;
		}
		#loginText {
			font-family: raleway;
			font-size: 52px;
			position: absolute;
			left: 690px;
			top: 425px;
			font-weight: bold;
			color: antiquewhite;
		}
		#loginButton{
			background-color: grey;
			font-family: raleway;
			height: 80px;
			width: 200px;
			font-weight: bold;
			font-size: 50px;
			position: absolute;
			border-radius: 20px;
			left: 660px;
			top: 450px;
		}
		a:visited {
			color: antiquewhite;
		}
		#signUp {
			position: absolute;
			font-size: 20px;
			left: 1400px;
			top: 5px;
			color: white;
			font-family: raleway;
			font-weight: bold;			
		}
	</style>
</head>
	
<body>
	<a href = "index.php"><p id = "TindersTitle"> TINDERS </p></a>
	<p id = "Tinders"> TINDERS</p>
	<a href = "Sign Up.php"><p id = "signUp"> SIGN UP</p></a>
	<img src = "logo.png" id = "logo"></img>
	
	<form method = "POST" action="login.php">
		<input type="text" id = "username" name="username" placeholder="  USERNAME" required>
		<input type="password" id = "password" name="password" placeholder="  PASSWORD" required>
		<p><button type="submit"  id = "loginButton"> Log-in </button></p>
</form>
	
	
</body>
</html>
