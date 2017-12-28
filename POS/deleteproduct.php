<?php
	include("config.php");
 	if (isset($_GET['id'])){

        $query1 = "SELECT image from products WHERE id=".$_GET['id'];
       // echo $query;
        $result=mysqli_query($con1,$query1);
        $row = mysqli_fetch_assoc($result);
        $image =-$row['image'];
        $query = "DELETE FROM products WHERE id=".$_GET['id']; 

       $re= mysqli_query($con1,$query);
       $af = mysqli_affected_rows($re);
       if($af < 0){
       		$msg = "fail";
       }
       	else{
       		$msg = 'Record deleted successfully...';
          unlink('images/products/'.$image);
          // echo $image;
          // exit();
       	}
       	header("location:products.php?deletemassage=$msg");
    }
    mysqi_close($con1);
?>

