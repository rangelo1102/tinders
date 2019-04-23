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

	$table = "dailyreports";
	$collumn = "day";
	$getDatesQuery = "SELECT * FROM dailyreports";
	$getDates = $conn->query($getDatesQuery);
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
<meta name="utf-8" content = "width=device-width, initial-scale = 1">
<title>Tinders: Delete Report</title>
	<link rel = "icon"
	type = "image/png"
	href = "icon.png">
<style>
		#New {
			height: 275px;
			width: 1200px;
			background-color: #C4C1C1;
			position: absolute;
			left: 175px;
			top: 150px;
		}
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
		#Product {
			font-size: 36px;
			position: absolute;
			top: 120px;
			left: 190px;
			font-family: raleway;
			font-weight: bold;
		}
		#Change {
			position: absolute;
			font-size: 44.43px;
			left: 100px;
			top: 20px;
			font-family: raleway;
			font-weight: bold;
		}
		#Quantity {
			font-size: 25.75px;
			position: absolute;
			top: 350px;
			left: 280px;
			font-family: raleway;
			font-weight: bold;
		}
		#NameProdSide {
			position: absolute;
			font-size: 25.75px;
			left: 280px;
			top: 225px;
			font-family: raleway;
			font-weight: bold;
		}
		#CategProdSide {
			font-size: 25.75px;
			position: absolute;
			left: 280px;
			top: 350px;
			font-family: raleway;
			font-weight: bold;
		}
		#PriceProdSide {
			font-size: 25.75px;
			position: absolute;
			left: 850px;
			top: 225px;
			font-family: raleway;
			font-weight: bold;
		}
		#UpdateButton {
			height: 75px;
			width: 250px;
			position: absolute;
			top: 520px;
			left: 650px;
			background-color: dimgray;
			border-radius: 20%;
			font-size: 55.27px;
			font-family: raleway;
			font-weight: bold;
		}
		#DropDownProdName {
			height: 30px;
			width: 500px;
			background-color: gray;
			position: absolute;
			left: 280px;
			top: 290px;
			border-radius: 10%;
			border: none;
			font-weight: bold;
			font-family: raleway;
		}
		#DropDownProdCateg {
			height: 30px;
			width: 350px;
			background-color: gray;
			position: absolute;
			left: 280px;
			top: 410px;
			border-radius: 10%;
			border: none;
			font-family: raleway;
			font-weight: bold;
		}
		#ProdPrice {
			height: 30px;
			width: 200px;
			background-color: gray;
			position: absolute;
			left: 850px;
			top: 290px;
			border-radius: 10%;
			border: none;
			font-family: raleway;
			font-weight: bold;
		}
		#ProdQty {
			height: 30px;
			width: 200px;
			background-color: gray;
			position: absolute;
			left: 280px;
			top: 410px;
			border-radius: 10%;
			border: none;
			font-family: raleway;
			font-weight: bold;
	}
		
		#QtyProdSide {
			height: 30px;
			width: 200px;
			color: black;
			position: absolute;
			left: 190px;
			top: 480px;
			font-family: raleway;
			font-weight: bold;
			font-size: 25.75px;
		}
		#QtyNewProdTextbox {
			background-color: gray;
			position: absolute;
			left: 190px;
			top: 540px;
			border-radius: 10%;
			border: none;
			font-family: raleway;
			font-weight: bold;
		}	
	</style>
</head>

<body>
	<p> </p>
	<!--Header-->
	<p id = "Change">Remove Report</p>
	<img id = "New"> </img>
	<!--Ribbon-->
	<a href = "Home.php" id = "TindersTitle">TINDERS</a>
	<a href = "Restock_Categories.php" id = "RRestock"> RESTOCK </a>
	<a href = "Menu_Categories.php" id = "RMenu"> REPORT </a>
	<a href = "Sell_Categories.php" id = "RSell"> SELL </a>
	<a href = "ChangeStock_Categories.php" id = "RChange">CHANGE</a>
	<a href = "logout.php" id = "RLogout"> LOG OUT</a>

	<!--New Product-->
	<p id = "Product"> remove</p>
	<p id = "NameProdSide"> name </p>
	<!--FORMS-->
	<form action = "changereport_backend.php" method = "post">
		<!--Product Name Drop Down-->
	<select required id = "DropDownProdName" name = "date">
		<option value="" hidden>PLEASE SELECT A DATE</option>
		<?php 
			if ($getDates) {//get product names from database to keep up with new stock
				while ($row=mysqli_fetch_array($getDates)) {
					$displayDates=$row["$collumn"];
					echo "<option value = ".$displayDates.">$displayDates<br></option>";
				}
			}
		?>
	</select>
	<button type = "submit" id = "UpdateButton" value = "sellThat">update</button>
	</form>
	
</body>
</html>
