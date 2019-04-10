<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sign Up!</title>
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
		#Tinders {
			position: absolute;
			font-size: 52px;
			left: 650px;
			top: 200px;
			color: white;
			font-family: raleway;
			font-weight: bold;
		}
		#newUser {
			position: absolute;
			left: 300px;
			top: 400px;
			width: 425px;
			height: 25px;
			background-color: gray;
			border: none;
		}
		#newUser::placeholder{
			font-family: raleway;
			font-weight: bold;
			color: white;
		}
		#newUserTitle {
			position: absolute;
			left: 300px;
			top: 320px;
			font-family: raleway;
			font-size: 30px;
			font-weight: bold;
			color: white;
		}
		#newPassTitle {
			position: absolute;
			left: 900px;
			top: 320px;
			font-family: raleway;
			font-size: 30px;
			font-weight: bold;
			color: white;
		}
		#newPass {
			position: absolute;
			left: 900px;
			top: 400px;
			width: 425px;
			height: 25px;
			background-color: gray;
			border: none;
		}
		#newPass::placeholder{
			font-family: raleway;
			font-weight: bold;
			color: white;
		}
		#confPassTitle {
			position: absolute;
			left: 300px;
			top: 440px;
			font-family: raleway;
			font-size: 30px;
			font-weight: bold;
			color: white;
		}
		#confirmPass {
			position: absolute;
			left: 300px;
			top: 520px;
			width: 425px;
			height: 25px;
			background-color: gray;
			border: none;
		}
		#confirmPass::placeholder{
			font-family: raleway;
			font-weight: bold;
			color: white;
		}
		#login {
			position: absolute;
			font-size: 20px;
			left: 1400px;
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
		#signUpButton {
			height: 50px;
			width: 175px;
			background-color: grey;
			position: absolute;
			top: 500px;
			left: 900px;
			border-radius: 10%;
			font-family: raleway;
			font-weight: bold;
			color: white;
			font-size: 30px;
		}
	</style>
</head>

<body>
<p id = "TindersTitle"> TINDERS </p>
<a href = "Index.php"><p id = "login"> LOG IN </p> </a>
<p id = "Tinders"> TINDERS </p>
<p id = "newUserTitle"> new username: </p>
<p id = "newPassTitle"> password: </p>
<p id = "confPassTitle"> confirm password: </p>
<img src = "logo.png" id = "logo"> </img>
	
<form action = "signup.php" method="post">
	<input type = "text" id ="newUser" name = "newUser" placeholder = " USERNAME" required>
	<input type = "password" id = "newPass" name = "newPass" placeholder = " PASSWORD" required>
	<input type = "password" id = "confirmPass" name = "confirmPass" placeholder = " CONFIRM PASSWORD" required>
<p><button type="submit" id = "signUpButton" value = "signUp">sign up</button></p>
</form>
</body>
</html>
