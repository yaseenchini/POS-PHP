<?php
	//include("login.php");
	include("config.php");
	if (isset($_GET['Id'])){
		$query="SELECT * FROM users WHERE id =".$_GET['Id'];
		$result= mysqli_query($con1,$query);
		$data = mysqli_fetch_assoc($result);
		// echo $data['Student Name'];
		// echo $data['Father Name'];
		// echo $data['Field'];
		// echo $data['Phone'];
		// echo $data['Address'];
		$name = $data['user_name'];
		$username = $data['email'];
		$password1 = $data['password'];
		$role1 = $data['role'];

	} 
	mysqli_close($con1);
	
 ?>
 <?php 
	include("config.php");
		if(isset($_POST['update']))
		{
	        $sql = "UPDATE users SET `user_name`='".$_POST['name']."', `email`='".$_POST['stdusername']."', `password`='".$_POST['password1']."', `role`='".$_POST['role1']."' WHERE `id`=".$_POST['id'];
	        $result= mysqli_query($con1,$sql);
	        mysqli_close($con1);
	        $af = mysqli_affected_rows($result);
	       if($af < 0){
	                $msg = "fail";
	       }
	        else{
	                $msg = 'Record Updated Successfully...';
	        }
	        
	        header("location:settings.php?updatemessage=$msg");
        }
        
?>



<?php include('header.php');?>

<!-- your main container -->
	<div class="block-flat">
                <div class="header">              
                  <h3>User Registration</h3>
                </div>
                <div class="content">
                  <form class="form-horizontal" role="form" method="post">
	                  	<div class="form-group">
	                  		<input type="hidden" class="form-control" id="id" value="<?php echo $_GET['Id'] ?>" name="id">
	                	</div>
	                    <div class="form-group">
		                    <label for="studentname" class="col-sm-2 control-label">Name</label>
		                    <div class="col-sm-10">
		                      <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" placeholder="Enter Name">
		                      <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
		                      <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
		                    </div>
	                   </div>
	                    <div class="form-group">
		                    <label for="stdaddress" class="col-sm-2 control-label">Username</label>
		                    <div class="col-sm-10">
		                      <input type="text" class="form-control" id="stdusername" name="stdusername" value="<?php echo $username; ?>" placeholder="Enter Address">
		                      <p style="color:red"><?php if (isset($error['stdusername1'])) echo $error['stdusername1']; ?></p>
		                      <p style="color:red"><?php if (isset($error['stdusername2'])) echo $error['stdusername2']; ?></p>
		                    </div>
	                    </div>
	                    <div class="form-group">
		                    <label for="fathername" class="col-sm-2 control-label">Password</label>
		                    <div class="col-sm-10">
		                      <input type="text" class="form-control" id="fathername" name="password1" value="<?php echo $password1; ?>" placeholder="Enter Father Name">
		                      <p style="color:red"><?php if (isset($error['password1'])) echo $error['password1']; ?></p>
		                    </div>
	                    </div>
	                    
	                    <div class="form-group">
			                <label class="col-sm-3 control-label">Role</label>
			                <div class="col-sm-6">
			                	<select class="form-control" name="role1" value="<?php echo $role1; ?>">
				                    <option value="1">Admin</option>
				                    <option value="2">Cashier</option>
			                  	</select>									
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
