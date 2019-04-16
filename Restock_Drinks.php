<!DOCTYPE html>
<?php
//session
session_start();
if ( isset( $_SESSION['user_id'] ) ) {
} else {
    header("Location: index.php");
}



?>
<html>
<head>
<meta name="utf-8" content = "width=device-width, initial-scale = 1">
<title>Tinders: Restock Drinks</title>
	<link rel = "icon"
	type = "image/png"
	href = "icon.png">
<style>
		#New {
			height: 475px;
			width: 600px;
			background-color: #C4C1C1;
			position: absolute;
			left: 175px;
			top: 150px;
		}
		a:visited {
			color: black;
		}
		a {
			color: black;
		}
		#Old {
			height: 475px;
			width: 600px;
			background-color: dimgray;
			position: absolute;
			left: 775px;
			top: 150px;
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
			left: 190px;
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
			left: 190px;
			top: 305px;
			font-family: raleway;
			font-weight: bold;
		}
		#PriceProdSide {
			font-size: 25.75px;
			position: absolute;
			left: 190px;
			top: 385px;
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
		#Update {
			font-size: 55.27px;
			position: absolute;
			top: 600px;
			left:680px;
			font-family: raleway;
			font-weight: bold;
		}
		#UpdateButton {
			height: 75px;
			width: 250px;
			position: absolute;
			top: 650px;
			left: 650px;
			background-color: dimgray;
			border-radius: 20%;
			
		}
		#DropDownProdName {
			height: 30px;
			width: 500px;
			background-color: gray;
			position: absolute;
			left: 190px;
			top: 290px;
			border-radius: 10%;
			border: none;
			font-family: raleway;
			font-weight: bold;
		}
		#DropDownProdCateg {
			height: 30px;
			width: 350px;
			background-color: gray;
			position: absolute;
			left: 190px;
			top: 370px;
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
			left: 190px;
			top: 450px;
			border-radius: 10%;
			border: none;
			font-family: raleway;
			font-weight: bold;
		}
		#DropDownOldProdName {
			height: 30px;
			width: 500px;
			background-color: gray;
			position: absolute;
			left: 860px;
			top: 290px;
			border-radius: 10%;
			border: none;
		}
		#DropDownOldProdCateg {
			height: 30px;
			width: 350px;
			background-color: gray;
			position: absolute;
			left: 1010px;
			top: 370px;
			border-radius: 10%;
			border: none;
			font-family: raleway;
			font-weight: bold;
		}
		#DropDownOldProdPrice {
			height: 30px;
			width: 200px;
			background-color: gray;
			position: absolute;
			left: 1160px;
			top: 450px;
			border-radius: 10%;
			border: none;
			font-family: raleway;
			font-weight: bold;
		}
		#DropDownProdNameCateg {
			height: 30px;
			width: 500px;
			background-color: gray;
			position: absolute;
			left: 860px;
			top: 290px;
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
	<!--Banner -->
	<a href = "Home.php"><p id = "TindersTitle">TINDERS</p></a>
	<p id = "Change">RESTOCK DRINKS</p>
	<img id = "New"> </img>
	<img id = "Old"> </img>
	<a href = "Restock_Categories.php"><p id = "RRestock"> RESTOCK </p></a>
	<a href = "Update Stock.php"><p id = "RChange"> CHANGE </p></a>
	<a href = "Sell_Categories.php"><p id = "RSell"> SELL </p></a>
	<a href = "logout.php"><p id = "RLogout"> LOG OUT</p></a>

	<!-- Product & Old Titles -->
	<p id = "Product"> new product</p>
	<p id = "OldProd"> old product</p>

	<!--New Product-->
	<p id = "NameProdSide"> name </p>
	<p id = "CategProdSide"> category </p>
		<select required id = "DropDownProdCateg">
		<option value=""hidden id = "DropDownProdCategContentPlaceholder">CHOOSE A CATEGORY</option>
    	<option value = "1">Category 1</option>
    	<option value = "2">Category 2</option>
    	<option value = "3">Category 3</option>
		</select>
	<input type = "text" id = "DropDownProdName" name = "prodname" placeholder = " INPUT NAME">
	<input type = "text" id = "ProdPrice" name = "newprodprice"  placeholder=" INPUT PRICE">
	<p id = "PriceProdSide"> price </p>
	<p id = "QtyProdSide"> quantity</p>
	<input type = "number" id = "QtyNewProdTextbox" name = " " placeholder=" INSERT QUANTITY"
	<!--Old Product-->
	<p id = "NameOldSide"> name</p>
	<select required id = "DropDownProdNameCateg">
		<option value="" hidden id = "DropDownProdCategContentPlaceholder">CHOOSE A PRODUCT</option>
		<option value "1">Product 1 </option>
		<option value "2">Product 2 </option>
		<option value "3">Product 3 </option>
	</select>

	<p id = "CategOldSide"> category</p>
	<select required id = "DropDownOldProdCateg">
		<option value="" hidden id = "DropDownProdCategContentPlaceholder">CHOOSE A CATEGORY</option>
		<option value "1">Category 1 </option>
		<option value "2">Category 2 </option>
		<option value "3">Category 3 </option>
	</select>
	<p id = "PriceOldSide"> price</p>
	<input type = "text" id = "DropDownOldProdPrice" placeholder=" INPUT PRICE"> </img>

	<p id = "QtyOldSide"> quantity</p>
	<input type = "number" id = "QtyOldProdTextbox" placeholder = " INPUT QUANTITY">

	<!--UpdateButton-->
	<img id = "UpdateButton"> </img>
	<p id = "Update"> update </p>
</body>
</html>
