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
	$dateCollumn = "day";
	$revenueCollumn = "profit";
	$profitCollumn= "revenue";
	//get all values from table
	$getProdsQuery = "SELECT * FROM dailyreports";
	$getProds = $conn->query($getProdsQuery);
		?>

<!DOCTYPE html>
<html>
<head>
<meta name="utf-8" content = "width=device-width, initial-scale = 1">
<title>Tinders: Daily Reports </title>
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
	#ReportTable {
			table-layout: fixed;
			position: absolute;
			font-family: raleway;
			top: 200px;
			left: 360px;
			border-collapse: collapse;
	}
	#ReportMenuLabel {
			position: absolute;
			font-size: 44.43px;
			left: 100px;
			top: 40px;
			font-family: raleway;
			font-weight: bold;
		}
	th, td {
		width: 270px;
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
	#TotalProf {
		font-family: raleway;
		font-size: 30px;
		font-weight: bold;
		position: absolute;
		left: 1000px;
		top: 100px;
	}
	#TotalProf {
		font-family: raleway;
		font-size: 30px;
		font-weight: bold;
		position: absolute;
		left: 1000px;
		top: 100px;
	}
	#TotalRev {
		font-family: raleway;
		font-size: 30px;
		font-weight: bold;
		position: absolute;
		left: 1000px;
		top: 70px;
	}
	#EditReportsCircle {
		background-color: dimgray;
		height: 45px;
		width: 45px;
		position: absolute;
		border-radius: 50%;
		top: 105px;
		left: 1000px;
	}
	#EditReportsLabel {
		position: absolute;
		font-size: 30px;
		left: 1050px;
		top: 80px;
		font-family: raleway;
		font-weight: bold;	
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
	<p id = "ReportMenuLabel"> Daily Reports</p>
	<!--Place to delete reports-->
	<a href = "DeleteReports.php"><img id = "EditReportsCircle"></a>
	<p id = "EditReportsLabel">Delete a Report </p>
	<!--Table-->
	<table id = "ReportTable">
		<tr><!--Table Headers-->
			<th>Date (YYYY-MM-DD)</th>
			<th>Profit</th>
			<th>Revenue</th>
		</tr>
			<?php //show overall profit and revenue per day
			if ($getProds) {
				while ($row=mysqli_fetch_array($getProds)) {
					$date = $row["$dateCollumn"];
					$revenue = $row["$revenueCollumn"];
					$profit = $row["$profitCollumn"];
					echo "<tr>
					<td>$date </td>
					<td>$profit</td>
					<td> $revenue</td>
					</tr>";
				}
			}
		?>
	</table>
	
</body>
</html>