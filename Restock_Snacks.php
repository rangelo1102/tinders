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

	$table = "products_snacks";
	$collumn = "name_product";
	$getProdNamesQuery = "SELECT * FROM products_snacks";
	$getProdNames = $conn->query($getProdNamesQuery);
		?>

<!DOCTYPE html>
<?php
//session; prevent users from accessing without logging in
session_start();
if ( isset( $_SESSION['user_id'] ) ) {
} else {
    header("Location: index.php");
}
?>
<html>
<head>
<meta name="utf-8" content = "width=device-width, initial-scale = 1">
<title>Tinders: Restock Snacks</title>
	<link rel = "icon"
	type = "image/png"
	href = "icon.png">
<style>
		#New {
			height: 470px;
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
			height: 470px;
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
		#Change {
			position: absolute;
			font-size: 44.43px;
			left: 100px;
			top: 20px;
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
			left: 1050px;
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
			top: 310px;
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
			top: 310px;
			left: 1020px;
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
		#ProdPrice {
			height: 30px;
			width: 360px;
			background-color: gray;
			position: absolute;
			left: 190px;
			top: 370px;
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
		#OldProdPrice {
			height: 30px;
			width: 360px;
			background-color: gray;
			position: absolute;
			left: 1000px;
			top: 370px;
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
			left: 850px;
			top: 390px;
			font-family: raleway;
			font-weight: bold;
			font-size: 25.75px;
		}
		#QtyOldProdTextbox {
			background-color: gray;
			position: absolute;
			left: 1070px;
			top: 450px;
			width: 290px;
			border-radius: 10%;
			border: none;
			font-family: raleway;
			font-weight: bold;
			height: 30px;
		}
		#QtyNewProdSide {
			height: 30px;
			width: 200px;
			color: black;
			position: absolute;
			left: 190px;
			top: 390px;
			font-family: raleway;
			font-weight: bold;
			font-size: 25.75px;
		}
		#QtyNewProdTextbox {
			background-color: gray;
			position: absolute;
			left: 190px;
			top: 450px;
			border-radius: 10%;
			border: none;
			font-family: raleway;
			height: 30px;
			font-weight: bold;
			width: 290px;
		}
		#prodCostNew {
			position: absolute;
			font-size: 25.75px;
			top: 480px;
			left: 190px;
			font-family: raleway;
			font-weight: bold;
		}
		#NewProdCostTextBox {
			background-color: gray;
			position: absolute;
			left: 190px;
			top: 540px;
			border-radius: 10%;
			border: none;
			font-family: raleway;
			height: 30px;
			font-weight: bold;
			width: 230px;
		}
		#OldProdCost {
			position: absolute;
			font-size: 25.75px;
			top: 480px;
			left: 1170px;
			font-family: raleway;
			font-weight: bold;
		}
		#OldProdCostTextbox {
			background-color: gray;
			position: absolute;
			left: 1130px;
			top: 540px;
			border-radius: 10%;
			border: none;
			font-family: raleway;
			height: 30px;
			font-weight: bold;
			width: 230px;
		}
	</style>
</head>

<body>
	<p> </p>
	<!--Header-->
	<p id = "Change">Restock Snacks</p>
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

	<!-- Product & Old Titles -->
	<p id = "Product"> new product</p>
	<p id = "OldProd"> old product</p>

	<!--New Product Restock-->
	<p id = "NameProdSide"> name (do not use spaces)</p>
	<input type = "text" id = "DropDownProdName" name = "prodname" placeholder = " INPUT NAME">
	<!--new product price-->
	<p id = "PriceProdSide"> price </p>
	<input type = "number" id = "ProdPrice" name = "newprodprice"  placeholder=" INPUT PRICE">
	<!--new product quantity-->
	<p id = "QtyNewProdSide"> quantity</p>
	<input type = "number" id = "QtyNewProdTextbox" name = " " placeholder=" INPUT QUANTITY">
	<!--new product production cost-->
	<p id = "prodCostNew"> production cost</p>
	<input type = "number" id = "NewProdCostTextBox" name = " " placeholder=" INPUT PROD COST">


	<!--Old Product Update Details-->
	<p id = "NameOldSide"> name (do not use spaces)</p>
	<select id = "DropDownProdNameCateg">
		<option value="" hidden id = "DropDownProdCategContentPlaceholder">CHOOSE A PRODUCT</option>
		<?php //get product names from database to keep up with new products
			if ($getProdNames) {
				while ($row=mysqli_fetch_array($getProdNames)) {
					$prodName=$row["$collumn"];
					echo "<option value = ".$prodName.">$prodName<br></option>";
				}
			}
			?>
	</select>
	<!--update price-->
	<p id = "PriceOldSide"> price (leave empty to retain)</p>
	<input type = "number" id = "OldProdPrice" placeholder=" INPUT PRICE"> </img>
	<!--update qty available-->
	<p id = "QtyOldSide"> quantity (negative values to reduce stock)</p>
	<input type = "number" id = "QtyOldProdTextbox" placeholder = " INPUT QUANTITY">
	<!--update production cost-->
	<p id = "OldProdCost"> production cost</p>
	<input type = "number" id = "OldProdCostTextbox" placeholder = " INPUT PROD COST">

	<!--UpdateButton-->
	<button type = "submit" id = "UpdateButton" value = "restock">update</button>
</body>
</html>
