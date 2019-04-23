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
$newprodprice = $_POST['newprodprice']
$newprodqty = $_POST['newprodqty'];settype($newprodqty, "integer");
$newprodcost = $_POST['newprodcost'];settype($newprodcost, "integer");
//old product
$oldprodname = $_POST['oldprodname'];
$oldprodprice = $_POST['oldprodprice']
$oldprodqty = $_POST['oldprodqty'];settype($oldprodqty, "integer");
$oldprodcost = $_POST['oldprodcost'];settype($oldprodcost, "integer");

//update new product
if (isset($newprodname)&&isset($newprodprice)&&isset($newprodqty)&&isset($newprodcost)){
	//proceed INSERT INTO 
	if ($newprodprice<$zero||$newprodqty<$zero||$newprodqty<$zero){
		echo "<script type='text/javascript'>
			window.confirm('Nice Try Ultron smh');
			window.location.href = 'Restock_Lunch.php';
			</script>"
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
		</script>"
}

//update old product
if (isset($oldprodname)&&isset($oldprodprice)&&isset($oldprodqty)&&isset($oldprodcost)){
	//proceed to UPDATE
	$dankcount = $dankcount + 1;

}else {
	echo "<script type='text/javascript'>
		window.confirm('Please recheck your inputs. Remember to complete all the input boxes!');
		window.location.href = 'Restock_Lunch.php';
		</script>"
}
if ($dankcount<=1&&$dankcount>=1){
	echo "<script type='text/javascript'>
		window.confirm('Please recheck your inputs. Remember to complete all the input boxes!');
		window.location.href = 'Restock_Lunch.php';
		</script>"
}
?>