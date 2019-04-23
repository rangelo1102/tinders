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

	$table = "products_drinks";
	$nameCollumn = "name_product";
	$stockCollumn = "amount_product";
	$priceCollumn = "price_product";
	$priceCollumn = "price_product";
	$soldCollumn = "sold_product";
	$revenueCollumn = "revenue";
	$productionCollumn = "production_cost";
	//get all values from table
	$getProdsQuery = "SELECT * FROM products_snacks";
	$getProds = $conn->query($getProdsQuery);
		?>

<!DOCTYPE html>
<html>
<head>
<meta name="utf-8" content = "width=device-width, initial-scale = 1">
<title>Tinders: Snacks Report </title>
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

	#SnacksTable {
			table-layout: fixed;
			position: absolute;
			font-family: raleway;
			top: 200px;
			left: 210px;
			border-collapse: collapse;
	}
	#SnacksMenuLabel {
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
		border-style: solid;
		border-color: black;
		border-width: 1px;
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
	<!--Backgrounds-->
	<img id = "New"> </img>
	<img id = "Old"> </img>
	<!--Ribbon-->
	<a href = "Home.php" id = "TindersTitle">TINDERS</a>
	<a href = "Restock_Categories.php" id = "RRestock"> RESTOCK </a>
	<a href = "Menu_Categories.php" id = "RMenu"> REPORT </a>
	<a href = "Sell_Categories.php" id = "RSell"> SELL </a>
	<a href = "ChangeStock_Categories.php" id = "RChange">CHANGE</a>
	<a href = "logout.php" id = "RLogout"> LOG OUT</a>
	<!--Header-->
	<p id = "SnacksMenuLabel"> Snacks Report</p>
	<!--Report table-->
	<table id = "SnacksTable">
		<tr> <!--Table Headers-->
			<th>Name </th>
			<th>Quantity Available</th>
			<th>Price</th>
			<th>Production Cost</th>
			<th>Amount Sold</th>
			<th>Revenue</th>
			<th>Profit</th>
		</tr>
		
			<?php 
			if ($getProds) {//get all information from snacks database
				while ($row=mysqli_fetch_array($getProds)) {
					$prodName=$row["$nameCollumn"];
					$prodStock = $row["$stockCollumn"];
					$prodPrice = $row["$priceCollumn"];
					$prodCost = $row["$productionCollumn"];
					$prodSold = $row["$soldCollumn"];
					$prodRev = $row["$revenueCollumn"];
					$prodProf = $prodRev - (($prodStock + $prodSold) * $prodCost);
					//display all info from database
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
	$totalRevQuery = "SELECT SUM(revenue) AS value_rev FROM products_snacks";
	$totalRevQueryResult = mysqli_query($conn, $totalRevQuery);
	$revValues = mysqli_fetch_assoc($totalRevQueryResult);
	$legitRev = $revValues['value_rev'];

	//get total production cost
	$totalProdCostQuery = "SELECT SUM((sold_product + amount_product) * production_cost) AS prod_cost FROM products_snacks";
	$totalProdCostQueryResult = mysqli_query($conn, $totalProdCostQuery);
	$costValues = mysqli_fetch_assoc($totalProdCostQueryResult);
	$legitCost = $costValues['prod_cost'];

	//calculate profit
	$snacksProfit = $legitRev - $legitCost;
	echo "<p id = 'TotalRev'> Total Revenue: Php $legitRev</p>
		  <p id = 'TotalProf'> Total Profit: Php $snacksProfit </p>";	

		  //get most popular product
		  //get the highest quantity sold
	$getMostPopQuery = "SELECT MAX(sold_product) AS max_product from products_snacks";
	$getMostPop = mysqli_query($conn, $getMostPopQuery);
	$getMP = mysqli_fetch_assoc($getMostPop);
	$legitMostPop = $getMP['max_product'];
			//get the product with the highest quantity sold
	$getRowQuery = "SELECT name_product AS popular_row FROM products_snacks WHERE sold_product = $legitMostPop";
	$getRow = mysqli_query($conn, $getRowQuery);
	$get = mysqli_fetch_assoc($getRow);
	$legitName = $get['popular_row'];
			//display result
	echo "<p id = 'MostPopularProd'> Most Popular Product: $legitName </p>";
	?>
</body>
</html>