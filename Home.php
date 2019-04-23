<?php
//database credentials
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "tinders";

	//connecting to db 
	$conn = new mysqli($host,$user,$pass,$db);
	if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
			}

	$checkIfDateExistsQuery = "SELECT id
		FROM dailyreports
		WHERE day = curdate()";
	$checkIfDateExists = mysqli_query($conn, $checkIfDateExistsQuery);
	$row = mysqli_fetch_array($checkIfDateExists);
//restart revenue and profit for the day
	if ($row === null) {
		$resetDrinksQuery = "UPDATE products_drinks
		SET revenue = 0";
		$resetDrinks = mysqli_query($conn, $resetDrinksQuery);

		$resetSnacksQuery = "UPDATE products_snacks
		SET revenue = 0";
		$resetDrinks = mysqli_query($conn, $resetSnacksQuery);

		$resetLunchQuery = "UPDATE products_lunch
		SET revenue = 0";
		$resetDrinks = mysqli_query($conn, $resetLunchQuery);
	}
		?>

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
			left: 420px;
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
	#RMenu {
			font-size: 20px;
			position: absolute;
			top: 25px;
			left: 640px;
			text-decoration: none;
			font-family: raleway;
			font-weight: bold;
		}
	#RSell {
			font-size: 20px;
			position: absolute;
			top: 25px;
			left: 850px;
			text-decoration: none;
			font-family: raleway;
			font-weight: bold;
		}
	#RChange {
			font-size: 20px;
			position: absolute;
			top: 25px;
			left: 1050px;
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
	
	#CirlceMenu {
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
	#MenuLabel {
			font-size: 52px;
			position: absolute;
			top: 410px;
			left: 670px;
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
			left: 250px;
		}
	#MenuDesc {
			text-align: center;
			position: absolute;
			top: 520px;
			left: 660px;
		}
	#SellDesc {
			text-align: center;
			position: absolute;
			top: 520px;
			left: 1070px;
		}
	#ChangeCirc {
			background-color: dimgray;
			height: 75px;
			width: 75px;
			position: absolute;
			border-radius: 50%;
			top: 650px;
			left: 590px;
		}
	#ChangeLabel {
			font-size: 52px;
			position: absolute;
			top: 595px;
			left: 680px;
			font-family: raleway;
			font-weight: bold;
			color: #383737;
		}
	#ChangeDesc {
			text-align: left;
			position: absolute;
			left: 683px;
			top: 690px;
		}
	</style>
</head>

<body>
	<!--Ribbon-->
	<a href = "Home.php" id = "TindersTitle">TINDERS</a>
	<a href = "Restock_Categories.php" id = "RRestock"> RESTOCK </a>
	<a href = "Menu_Categories.php" id = "RMenu"> REPORT </a>
	<a href = "Sell_Categories.php" id = "RSell"> SELL </a>
	<a href = "ChangeStock_Categories.php" id = "RChange">CHANGE</a>
	<a href = "logout.php" id = "RLogout"> LOG OUT</a>
	<!--Greeting-->
	<h1 id = "Head"> Morning, I suppose </h1>
	<!--Hyperlink circles-->
	<a href = "Restock_Categories.php"><div id = "CircleRestock"></div></a>
	<a href = "Menu_Categories.php"><div id = "CirlceMenu"></div></a>
	<a href = "Sell_Categories.php"><div id = "CirlceSell"></div> </a>
	<a href = "ChangeStock_Categories.php"><img id = "ChangeCirc"></a>
	<!--Labels for hyperlink circles-->
	<p id = "RestockLabel">RESTOCK</p>
	<p id = "MenuLabel"> REPORT </p>
	<p id = "SellLabel">SELL</p>
	<p id = "ChangeLabel"> CHANGE </p>
	<!--Descriptions-->
	<p id = "RestockDesc">New day, new stock. <br>Update your current pricing and stock. <br></p>
	<p id = "MenuDesc"> What's available? <br>Stock, pricing, revenue, profit, and records.</p>
	<p id = "SellDesc">Sales are always welcome. <br> Click here to record a new purchase. </p>
	<p id = "ChangeDesc"> Drop items from the inventory. </p>
</body>
</html>
