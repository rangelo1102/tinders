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

	$table = "products_lunch";
	$nameCollumn = "name_product";
	$stockCollumn = "amount_product";
	$priceCollumn = "price_product";
	$priceCollumn = "price_product";
	$soldCollumn = "sold_product";
	$revenueCollumn = "revenue";
	$productionCollumn = "production_cost";
	//get all values from table
	$getProdsQuery = "SELECT * FROM products_lunch";
	$getProds = $conn->query($getProdsQuery);
		?>

<!DOCTYPE html>
<html>
<head>
<meta name="utf-8" content = "width=device-width, initial-scale = 1">
<title>Tinders: Lunch Report </title>
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
	#LunchTable {
			table-layout: fixed;
			position: absolute;
			font-family: raleway;
			top: 200px;
			left: 210px;
			border-collapse: collapse;
	}
	#LunchMenuLabel {
			position: absolute;
			font-size: 44.43px;
			left: 100px;
			top: 40px;
			font-family: raleway;
			font-weight: bold;
		}
	th, td {
		width: 150px;
		text-align: left;
	}
	th {
		border-collapse: collapse;
		border-style: solid;
		border-color: black;
		border-width: 1px;
	}
	td {
		border-bottom-style: solid;
		border-color: black;
		border-width: 1px;
		border-style: solid;
	}
	#TotalProf {
		font-family: raleway;
		font-size: 25px;
		font-weight: bold;
		position: absolute;
		left: 1000px;
		top: 100px;
	}
	#TotalRev {
		font-family: raleway;
		font-size: 25px;
		font-weight: bold;
		position: absolute;
		left: 1000px;
		top: 70px;
	}
	#MostPopularProd {
		font-family:raleway;
		font-size: 25px;
		font-weight: bold;
		position: absolute;
		left: 1000px;
		top: 130px;
	}
</style>
<body>
	<img id = "New"> </img>
	<img id = "Old"> </img>
	<a href = "Home.php" id = "TindersTitle">TINDERS</a>
	<a href = "Restock_Categories.php" id = "RRestock"> RESTOCK </a>
	<a href = "Menu_Categories.php" id = "RMenu"> REPORT </a>
	<a href = "Sell_Categories.php" id = "RSell"> SELL </a>
	<a href = "ChangeStock_Categories.php" id = "RChange">CHANGE</a>
	<a href = "logout.php" id = "RLogout"> LOG OUT</a>
	<p id = "LunchMenuLabel"> Lunch Report</p>
	<table id = "LunchTable">
		<tr>
			<th>Name </th>
			<th>Quantity Available</th>
			<th>Price</th>
			<th>Production Cost</th>
			<th>Amount Sold</th>
			<th>Revenue</th>
			<th>Profit</th>
		</tr>
			<?php 
			if ($getProds) {
				while ($row=mysqli_fetch_array($getProds)) {
					$prodName=$row["$nameCollumn"];
					$prodStock = $row["$stockCollumn"];
					$prodPrice = $row["$priceCollumn"];
					$prodCost = $row["$productionCollumn"];
					$prodSold = $row["$soldCollumn"];
					$prodRev = $row["$revenueCollumn"];
					$prodProf = $prodRev - (($prodStock + $prodSold) * $prodCost);
					echo "<tr>
					<td>$prodName</td>
					<td>$prodStock</td>
					<td>Php $prodPrice</td>
					<td>Php $prodCost</td>
					<td>$prodSold</td>
					<td>Php $prodRev</td>
					<td>Php $prodProf</td>
					</tr>";
				}
			}
		?>
	</table>
	<?php
	//get total revenue
	$totalRevQuery = "SELECT SUM(revenue) AS value_rev FROM products_lunch";
	$totalRevQueryResult = mysqli_query($conn, $totalRevQuery);
	$revValues = mysqli_fetch_assoc($totalRevQueryResult);
	$legitRev = $revValues['value_rev'];

	$totalProdCostQuery = "SELECT SUM((sold_product + amount_product) * production_cost) AS prod_cost FROM products_lunch";
	$totalProdCostQueryResult = mysqli_query($conn, $totalProdCostQuery);
	$costValues = mysqli_fetch_assoc($totalProdCostQueryResult);
	$legitCost = $costValues['prod_cost'];

	$lunchProfit = $legitRev - $legitCost;
	echo "<p id = 'TotalRev'> Total Revenue: Php $legitRev</p>
		  <p id = 'TotalProf'> Total Profit: Php $lunchProfit </p>";	

	//get most popular product
	$getMostPopQuery = "SELECT name_product, MAX(sold_product) FROM products_lunch GROUP BY name_product";
	$getMostPop = mysqli_query($conn, $getMostPopQuery);
	$getMP = mysqli_fetch_assoc($getMostPop);
	$legitMostPop = $getMP['name_product'];
	echo "<p id = 'MostPopularProd'> Most Popular Product: $legitMostPop </p>";
	?>
</body>
</html>