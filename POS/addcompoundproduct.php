<?php
  if(isset($_POST['submit']))
  {
    // $error = array();

    // //start validation
    // if(empty($_POST['product'])){
    //   $error['name1']="this field cant be empty";
    // }
    // // if(!preg_match("/^[a-zA-Z/'/-\040]+$/", $_POST['stdname'])){
    // //   $error['stdname2']="Take only Alphabits";
    // // }
    // if(empty($_POST['supplier_name'])){
    //   $error['stdusername1']="this field cant be empty";
    // }
    // if(empty($_POST['contact'])){
    //   $error['password1']="this field cant be empty";
    // }

    // if(empty($_POST['quantity'])){
    //   $error['password2']="this field cant be empty";
    // }
    $image;
    $imagepath;
    if (isset ($_FILES['new_image']))
    {
      $imagename = $_FILES['new_image']['name'];
      $source = $_FILES['new_image']['tmp_name'];
      $target = "images/products/".$imagename;
      move_uploaded_file($source, $target);
      $imagepath = $imagename;
      $save = "images/products/" . $imagepath; //This is the new file you saving
      $file = "images/products/" . $imagepath; //This is the original file

      list($width, $height) = getimagesize($file) ;

      $modwidth = 100;

      $diff = $width / $modwidth;

      $modheight = $height / $diff;
      $tn = imagecreatetruecolor($modwidth, $modheight) ;
      $image = imagecreatefromjpeg($file) ;
      imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ;

      imagejpeg($tn, $save, 100) ;
/*
      $save = "images/sml_" . $imagepath; //This is the new file you saving
      $file = "images/" . $imagepath; //This is the original file

      list($width, $height) = getimagesize($file) ;

      $modwidth = 80;

      $diff = $width / $modwidth;

      $modheight = $height / $diff;
      $tn = imagecreatetruecolor($modwidth, $modheight) ;
      $image = imagecreatefromjpeg($file) ;
      imagecopyresampled($tn, $image, 0, 0, 0, 0, $modwidth, $modheight, $width, $height) ;

      imagejpeg($tn, $save, 100) ; */
      // echo "Large image: <img src='images/".$imagepath."'><br>";
      // echo $imagepath;
      //echo "Thumbnail: <img src='images/sml_".$imagepath."'>";
      $image =$imagepath;
    }
    //check errors
    // if(count($error)==0)
    // {
      include("config.php");
      // echo "working";
      //     exit();
      $sql = "INSERT INTO compound_products (compound_product_name, discription,location,image) 
          VALUES('".$_POST['compound_product_name']."','".$_POST['discription']."','".$_POST['location']."','".$image."');";

          // echo $sql;
          // exit();
      if (mysqli_query($con1,$sql)) {
        $msg= "New record created successfully";
      } 
      else {
          echo "Error: " . $sql . "<br>";
      }
      mysqli_close($con1);
      header("location:compound_product.php?addmessage=$msg");
      
    // }
  }
  

?>
<?php
//------------------Image Protion-----------------------
   
  
 ?>

<?php include('header.php');?>

<!-- your main container -->
	<div class="block-flat">
                <div class="header">              
                  <h3>Add Shipment</h3>
                </div>
                <div class="content">
                  <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data"> 
                  <div class="form-group">
                    <label for="compound_product_name" class="col-sm-3 control-label">Product Name</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="compound_product_name" name="compound_product_name" placeholder="Enter Product name">
                      <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
                      <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="discription" class="col-sm-3 control-label">Discription</label>
                    <div class="col-sm-6">
                      <input type="textarea" class="form-control" id="discription" name="discription" placeholder="Enter Product Discription">
                      <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
                      <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="location" class="col-sm-3 control-label">Location</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="location" name="location" placeholder="Enter location">
                      <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
                      <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Image</label>
                    <div class="col-sm-6">
                      <div class="fileinput fileinput-new" data-provides="fileinput">
                          <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                          <div>
                              <span class="btn btn-primary btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input type="file" name="new_image"></span>
                              <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                          </div>
                      </div>
                    </div>
                  </div>               
                  <!-- <div class="form-group">
                    <label class="col-sm-3 control-label" for="supplier_name"> Order ID</label>
                    <div class="col-sm-6">
                      <select class="form-control" id="supplier_name" name="order_id">
                          <option value="1">Select Supplier</option>
                          <?php
                            // include('config.php');
                            //   $myQuery = "SELECT id,product FROM orders";

                            // $result = mysqli_query($con1,$myQuery) or die('Error: ' . mysql_error());
                            
                            //  //mysqli_query($myQuery, $link);
                            // //$num=mysqli_num_rows($result);
                            // mysqli_close($con1);
                            
                            // while ($row = mysqli_fetch_assoc($result))
                            // {
                            //   echo '<option value='.$row['id'].'>' . $row['product'] . '</option>';

                            //}
                            ?>
                        </select>                 
                    </div>
                  </div> -->
                  <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary" name="submit">Sumit</button>
                    <button class="btn btn-default">Cancel</button>
                  </div>
                  </div>
                </form>
              </div>
            </div>

<!-- end main container -->
<?php include('footer.php');?>