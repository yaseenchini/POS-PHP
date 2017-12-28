<?php
	include('config.php');
	$id=$_GET['id'];
	$c=$_GET['invoice'];
	$qty=$_GET['qty'];
	$wapak=$_GET['code'];
	//edit qty
	$sql = "UPDATE compound_products 
			SET quantity=quantity+$qty
			WHERE id=".$wapak;
	mysqli_query($con1,$sql);
	// $q->execute(array($qty,$wapak));
	$sql1= "DELETE FROM sales_order WHERE type=2 and transaction_id=".$id;
	mysqli_query($con1,$sql1);
	// $result = $db->prepare("DELETE FROM purchases_item WHERE id= :memid");
	// $result->bindParam(':memid', $id);
	// $result->execute();
	header("location: account.php?invoice=$c");
?>