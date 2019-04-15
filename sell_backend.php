<?php
$host = "localhost";
$user = "root";
$pass = "";
$db ="tinders";

// initialize
$product = $_POST['product'];
$quantity = $_POST['qty'];

//echo $uname, $pword, $cPass;

// connect to the database
$conn = new mysqli($host,$user,$pass,$db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$getrow = "SELECT name_product, amount_product, sold_product FROM products WHERE (name_product = '".$product."')";
$result = $conn->query($getrow);

$row = mysqli_fetch_array($result);
if ($row["name_product"]) {
	//update quantity of available products
	$updateqtyavailable = mysql_query("
		UPDATE products
		SET amount_product = amount_product - .$quantity., sold_product = sold_product + .$quantity.
		WHERE name_product = '".$product."';
		");
	$conn->query($updateqtyavailable);

	echo "<script type='text/javascript'>
				window.location.href = 'Home.php';
				</script>";
}

?>