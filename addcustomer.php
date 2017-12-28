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
      $today = date("Y-m-d", strtotime("now"));
      $sql = "INSERT INTO customers(name ,address,image,phone_number,membership,note,today_date) 
          VALUES('".$_POST['name']."','".$_POST['address']."','".$image."','".$_POST['phone_number']."','".$_POST['membership']."','".$_POST['note']."','".$today."');";
      $sql2 = "INSERT INTO invoices(invoice_no) VALUES('".$_POST['invoice_number']."');";
      mysqli_query($con1,$sql2);
          // echo $sql; 
          // exit();
      if (mysqli_query($con1,$sql)) {
        $msg= "New record created successfully";
      } 
      else {
          echo "Error: " . $sql . "<br>";
      }
      mysqli_close($con1);
      header("location:customers.php?addmessage=$msg");
      
    // }
  }
  

?>
<?php
// function createRandomPassword() {
//   $chars = "003232303232023232023456789";
//   srand((double)microtime()*1000000);
//   $i = 0;
//   $pass = '' ;
//   while ($i <= 7) {

//     $num = rand() % 33;

//     $tmp = substr($chars, $num, 1);

//     $pass = $pass . $tmp;

//     $i++;

//   }
//   return $pass;
// }
// $finalcode='RF-'.createRandomPassword();
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
                    <label for="name" class="col-sm-3 control-label">Name</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Code">
                      <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
                      <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="address" class="col-sm-3 control-label">Adress</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="address" name="address" placeholder="Enter Product name">
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
                    <label for="phone_number" class="col-sm-3 control-label">Phone Number</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Company name">
                      <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
                      <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="membership" class="col-sm-3 control-label">Membership</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="membership" name="membership" placeholder="Enter Purchase Cost">
                      <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
                      <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="note" class="col-sm-3 control-label">Note</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="note" name="note" placeholder="Enter Sale Price">
                      <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
                      <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="invoice_number" class="col-sm-3 control-label">Invoice Number</label>
                    <div class="col-sm-6">
                      <input readonly type="text" class="form-control" id="invoice_number" name="invoice_number" value="<?=$finalcode?>">
                      <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
                      <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
                    </div>
                  </div>
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