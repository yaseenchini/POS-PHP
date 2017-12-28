<?php
	//include("login.php");
	include("config.php");
	if (isset($_GET['Id'])){
		$query="SELECT * FROM supplier WHERE id =".$_GET['Id'];
		$result= mysqli_query($con1,$query);
		$data = mysqli_fetch_assoc($result);
		// echo $data['Student Name'];
		// echo $data['Father Name'];
		// echo $data['Field'];
		// echo $data['Phone'];
		// echo $data['Address'];
		// $name = $data['user_name'];
		// $username = $data['email'];
		// $password1 = $data['password'];
		// $role1 = $data['role'];

		$name= $data['name'];
		$address = $data['address'];
		$contact = $data['contact'];
		$product = $data['product'];
		$contact_person = $data['contact_person'];
	} 
	mysqli_close($con1);
	
 ?>
 <?php 
	include("config.php");
		if(isset($_POST['update']))
		{
	        $sql = "UPDATE supplier SET `name`='".$_POST['name']."', `address`='".$_POST['address']."', `contact`='".$_POST['contact']."', `product`='".$_POST['product']."', `contact_person`='".$_POST['contact_person']."' WHERE `id`=".$_POST['id'];
	        $result= mysqli_query($con1,$sql);
	        mysqli_close($con1);
	        $af = mysqli_affected_rows($result);
	       if($af < 0){
	                $msg = "fail";
	       }
	        else{
	                $msg = 'Record Updated Successfully...';
	        }
	        
	        header("location:supplier.php?updatemessage=$msg");
        }
        
?>
<?php //echo $name; ?>


<?php include('header.php');?>

<!-- your main container -->
	<div class="block-flat">
                <div class="header">              
                  <h3>Update Supplier</h3>
                </div>
                <div class="content">
                  <form class="form-horizontal" role="form" method="post">
	                  	<div class="form-group">
	                  		<input type="hidden" class="form-control" id="id" value="<?php echo $_GET['Id'] ?>" name="id">
	                	  </div>
	                    <div class="form-group">
                      <label for="name" class="col-sm-2 control-label">Name</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" placeholder="Enter Name">
                        <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
                        <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
                      </div>
                      <div class="form-group">
                      <label for="address" class="col-sm-2 control-label">Address</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="address" name="address" value="<?php echo $address; ?>" placeholder="Enter Address">
                        <p style="color:red"><?php if (isset($error['stdusername1'])) echo $error['stdusername1']; ?></p>
                        <p style="color:red"><?php if (isset($error['stdusername2'])) echo $error['stdusername2']; ?></p>
                      </div>
                      </div>
                      <div class="form-group">
                      <label for="contact" class="col-sm-2 control-label">Contact</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $contact; ?>" placeholder="Enter Contact">
                        <p style="color:red"><?php if (isset($error['stdusername1'])) echo $error['stdusername1']; ?></p>
                        <p style="color:red"><?php if (isset($error['stdusername2'])) echo $error['stdusername2']; ?></p>
                      </div>
                      </div>
                      </div>
                      <div class="form-group">
                      <label for="product" class="col-sm-2 control-label">Product</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="product" name="product" value="<?php echo $product; ?>"placeholder="Enter product">
                        <p style="color:red"><?php if (isset($error['password1'])) echo $error['password1']; ?></p>
                      </div>
                      </div>
                      <div class="form-group">
                      <label for="contact_person" class="col-sm-2 control-label">Contact Person</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="contact_person" value="<?php echo $contact_person; ?>" name="contact_person" placeholder="Enter contact_person">
                        <p style="color:red"><?php if (isset($error['password1'])) echo $error['password1']; ?></p>
                      </div>
                      </div>
                      <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                        <button class="btn btn-default">Cancel</button>
                      </div>
                      </div>
                  </form>
                </div>
              </div>
<!-- end main container -->
          
<?php include('footer.php');?>
