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
			color: black;
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
		#newUsername {
			position: absolute;
			left: 300px;
			top: 400px;
			width: 425px;
			height: 25px;
			background-color: gray;
			border: none;
		}
		#newUsername::placeholder{
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
		}
		#newPassTitle {
			position: absolute;
			left: 900px;
			top: 320px;
			font-family: raleway;
			font-size: 30px;
			font-weight: bold;
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
		}
		#confPass {
			position: absolute;
			left: 300px;
			top: 520px;
			width: 425px;
			height: 25px;
			background-color: gray;
			border: none;
		}
		#confPass::placeholder{
			font-family: raleway;
			font-weight: bold;
			color: white;
		}
		#login {
			position: absolute;
			font-size: 20px;
			left: 1400px;
			top: 5px;
			color: black;
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
		}
		#signUpButtonText{
			font-family: raleway;
			font-size: 30px;
			position: absolute;
			top: 475px;
			left: 930px;
			font-weight: bold;
		}
	</style>
</head>

<body>
<p id = "TindersTitle"> TINDERS </p>
<a href = "Login.html"><p id = "login"> LOG IN </p> </a>
<p id = "Tinders"> TINDERS </p>
<p id = "newUserTitle"> new username: </p>
<p id = "newPassTitle"> password: </p>
<p id = "confPassTitle"> confirm password: </p>
<img src = "logo.png" id = "logo"> </img>
<form>
<input type = "text" id ="newUsername" name = "newUsername" placeholder = " USERNAME">
<input type = "text" id = "newPass" name = "newPassword" placeholder = " PASSWORD">
<input type = "text" id = "confPass" name = "confirmPassword" placeholder = " CONFIRM PASSWORD">
<img id = "signUpButton"> </img>
<p id = "signUpButtonText"> sign up </p>
</form>
</body>
</html>
