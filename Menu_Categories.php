<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "tinders";

	//connecting to db 
	$conn = new mysqli($host,$user,$pass,$db);
	if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
			}
		?>


<!DOCTYPE html>
<html>
<head>
<meta name="utf-8" content = "width=device-width, initial-scale = 1">
<title>Tinders: Report </title>
	<link rel = "icon"
	type = "image/png"
	href = "icon.png">
<style>
	a{
		color: black;
	}
	#TindersTitle {
			position: absolute;
			font-size: 20px;
			left: 30px;
			top: 5px;
			font-family: raleway;
			font-weight: bold;
		}

	#RRestock {
			font-size: 20px;
			position: absolute;
			top: 5px;
			left: 550px;
			font-family: raleway;
			font-weight: bold;
		}
	#RChange {
			font-size: 20px;
			position: absolute;
			top: 5px;
			left: 740px;
			font-family: raleway;
			font-weight: bold;
		}
	#RSell {
			font-size: 20px;
			position: absolute;
			top: 5px;
			left: 950px;
			font-family: raleway;
			font-weight: bold;
		}
	#RLogout {
			font-size: 20px;
			position: absolute;
			left: 1400px;
			top: 5px;
			font-family: raleway;
			font-weight: bold;
		}
	#SnacksLabel {
			font-size: 52px;
			position: absolute;
			top: 420px;
			left: 350px;
			font-family: raleway;
			font-weight: bold;
			color: #383737;
		}
	#DrinksLabel {
			font-size: 52px;
			position: absolute;
			top: 420px;
			left: 680px;
			font-family: raleway;
			font-weight: bold;
			color: #383737;
		}
	#LunchLabel {
			font-size: 52px;
			position: absolute;
			top: 420px;
			left: 1010px;
			font-family: raleway;
			font-weight: bold;
			color: #383737;
	}
	#SnacksCircle {
			background-color: dimgray;
			height: 150px;
			width: 150px;
			position: absolute;
			border-radius: 50%;
			top: 300px;
			left: 365px;
	}
	#DrinksCircle {
			background-color: dimgray;
			height: 150px;
			width: 150px;
			position: absolute;
			border-radius: 50%;
			top: 300px;
			left: 680px;
	}
	#LunchCircle {
			background-color: dimgray;
			height: 150px;
			width: 150px;
			position: absolute;
			border-radius: 50%;
			top: 300px;
			left: 1010px;
	}
	#MenuCategoriesLabel {
			position: absolute;
			font-size: 44.43px;
			left: 100px;
			top: 20px;
			font-family: raleway;
			font-weight: bold;
	}
	#OverallTinders {
			font-family: raleway;
			font-weight: bold;
			position: absolute;
			top: 125px;
			left: 470px;
			font-size: 50px;
	}
</style>
<body>
<a href = "Home.php"><p id = "TindersTitle">TINDERS</p></a>
	<img id = "New"> </img>
	<img id = "Old"> </img>
	<a href = "Restock_Categories.php"><p id = "RRestock"> RESTOCK </p></a>
	<a href = "Menu_Categories.php"><p id = "RChange"> REPORT </p></a>
	<a href = "Sell_Categories.php"><p id = "RSell"> SELL </p></a>
	<a href = "logout.php"><p id = "RLogout"> LOG OUT</p></a>
	<p id = "MenuCategoriesLabel">Report</p>
	<p id = SnacksLabel> Snacks </p>
	<p id = "DrinksLabel">Drinks </p>
	<p id = "LunchLabel"> Lunch </p>
	<a href = "Menu_Snacks.php"><img id = "SnacksCircle"></a>
	<a href = "Menu_Drinks.php"><img id = "DrinksCircle"></a>
	<a href = "Menu_Lunch.php"><img id = "LunchCircle"></a>

	<?php
	//get total revenue OF EVERYTHING
	//drinks
	$totalDrinksRevQuery = "SELECT SUM(revenue) AS value_rev FROM products_drinks";
	$totalDrinksRevQueryResult = mysqli_query($conn, $totalDrinksRevQuery);
	$revValuesDrinks = mysqli_fetch_assoc($totalDrinksRevQueryResult);
	$overallDrinksRevenue = $revValuesDrinks['value_rev'];

	//snacks
	$totalSnacksRevQuery = "SELECT SUM(revenue) AS value_rev FROM products_snacks";
	$totalSnacksRevQueryResult = mysqli_query($conn, $totalSnacksRevQuery);
	$revValuesSnacks = mysqli_fetch_assoc($totalSnacksRevQueryResult);
	$overallSnacksRevenue = $revValuesSnacks['value_rev'];

	//lunch
	$totalLunchRevQuery = "SELECT SUM(revenue) AS value_rev FROM products_lunch";
	$totalLunchRevQueryResult = mysqli_query($conn, $totalLunchRevQuery);
	$revValuesLunch = mysqli_fetch_assoc($totalLunchRevQueryResult);
	$overallLunchRevenue = $revValuesLunch['value_rev'];

	//OVERALL
	$overallTindersRevenue = 0;

	$overallTindersRevenue = $overallDrinksRevenue + $overallSnacksRevenue + $overallLunchRevenue;

	echo "<p id = 'OverallTinders'> Overall Revenue: Php $overallTindersRevenue </p>"
	
	?>
	
</body>
</html>