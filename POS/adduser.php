<?php
  if($_POST){
    $error = array();

    //start validation
    if(empty($_POST['name'])){
      $error['name1']="this field cant be empty";
    }
    // if(!preg_match("/^[a-zA-Z/'/-\040]+$/", $_POST['stdname'])){
    //   $error['stdname2']="Take only Alphabits";
    // }
    if(empty($_POST['stdusername'])){
      $error['stdusername1']="this field cant be empty";
    }
    if(empty($_POST['password'])){
      $error['password1']="this field cant be empty";
    }



    //check errors
    if(count($error)==0)
    {
      include("config.php");
      $sql = "INSERT INTO users (
          `email` ,
          `password`,
          `user_name`,
          `role`
          ) 
          VALUES('".$_POST['stdusername']."','".$_POST['password']."','".$_POST['name']."','".$_POST['role']."');";

      if (mysqli_query($con1,$sql)) {
        $msg= "New record created successfully";
      } 
      else {
          echo "Error: " . $sql . "<br>";
      }
      mysqli_close();
      header("location:settings.php?addmessage=$msg");
      
    }
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
                    <label for="studentname" class="col-sm-2 control-label">Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                      <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
                      <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
                    </div>
                    <div class="form-group">
                    <label for="stdaddress" class="col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="stdusername" name="stdusername" placeholder="Enter Address">
                      <p style="color:red"><?php if (isset($error['stdusername1'])) echo $error['stdusername1']; ?></p>
                      <p style="color:red"><?php if (isset($error['stdusername2'])) echo $error['stdusername2']; ?></p>
                    </div>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="fathername" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="fathername" name="password" placeholder="Enter Father Name">
                      <p style="color:red"><?php if (isset($error['password1'])) echo $error['password1']; ?></p>
                    </div>
                    </div>
                    
                    <div class="form-group">
  		                <label class="col-sm-3 control-label">Role</label>
  		                <div class="col-sm-6">
  		                	<select class="form-control" name="role">
  			                    <option value="1">Admin</option>
  			                    <option value="2">Cashier</option>
  		                  	</select>									
  		                </div>
		                </div>
                    <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary">Sumit</button>
                      <button class="btn btn-default">Cancel</button>
                    </div>
                    </div>
                  </form>
                </div>
              </div>

<!-- end main container -->
          
<?php include('footer.php');?>
