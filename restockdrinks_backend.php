<?php
//database credentials
$host = "localhost";
$user = "root";
$pass = "";
$db ="tinders";

//connect to the database
$conn = new mysqli($host,$user,$pass,$db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// initialize; get form html file
$zero = 0;
$dankcount = 0;
//new product
$newprodname = $_POST['newprodname'];
$newprodprice = $_POST['newprodprice']; settype($newprodprice, "integer");
$newprodqty = $_POST['newprodqty'];settype($newprodqty, "integer");
$newprodcost = $_POST['newprodcost'];settype($newprodcost, "integer");
//old product
$oldprodname = $_POST['oldprodname'];
$oldprodprice = $_POST['oldprodprice'];settype($oldprodprice, "integer");
$oldprodqty = $_POST['oldprodqty'];settype($oldprodqty, "integer");
$oldprodcost = $_POST['oldprodcost'];settype($oldprodcost, "integer");
//check stock
$stockQuery = "SELECT amount_product FROM products_drinks WHERE name_product= '".$oldprodname."'";
$getAvailableStock = $conn->query($stockQuery);
$res = mysqli_fetch_row($getAvailableStock);
$availableStock = $res[0]; 

//update new product
if ($newprodname!=""&&$newprodprice!=0&&$newprodqty!=0&&$newprodcost!=0){
	//proceed INSERT INTO 
	if ($newprodprice<$zero||$newprodqty<$zero||$newprodcost<$zero){
		echo "<script type='text/javascript'>
			window.confirm('Only positive input is allowed for new products.');
			window.location.href = 'Restock_Drinks.php';
			</script>";
	}
	else {
	$newprodquery="INSERT INTO products_drinks (name_product, amount_product, price_product, production_cost) 
			VALUES ('".$newprodname."','".$newprodprice."','".$newprodqty."','".$newprodcost."')
	";
	$newproductquery = mysqli_query($conn, $newprodquery);
	$dankcount = $dankcount + 1;
	}
}

//update old product
if ($oldprodname!=""){
	$dankcount = $dankcount + 1;
	if ($oldprodprice<$zero||$oldprodqty<$zero||$oldprodcost<$zero){//check for negative input
		echo "<script type='text/javascript'>
		window.confirm('Please select a positive integer.');
		window.location.href = 'Restock_Drinks.php';
		</script>
		";
	}else{ //accept user input; go through which statements are not null to choose which ones to update
		if ($oldprodprice!=null){
			$updateStock = "UPDATE products_drinks 
							SET price_product = $oldprodprice 
							WHERE name_product = '".$oldprodname."'
							";
			$updateTable = mysqli_query($conn, $updateStock);
		}
		if ($oldprodqty!=null){
			$updateStock = "UPDATE products_drinks 
							SET amount_product = amount_product + $oldprodqty 
							WHERE name_product = '".$oldprodname."'
							";
			$updateTable = mysqli_query($conn, $updateStock);
		}
		if ($oldprodcost!=null){
			$updateStock = "UPDATE products_drinks 
							SET production_cost = $oldprodcost 
							WHERE name_product = '".$oldprodname."'
							";
			$updateTable = mysqli_query($conn, $updateStock);
		}
	}
}

if ($dankcount>=1){
	echo "<script type='text/javascript'>
		window.confirm('You are (a) Successful (Businessman)!');
		window.location.href = 'Restock_Categories.php';
		</script>";
} else{
	echo "<script type='text/javascript'>
		window.confirm('You are (an) Unsuccessful (Businessman)!');
		window.location.href = 'Restock_Categories.php';
		</script>";
}
?>