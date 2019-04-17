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

	$table = "products_drinks";
	$nameCollumn = "name_product";
	$stockCollumn = "amount_product";
	$priceCollumn = "price_product";
	$soldCollumn = "sold_product";
	$revenueCollumn = "revenue";
	//get all values from table
	$getProdsQuery = "SELECT * FROM products_drinks";
	$getProds = $conn->query($getProdsQuery);
		?>

<!DOCTYPE html>
<html>
<head>
<meta name="utf-8" content = "width=device-width, initial-scale = 1">
<title>Tinders: Drinks Report </title>
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

	#DrinksTable {
			table-layout: fixed;
			position: absolute;
			font-family: raleway;
			top: 200px;
			left: 250px;
			border-collapse: collapse;
	}
	#DrinksMenuLabel {
			position: absolute;
			font-size: 44.43px;
			left: 100px;
			top: 40px;
			font-family: raleway;
			font-weight: bold;
		}
	th, td {
		width: 200px;
		text-align: left;
	}
	th {
		border-collapse: collapse;
		border-style: solid;
		border-color: black;
		border-width: 1px;
		border-top-style: solid;
	}
	td {
		border-style: solid;
		border-color: black;
		border-width: 1px;
	}
	#TotalRev {
		font-family: raleway;
		font-size: 30px;
		font-weight: bold;
		position: absolute;
		left: 1000px;
		top: 70px;
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
	<p id = "DrinksMenuLabel"> Drinks Report</p>
	<table id = "DrinksTable">
		<tr>
			<th>Name </th>
			<th>Quantity Available</th>
			<th>Price</th>
			<th>Amount Sold </th>
			<th>Revenue</th>
		</tr>
		
			<?php 
			if ($getProds) {
				while ($row=mysqli_fetch_array($getProds)) {
					$prodName=$row["$nameCollumn"];
					$prodStock = $row["$stockCollumn"];
					$prodPrice = $row["$priceCollumn"];
					$prodSold = $row["$soldCollumn"];
					$prodRev = $row["$revenueCollumn"];
					echo "<tr>
					<td>$prodName</td>
					<td>$prodStock</td>
					<td>Php $prodPrice</td>
					<td>$prodSold</td>
					<td>Php $prodRev</td>
					</tr>";
				}
			}
		?>
	</table>
	<?php
	//get total revenue
	$totalRevQuery = "SELECT SUM(revenue) AS value_rev FROM products_drinks";
	$totalRevQueryResult = mysqli_query($conn, $totalRevQuery);
	$revValues = mysqli_fetch_assoc($totalRevQueryResult);
	$legitRev = $revValues['value_rev'];
	echo "<p id = 'TotalRev'> Total Revenue: Php $legitRev </p>";	
	?>
	
</body>
</html>