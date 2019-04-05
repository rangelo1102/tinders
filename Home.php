<!DOCTYPE html>
<?php
session_start();
if ( isset( $_SESSION['user_id'] ) ) {
} else {
    header("Location: index.php");
}
?>
<html>
<head>
<meta charset="utf-8">
<title>Tinders</title>
	<link rel = "icon"
	type = "image/png"
	href = "icon.png">
	<style>
	#TindersTitle {
			position: absolute;
			font-size: 20px;
			font-family: raleway;
			font-weight: bold;
			left: 20px;
			top: 20px;
			text-decoration: none;
		}
	#RRestock {
			font-size: 20px;
			position: absolute;
			top: 25px;
			left: 550px;
			text-decoration: none;
			font-family: raleway;
			font-weight: bold;
		}
		a:visited {
			color: black;
		}
		a:link {
			color: black;
		}
	#RChange {
			font-size: 20px;
			position: absolute;
			top: 25px;
			left: 740px;
			text-decoration: none;
			font-family: raleway;
			font-weight: bold;
		}
	#RSell {
			font-size: 20px;
			position: absolute;
			top: 25px;
			left: 950px;
			text-decoration: none;
			font-family: raleway;
			font-weight: bold;
		}
	#RLogout {
			font-size: 20px;
			position: absolute;
			left: 1390px;
			top: 29px;
			text-decoration: none;
			font-family: raleway;
			font-weight: bold;
		}
	#CircleRestock {
			height: 200px;
			width: 200px;
			background-color: dimgray;
			border-radius: 50%;
			position: absolute;
			top: 230px;
			left: 270px;
		}
	#Head {
			position: absolute;
			top: 50px;
			left: 540px;
			font-size: 52px;
			font-family: raleway;
			font-weight: bold;
		}
	
	#CirlceChange {
			height: 200px;
			width: 200px;
			background-color: dimgray;
			border-radius: 50%;
			position: absolute;
			top: 230px;
			left: 670px;
		}
	#CirlceSell {
			height: 200px;
			width: 200px;
			background-color: dimgray;
			border-radius: 50%;
			position: absolute;
			top: 230px;
			left: 1090px;
		}
	#RestockLabel {
			font-size: 52px;
			position: absolute;
			top: 410px;
			left: 255px;
			font-family: raleway;
			font-weight: bold;
			color: #383737;
		}
	#ChangeLabel {
			font-size: 52px;
			position: absolute;
			top: 410px;
			left: 662px;
			font-family: raleway;
			font-weight: bold;
			color: #383737;
		}
	#SellLabel {
			font-size: 52px;
			position: absolute;
			top: 410px;
			left: 1127px;		
			font-family: raleway;
			font-weight: bold;
			color: #383737;
		}
	#RestockDesc {
			text-align: center;
			position: absolute;
			top: 520px;
			left: 225px;
		}
	#ChangeDesc {
			text-align: center;
			position: absolute;
			top: 520px;
			left: 665px;
		}
	#SellDesc {
			text-align: center;
			position: absolute;
			top: 520px;
			left: 1080px;
		}
	#ReportCirc {
			background-color: dimgray;
			height: 75px;
			width: 75px;
			position: absolute;
			border-radius: 50%;
			top: 650px;
			left: 590px;
		}
	#ReportLabel {
			font-size: 52px;
			position: absolute;
			top: 595px;
			left: 680px;
			font-family: raleway;
			font-weight: bold;
			color: #383737;
		}
	#ReportDesc {
			text-align: left;
			position: absolute;
			left: 683px;
			top: 690px;
		}
	</style>
</head>

<body>
	<a href = "Home.php" id = "TindersTitle">TINDERS</a>
	<a href = "Restock.php" id = "RRestock"> RESTOCK </a>
	<a href = "Update Stock.php" id = "RChange"> CHANGE </a>
	<a href = "Sell.php" id = "RSell"> SELL </a>
	<h1 id = "Head"> Morning, I suppose </h1>
	<a href = "logout.php" id = "RLogout"> LOG OUT</a>
	<a href = "Restock.php"><div id = "CircleRestock"></div></a>
	<a href = "Update Stock.php"><div id = "CirlceChange"></div></a>
	<a href = "Sell.php"><div id = "CirlceSell"></div> </a>
	<p id = "RestockLabel">RESTOCK</p>
	<p id = "ChangeLabel"> CHANGE</p>
	<p id = "SellLabel">SELL</p>
	<p id = "RestockDesc">New day, new stock. <br>Click here to update your stock for the day. <br></p>
	<p id = "ChangeDesc"> New, sudden changes? <br>Click here to update your stock.</p>
	<p id = "SellDesc">Sales are always welcome. <br> Click here to record a new purchase. </p>
	<div id = "ReportCirc"></div>
	<p id = "ReportLabel">REPORT</p>
	<p id = "ReportDesc"> How well did we do today? </p>
</body>
</html>
