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

	//get product to delete
	$bye = $_POST['product'];
	$deleteRowQuery = "DELETE FROM products_drinks
		WHERE name_product = '$bye'";

	//delete products
	$result = $conn->query($deleteRowQuery);
	echo "<script type='text/javascript'>
		window.confirm('Delete successful. Item is no longer in inventory.');
		window.location.href = 'ChangeStock_Categories.php';
		</script>
	";

?>