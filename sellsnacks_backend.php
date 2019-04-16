<?php
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
$product = $_POST['product'];
$quantity = $_POST['qty'];
settype($quantity, "integer");
$stockQuery = "SELECT amount_product FROM products_snacks WHERE name_product= '$product'";
$getAvailableStock = $conn->query($stockQuery);
$res = mysqli_fetch_row($getAvailableStock);
$availableStock = $res[0]; 
//$availableStock = mysqli_fetch_object($getAvailableStockFromTable);



//select products table

//update quantity of available products
if ($quantity > $zero and $quantity <= $availableStock) {
	$getrow = "SELECT * FROM products_snacks";
	$result = $conn->query($getrow);
	$updateStock = "UPDATE products_snacks
		SET amount_product = amount_product - $quantity, sold_product = sold_product + $quantity, revenue = revenue + ($quantity * price_product)
		WHERE name_product = '$product';
		";
	$updateTable = $conn->query($updateStock);	
	header("Location: Home.php");
	}
elseif ($quantity < $zero){
	echo "<script type='text/javascript'>
	window.confirm('Please select a positive integer.');
	window.location.href = 'Sell_Snacks.php';
	</script>
	";
	}
elseif ($quantity >= $availableStock) {
	echo "<script type='text/javascript'>
	window.confirm('There are not enough goods. Please restock.');
	window.location.href = 'Sell_Snacks.php';
	</script>
	";	
}
?>