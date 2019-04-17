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
	#OverallTindersRev {
			font-family: raleway;
			font-weight: bold;
			position: absolute;
			top: 90px;
			left: 460px;
			font-size: 50px;
	}
	#OverallTindersProf {
			font-family: raleway;
			font-weight: bold;
			position: absolute;
			top: 140px;
			left: 480px;
			font-size: 50px;
	}
</style>
<body>
	<a href = "Home.php" id = "TindersTitle">TINDERS</a>
	<a href = "Restock_Categories.php" id = "RRestock"> RESTOCK </a>
	<a href = "Menu_Categories.php" id = "RMenu"> REPORT </a>
	<a href = "Sell_Categories.php" id = "RSell"> SELL </a>
	<a href = "ChangeStock_Categories.php" id = "RChange">CHANGE</a>
	<a href = "logout.php" id = "RLogout"> LOG OUT</a>
	<img id = "New"> </img>
	<img id = "Old"> </img>
	<p id = "MenuCategoriesLabel">Report</p>
	<p id = SnacksLabel> Snacks </p>
	<p id = "DrinksLabel">Drinks </p>
	<p id = "LunchLabel"> Lunch </p>
	<a href = "Menu_Snacks.php"><img id = "SnacksCircle"></a>
	<a href = "Menu_Drinks.php"><img id = "DrinksCircle"></a>
	<a href = "Menu_Lunch.php"><img id = "LunchCircle"></a>

	<?php	
	//get snacks profit
	$totalRevQuery = "SELECT SUM(revenue) AS value_rev FROM products_snacks";
	$totalRevQueryResult = mysqli_query($conn, $totalRevQuery);
	$revSnacksValues = mysqli_fetch_assoc($totalRevQueryResult);
	$legitSnacksRev = $revSnacksValues['value_rev'];

	$totalProdCostQuery = "SELECT SUM((sold_product + amount_product) * production_cost) AS prod_cost FROM products_snacks";
	$totalProdCostQueryResult = mysqli_query($conn, $totalProdCostQuery);
	$costValues = mysqli_fetch_assoc($totalProdCostQueryResult);
	$legitSnacksCost = $costValues['prod_cost'];
	$snacksProfit = $legitSnacksRev - $legitSnacksCost;

	//get lunch profit
	$totalRevQuery = "SELECT SUM(revenue) AS value_rev FROM products_lunch";
	$totalRevQueryResult = mysqli_query($conn, $totalRevQuery);
	$revLunchValues = mysqli_fetch_assoc($totalRevQueryResult);
	$legitLunchRev = $revLunchValues['value_rev'];

	$totalProdCostQuery = "SELECT SUM((sold_product + amount_product) * production_cost) AS prod_cost FROM products_lunch";
	$totalProdCostQueryResult = mysqli_query($conn, $totalProdCostQuery);
	$costValues = mysqli_fetch_assoc($totalProdCostQueryResult);
	$legitLunchCost = $costValues['prod_cost'];
	$lunchProfit = $legitLunchRev - $legitLunchCost;

	//get drinks profit
	$totalRevQuery = "SELECT SUM(revenue) AS value_rev FROM products_drinks";
	$totalRevQueryResult = mysqli_query($conn, $totalRevQuery);
	$revDrinksValues = mysqli_fetch_assoc($totalRevQueryResult);
	$legitDrinksRev = $revDrinksValues['value_rev'];

	$totalProdCostQuery = "SELECT SUM((sold_product + amount_product) * production_cost) AS prod_cost FROM products_drinks";
	$totalProdCostQueryResult = mysqli_query($conn, $totalProdCostQuery);
	$costValues = mysqli_fetch_assoc($totalProdCostQueryResult);
	$legitDrinksCost = $costValues['prod_cost'];
	$drinksProfit = $legitDrinksRev - $legitDrinksCost;

	$overallTindersRevenue = $legitSnacksRev + $legitLunchRev + $legitDrinksRev;
	$overallTindersProfit = $snacksProfit + $lunchProfit + $drinksProfit;
	echo "<p id = 'OverallTindersRev'> Overall Revenue: Php $overallTindersRevenue </p>
			<p id = 'OverallTindersProf'> Overall Profit: Php $overallTindersProfit </p>";

	?>
	
</body>
</html>