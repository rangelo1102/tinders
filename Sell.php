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
<title>Tinders: Sell</title>
	<link rel = "icon"
	type = "image/png"
	href = "icon.png">
<style>
		#New {
			height: 475px;
			width: 1200px;
			background-color: #C4C1C1;
			position: absolute;
			left: 175px;
			top: 150px;
		}
		a:visited {
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
		#Change {
			position: absolute;
			font-size: 44.43px;
			left: 100px;
			top: 20px;
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
		#Product {
			font-size: 36px;
			position: absolute;
			top: 120px;
			left: 190px;
			font-family: raleway;
			font-weight: bold;
		}
		#Quantity {
			font-size: 25.75px;
			position: absolute;
			top: 350px;
			left: 850px;
			font-family: raleway;
			font-weight: bold;
		}
		#OldProd {
			position: absolute;
			font-size: 36px;
			top: 120px;
			left: 1160px;
			color: white;
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
		#NameOldSide {
			position: absolute;
			font-size: 25.75px;
			top: 225px;
			left: 1285px;
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
		#CategOldSide {
			position: absolute;
			font-size: 25.75px;
			top: 305px;
			left: 1245px;
			font-family: raleway;
			font-weight: bold;
		}
		#PriceOldSide {
			font-size: 25.75px;
			position: absolute;
			top: 385px;
			left: 1290px;
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
			left: 850px;
			top: 410px;
			border-radius: 10%;
			border: none;
			font-family: raleway;
			font-weight: bold;
	}
		#QtyOldSide {
			color: black;
			position: absolute;
			left: 1250px;
			top: 480px;
			font-family: raleway;
			font-weight: bold;
			font-size: 25.75px;
		}
		#QtyOldProdTextbox {
			background-color: gray;
			position: absolute;
			left: 1200px;
			top: 540px;
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
	<!--Ribbon-->
	<a href = "Home.php"><p id = "TindersTitle">TINDERS</p></a>
	<p id = "Change">SELL</p>
	<img id = "New"> </img>
	<img id = "Old"> </img>
	<a href = "Restock.php"><p id = "RRestock"> RESTOCK </p></a>
	<a href = "Update Stock.php"><p id = "RChange"> CHANGE </p></a>
	<a href = "Sell.php"><p id = "RSell"> SELL </p></a>
	<a href = "logout.php"><p id = "RLogout"> LOG OUT</p></a>

	<!--New Product-->
	<p id = "Product"> new product</p>
	<p id = "NameProdSide"> name </p>
	<p id = "CategProdSide"> category </p>
	<p id = "PriceProdSide"> price </p>
	<p id = "Quantity"> quantity</p>
	<img id = "DropDownProdPrice"></img>
	<!--FORMS-->
	<form action = "sell_backend.php" method = "post">
	<input type = "text" id = "ProdPrice" name = "newprodprice" placeholder=" INPUT PRICE">
	<input type = "number" id = "ProdQty" placeholder=" INPUT QUANTITY SOLD" name = "qty">
		<!--Category Name Drop Down-->
	<select id = "DropDownProdCateg" name = "category">
		<option value="">CHOOSE A CATEGORY</option>
		<option value="Drinks">Drinks</option>
		<option value="Snacks">Snacks</option>
		<option value="Lunch">Lunch</option>
	</select>
		<!--Product Name Drop Down-->
	<select required id = "DropDownProdName" name = "product">
		<option value="" hidden>PLEASE SELECT A CATEGORY FIRST</option>
		<option value = "1"> Fries</option>
	</select>
	<button type = "submit" id = "UpdateButton" value = "sellThat">update</button>
	</form>
	
</body>
</html>
