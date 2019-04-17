<!DOCTYPE html>
<html>
<head>
<meta name="utf-8" content = "width=device-width, initial-scale = 1">
<title>Tinders: Change Stock </title>
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
	#SelectACategory {
			font-size: 20px;
			position: absolute;
			top: 150px;
			left: 640px;
			font-family: raleway;
			font-weight: bold;
			color: black;
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
	#SellCategoriesLabel {
			position: absolute;
			font-size: 44.43px;
			left: 100px;
			top: 20px;
			font-family: raleway;
			font-weight: bold;
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
	<p id = "SellCategoriesLabel">Change Stock</p>
	<p id = SnacksLabel> Snacks </p>
	<p id = "DrinksLabel">Drinks </p>
	<p id = "LunchLabel"> Lunch </p>
	<p id = "SelectACategory"> Please select a category. </p>
	<a href = "ChangeStock_Snacks.php"><img id = "SnacksCircle"></a>
	<a href = "ChangeStock_Drinks.php"><img id = "DrinksCircle"></a>
	<a href = "ChangeStock_Lunch.php"><img id = "LunchCircle"></a>
	
</body>
</html>