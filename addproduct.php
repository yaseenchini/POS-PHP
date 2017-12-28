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
      $sql = "INSERT INTO products (product_code ,product_name,company_name,purchase_cost,sale_price,min_sale_price,product_category,discription,location,batch,image,supplier_id,quantity,shop_quality,discount,arrival_date) 
          VALUES('".$_POST['product_code']."','".$_POST['product_name']."','".$_POST['company_name']."','".$_POST['purchase_cost']."','".$_POST['sale_price']."','".$_POST['min_sale_price']."','".$_POST['product_category']."','".$_POST['discription']."','".$_POST['location']."','".$_POST['batch']."','".$image."','".$_POST['supplier_id']."','".$_POST['quantity']."','".$_POST['shop_quality']."','".$_POST['discount']."','".$_POST['arrival_date']."');";

          // echo $sql;
          // exit();
      if (mysqli_query($con1,$sql)) {
        $msg= "New record created successfully";
      } 
      else {
          echo "Error: " . $sql . "<br>";
      }
      mysqli_close($con1);
      header("location:products.php?addmessage=$msg");
      
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
                    <label for="product_code" class="col-sm-3 control-label">Product Code</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Enter Product Code">
                      <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
                      <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="product_name" class="col-sm-3 control-label">Product Name</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Enter Product name">
                      <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
                      <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="company_name" class="col-sm-3 control-label">Company Name</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Enter Company name">
                      <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
                      <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="purchase_cost" class="col-sm-3 control-label">Purchase Cost</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="purchase_cost" name="purchase_cost" placeholder="Enter Purchase Cost">
                      <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
                      <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="sale_price" class="col-sm-3 control-label">Sale Price</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="sale_price" name="sale_price" placeholder="Enter Sale Price">
                      <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
                      <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="min_sale_price" class="col-sm-3 control-label">Min-Sale Price</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="min_sale_price" name="min_sale_price" placeholder="Enter Min-Sale Price">
                      <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
                      <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="product_category" class="col-sm-3 control-label">Product Category</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="product_category" name="product_category" placeholder="Enter Product Category">
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
                    <label for="batch" class="col-sm-3 control-label">Batch</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="batch" name="batch" placeholder="Enter batch">
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
                  <div class="form-group">
                    <label for="supplier_id" class="col-sm-3 control-label">Supplier ID</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="supplier_id" name="supplier_id" placeholder="Enter supplier id">
                      <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
                      <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="quantity" class="col-sm-3 control-label">Quantity</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="quantity" name="quantity" placeholder="Enter quantity">
                      <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
                      <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="shop_quality" class="col-sm-3 control-label">Shop Quality</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="shop_quality" name="shop_quality" placeholder="Enter Shop Quality">
                      <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
                      <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="discount" class="col-sm-3 control-label">Discount</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="discount" name="discount" placeholder="Enter Discount">
                      <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
                      <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Arrival Date</label>
                    <div class="col-sm-6">
                      <div class="input-group date datetime col-md-5 col-xs-7" data-start-view="2" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                        <input class="form-control" size="16" type="text" name="arrival_date" value="">
                        <span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
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