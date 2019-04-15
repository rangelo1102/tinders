<?php
$host = "localhost";
$user = "root";
$pass = "";
$db ="tinders";

//echo $uname, $pword, $cPass;

// connect to the database

function loadCategories() {
	$conn = new mysqli($host,$user,$pass,$db);
	if ($conn->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
}
	$stmt = $conn->prepare("SELECT * FROM categories");
	$stmt->execute();
	$categs = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $categs;
}
?>