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
	//get all values from table
	$getProdsQuery = "SELECT * FROM products_lunch";
	$getProds = $conn->query($getProdsQuery);
		?>

<!DOCTYPE html>
<html>
<head>
<meta name="utf-8" content = "width=device-width, initial-scale = 1">
<title>Tinders: Lunch Menu </title>
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

	#LunchTable {
			table-layout: fixed;
			position: absolute;
			font-family: raleway;
			top: 200px;
			left: 350px;
			
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
		width: 300px;
		text-align: left;
	}
	th {
		border-collapse: collapse;
		border-bottom-style: solid;
		border-color: black;
		border-width: 1px;
		border-top-style: solid;
	}
	td {
		border-bottom-style: solid;
		border-color: black;
		border-width: 1px;
	}

</style>
<body>
<a href = "Home.php"><p id = "TindersTitle">TINDERS</p></a>
	<img id = "New"> </img>
	<img id = "Old"> </img>
	<a href = "Restock_Categories.php"><p id = "RRestock"> RESTOCK </p></a>
	<a href = "Menu_Categories.php"><p id = "RChange"> MENU </p></a>
	<a href = "Sell_Categories.php"><p id = "RSell"> SELL </p></a>
	<a href = "logout.php"><p id = "RLogout"> LOG OUT</p></a>
	<p id = "LunchMenuLabel"> Lunch Menu</p>
	<table id = "LunchTable">
		<tr>
			<th>Name </th>
			<th>Quantity Available</th>
			<th>Price</th>
		</tr>
		
			<?php 
			if ($getProds) {
				while ($row=mysqli_fetch_array($getProds)) {
					$prodName=$row["$nameCollumn"];
					$prodStock = $row["$stockCollumn"];
					$prodPrice = $row["$priceCollumn"];
					echo "<tr>
					<td>$prodName</td>
					<td>$prodStock</td>
					<td>$prodPrice</td>
					</tr>";
				}
			}
		?>
	</table>
	
</body>
</html>