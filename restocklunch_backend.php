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
$newprodprice = $_POST['newprodprice'];
$newprodqty = $_POST['newprodqty'];settype($newprodqty, "integer");
$newprodcost = $_POST['newprodcost'];settype($newprodcost, "integer");
//old product
$oldprodname = $_POST['oldprodname'];
$oldprodprice = $_POST['oldprodprice'];
$oldprodqty = $_POST['oldprodqty'];settype($oldprodqty, "integer");
$oldprodcost = $_POST['oldprodcost'];settype($oldprodcost, "integer");
//check stock
$stockQuery = "SELECT amount_product FROM products_lunch WHERE name_product= '".$oldprodname."'";
$getAvailableStock = $conn->query($stockQuery);
$res = mysqli_fetch_row($getAvailableStock);
$availableStock = $res[0]; 

//update new product
if (isset($newprodname)&&isset($newprodprice)&&isset($newprodqty)&&isset($newprodcost)){
	//proceed INSERT INTO 
	if ($newprodprice<$zero||$newprodqty<$zero||$newprodqty<$zero){
		echo "<script type='text/javascript'>
			window.confirm('Nice Try Ultron smh');
			window.location.href = 'Restock_Lunch.php';
			</script>";
	}else{
	$newprodquery="INSERT INTO products_lunch (name_product, amount_product, price_product, production_cost) 
			VALUES ('".$newprodname."','".$newprodprice."','".$newprodqty."','".$newprodcost."')
	";
	$newproductquery = mysqli_query($conn, $newprodquery);
	$dankcount = $dankcount + 1;
}
}else {
	echo "<script type='text/javascript'>
		window.confirm('Please recheck your inputs. Remember to complete all the input boxes!');
		window.location.href = 'Restock_Lunch.php';
		</script>";
}

//update old product
if (isset($oldprodname)&&isset($oldprodprice)&&isset($oldprodqty)&&isset($oldprodcost)){
	//proceed to UPDATE
	$dankcount = $dankcount + 1;
	if ($oldprodqty > $zero and $oldprodqty <= $availableStock) { //update stock given proper credentials
		$getrow = "SELECT * FROM products_lunch";
		$result = $conn->query($getrow);
		$updateStock = "UPDATE products_lunch
			SET amount_product = amount_product + $oldprodqty, price_product = $oldprodprice, production_cost = $oldprodcost)
			WHERE name_product = '".$oldprodname."';
			";
		$updateTable = $conn->query($updateStock);	
		echo "<script type='text/javascript'>
			window.confirm('Restock successful.');
			window.location.href = 'Restock_Categories.php';
			</script>
		";
	}elseif ($quantity < $zero){ //prevent negative input
		echo "<script type='text/javascript'>
		window.confirm('Please select a positive integer.');
		window.location.href = 'Restock_Lunch.php';
		</script>
		";
		}
}else {
	echo "<script type='text/javascript'>
		window.confirm('Please recheck your inputs. Remember to complete all the input boxes!');
		window.location.href = 'Restock_Lunch.php';
		</script>";
}

if ($dankcount<=1){
	echo "<script type='text/javascript'>
		window.confirm('You are (a) Successful (Businessman)!');
		window.location.href = 'Restock_Lunch.php';
		</script>";
}
?>