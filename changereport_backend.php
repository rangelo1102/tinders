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
	$bye = $_POST['date'];
	$deleteRowQuery = "DELETE FROM dailyreports
		WHERE day = '$bye'";

	//delete product
	$result = $conn->query($deleteRowQuery);
	echo "<script type='text/javascript'>
		window.confirm('Delete successful. That day is no longer in the reports.');
		window.location.href = 'DailyReports.php';
		</script>
	";

?>