<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "tinders";

	//connecting to db 
	$conn = new mysqli($host,$user,$pass,$db);
	if ($conn->connect_error) {
    			die("Connection failed: " . $conn->connect_error);
			}

	$bye = $_POST['product'];
	$deleteRowQuery = "DELETE FROM products_lunch
		WHERE name_product = '$bye'";

	$result = $conn->query($deleteRowQuery);
	echo "<script type='text/javascript'>
		window.confirm('Delete successful. Item is no longer in inventory.');
		window.location.href = 'ChangeStock_Categories.php';
		</script>
	";

?>