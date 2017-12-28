<?php
  if($_POST)
  {
    $error = array();

    //start validation
    if(empty($_POST['name'])){
      $error['name1']="this field cant be empty";
    }
    // if(!preg_match("/^[a-zA-Z/'/-\040]+$/", $_POST['stdname'])){
    //   $error['stdname2']="Take only Alphabits";
    // }
    if(empty($_POST['address'])){
      $error['stdusername1']="this field cant be empty";
    }
    if(empty($_POST['contact'])){
      $error['password1']="this field cant be empty";
    }

    if(empty($_POST['product'])){
      $error['password1']="this field cant be empty";
    }

    if(empty($_POST['contact_person'])){
      $error['password1']="this field cant be empty";
    }



    //check errors
    if(count($error)==0)
    {
      include("config.php");

      $sql = "INSERT INTO supplier (name ,address,contact ,product,contact_person) 
          VALUES('".$_POST['name']."','".$_POST['address']."','".$_POST['contact']."','".$_POST['product']."','".$_POST['contact_person']."');";

      if (mysqli_query($con1,$sql)) {
        $msg= "New record created successfully";
      } 
      else {
          echo "Error: " . $sql . "<br>";
      }
      mysqli_close();
      header("location:supplier.php?addmessage=$msg");
      
    }
  }
  

?>

<?php include('header.php');?>

<!-- your main container -->
	<div class="block-flat">
                <div class="header">              
                  <h3>Add Supplier</h3>
                </div>
                <div class="content">
                  <form class="form-horizontal" role="form" method="post">
                    <div class="form-group">
                    <label for="name" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                      <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
                      <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
                    </div>
                  </div>
                    <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Address</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address">
                      <p style="color:red"><?php if (isset($error['stdusername1'])) echo $error['stdusername1']; ?></p>
                      <p style="color:red"><?php if (isset($error['stdusername2'])) echo $error['stdusername2']; ?></p>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="contact" class="col-sm-3 control-label">Contact</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter Contact">
                      <p style="color:red"><?php if (isset($error['stdusername1'])) echo $error['stdusername1']; ?></p>
                      <p style="color:red"><?php if (isset($error['stdusername2'])) echo $error['stdusername2']; ?></p>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="product" class="col-sm-3 control-label">Product</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="product" name="product" placeholder="Enter product">
                      <p style="color:red"><?php if (isset($error['password1'])) echo $error['password1']; ?></p>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="contact_person" class="col-sm-3 control-label">Contact Person</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="contact_person" name="contact_person" placeholder="Enter contact_person">
                      <p style="color:red"><?php if (isset($error['password1'])) echo $error['password1']; ?></p>
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