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
$product = $_POST['product'];
$quantity = $_POST['qty'];
settype($quantity, "integer");
$stockQuery = "SELECT amount_product FROM products_drinks WHERE name_product= '$product'";
$getAvailableStock = $conn->query($stockQuery);
$res = mysqli_fetch_row($getAvailableStock);
$availableStock = $res[0]; 


//update quantity of available products
if ($quantity > $zero and $quantity <= $availableStock) { //update stock given proper credentials
	$getrow = "SELECT * FROM products_drinks";
	$result = $conn->query($getrow);
	$updateStock = "UPDATE products_drinks
		SET amount_product = amount_product - $quantity, sold_product = sold_product + $quantity, revenue = revenue + ($quantity * price_product)
		WHERE name_product = '$product';
		";
	$updateTable = $conn->query($updateStock);	
	echo "<script type='text/javascript'>
		window.confirm('Sale successful.');
		window.location.href = 'Sell_Categories.php';
		</script>
	";
	}
elseif ($quantity < $zero){ //prevent negative input
	echo "<script type='text/javascript'>
	window.confirm('Please select a positive integer.');
	window.location.href = 'Sell_Drinks.php';
	</script>
	";
	}
elseif ($quantity >= $availableStock) { //prevent inputting demand than available stock
	echo "<script type='text/javascript'>
	window.confirm('There are not enough goods. Please restock.');
	window.location.href = 'Sell_Drinks.php';
	</script>
	";	
}
?>