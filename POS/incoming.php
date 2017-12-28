<?php
session_start();
include('config.php');
if(isset($_POST['add_product']))
{
	$invoice = $_POST['invoice'];
	$p_id = $_POST['product'];
	$qty = $_POST['qty'];
	// echo $w = $_POST['pt'];
	$date = $_POST['date'];
	$discount = $_POST['discount'];


	$sql = "SELECT * FROM products WHERE id=".$p_id;
	//echo $sql;
	//exit();
	//$result = $db->prepare("SELECT * FROM products WHERE product_id= :userid");
	$result = mysqli_query($con1,$sql);
	while ($row = mysqli_fetch_assoc($result))
	{
		echo $name=$row['product_name'];
		echo $code=$row['product_code'];
		echo $des=$row['discription'];
		echo $p_price=$row['purchase_cost'];
		echo $s_price=$row['sale_price'];

	}

	//edit qty
	$sql_up = "UPDATE products SET quantity=quantity-$qty WHERE id=".$p_id;
	mysqli_query($con1,$sql_up);
	// echo $sql_up;
	// exit();
	//$q = $db->prepare($sql);
	// $q->execute(array($c,$b));
	//$fffffff=$asasa-$discount;
	$pro=$s_price-$p_price;
	$profit=$pro*$qty;
	$total_amount = $qty*$s_price;
	// query

	$sql2 = "INSERT INTO sales_order (invoice,product,qty,amount,name,price,profit,product_code,date,type) VALUES ('".$invoice."','".$p_id."','".$qty."','".$total_amount."','".$name."','".$s_price."','".$profit."','".$code."','".$date."',1)";
	mysqli_query($con1,$sql2);
	//exit();
	//$q = $db->prepare($sql);
	//$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$name,':f'=>$asasa,':h'=>$profit,':i'=>$code,':j'=>$gen,':k'=>$date));
	mysqli_close($con1);

	header("location: account.php?invoice=$invoice");
}
else {
	//echo "second button click";
	$invoice = $_POST['invoice'];
	$p_id = $_POST['com_product'];
	$qty = $_POST['com_qty'];
	// echo $w = $_POST['pt'];
	$date = $_POST['date'];
	$discount = $_POST['com_discount'];


	$sql = "SELECT * FROM compound_products WHERE id=".$p_id;
	//echo $sql;
	//exit();
	//$result = $db->prepare("SELECT * FROM products WHERE product_id= :userid");
	$result = mysqli_query($con1,$sql);
	while ($row = mysqli_fetch_assoc($result))
	{
		echo $name=$row['compound_product_name'];
		//echo $code=$row['product_code'];
		echo $des=$row['products'];
		echo $p_price=$row['purchase_cost'];
		echo $s_price=$row['sale_price'];

	}

	//edit qty
	$sql_up = "UPDATE compound_products SET quantity=quantity-$qty WHERE id=".$p_id;
	mysqli_query($con1,$sql_up);
	 //echo $sql_up;
	 //exit();
	//$q = $db->prepare($sql);
	// $q->execute(array($c,$b));
	//$fffffff=$asasa-$discount;
	$pro=$s_price-$p_price;
	$profit=$pro*$qty;
	$total_amount = $qty*$s_price;
	// query

	$sql2 = "INSERT INTO sales_order (invoice,product,qty,amount,name,price,profit,product_code,date,type) VALUES ('".$invoice."','".$p_id."','".$qty."','".$total_amount."','".$name."','".$s_price."','".$profit."','".$des."','".$date."',2)";
	mysqli_query($con1,$sql2);
	//exit();
	//$q = $db->prepare($sql);
	//$q->execute(array(':a'=>$a,':b'=>$b,':c'=>$c,':d'=>$d,':e'=>$name,':f'=>$asasa,':h'=>$profit,':i'=>$code,':j'=>$gen,':k'=>$date));
	mysqli_close($con1);

	header("location: account.php?invoice=$invoice");
	
}


?>