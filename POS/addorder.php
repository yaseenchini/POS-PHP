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

    // if(empty($_POST['bill'])){
    //   $error['password3']="this field cant be empty";
    // }



    //check errors
    // if(count($error)==0)
    // {
      include("config.php");
      // echo "working";
      //     exit();
      $sql = "INSERT INTO orders (invoice_no ,product,supplier_id ,quantity,order_date,recieve_date,shipment_id,bill,paid,status) 
          VALUES('".$_POST['invoice_no1']."','".$_POST['product']."','".$_POST['supplier_name']."','".$_POST['quantity']."','".$_POST['order_date']."','".$_POST['recieve_date']."','".$_POST['container_no']."','".$_POST['bill']."','".$_POST['paid']."','".$_POST['status']."');";

          // echo $sql;
          // exit();
      if (mysqli_query($con1,$sql)) {
        $msg= "New record created successfully";
      } 
      else {
          echo "Error: " . $sql . "<br>";
      }
      mysqli_close($con1);
      header("location:orders.php?addmessage=$msg");
      
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
                  <h3>User Registration</h3>
                </div>
                <div class="content">
                  <form class="form-horizontal" role="form" method="post">
                    <div class="form-group">
                      <label for="invoice_no" class="col-sm-3 control-label">Invoice Number</label>
                      <div class="col-sm-6">
                        <input readonly type="text"  class="form-control" id="invoice_no" value="<?php echo $finalcode; ?>" name="invoice_no1">
                      </div>
                    </div>

                    <div class="form-group">
                    <label for="product" class="col-sm-3 control-label">Product</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="product" name="product" placeholder="Enter Name">
                      <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
                      <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
                    </div>
                  </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label" for="supplier_name"> Supplier</label>
                      <div class="col-sm-6">
                        <select class="form-control" id="supplier_name" name="supplier_name">
                            <option value="1">Select Supplier</option>
                            <?php
                              include('config.php');
                                $myQuery = "SELECT id,name FROM supplier";

                              $result = mysqli_query($con1,$myQuery) or die('Error: ' . mysql_error());
                              
                               //mysqli_query($myQuery, $link);
                              //$num=mysqli_num_rows($result);
                              mysqli_close($con1);
                              
                              while ($row = mysqli_fetch_assoc($result))
                              {
                                echo '<option value='.$row['id'].'>' . $row['name'] . '</option>';

                              }
                              ?>
                          </select>                 
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-3 control-label" for="container_no"> Container No</label>
                      <div class="col-sm-6">
                        <select class="form-control" id="container_no" name="container_no">
                            <option value="">Select Container</option>
                            <?php
                              include('config.php');
                                $myQuery = "SELECT id,container_no FROM order_shipment";

                              $result = mysqli_query($con1,$myQuery) or die('Error: ' . mysql_error());
                              
                               //mysqli_query($myQuery, $link);
                              //$num=mysqli_num_rows($result);
                              mysqli_close($con1);
                              
                              while ($row = mysqli_fetch_assoc($result))
                              {
                                echo '<option value='.$row['id'].'>' . $row['container_no'] . '</option>';

                              }
                              ?>
                          </select>                 
                      </div>
                    </div>

                    <div class="form-group">
                    <label for="quantity" class="col-sm-3 control-label">Quantity</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="quantity" name="quantity" value="" placeholder="Enter Quantity">
                      <p style="color:red"><?php if (isset($error['stdusername1'])) echo $error['stdusername1']; ?></p>
                      <p style="color:red"><?php if (isset($error['stdusername2'])) echo $error['stdusername2']; ?></p>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="bill" class="col-sm-3 control-label">Bill</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="bill" name="bill" placeholder="Enter Bill">
                      <p style="color:red"><?php if (isset($error['stdusername1'])) echo $error['stdusername1']; ?></p>
                      <p style="color:red"><?php if (isset($error['stdusername2'])) echo $error['stdusername2']; ?></p>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="paid" class="col-sm-3 control-label">Paid</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="paid" name="paid" placeholder="Enter product">
                    </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Order Date</label>
                      <div class="col-sm-6">
                        <div class="input-group date datetime col-md-5 col-xs-7" data-start-view="2" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                          <input class="form-control" size="16" type="text" name="order_date" value="">
                          <span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
                        </div>                  
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Recieving Date</label>
                      <div class="col-sm-6">
                        <div class="input-group date datetime col-md-5 col-xs-7" data-start-view="2" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                          <input class="form-control" size="16" type="text" name="recieve_date" value="">
                          <span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
                        </div>                  
                      </div>
                    </div>
                    <div class="form-group">
                    <label for="status" class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="status" name="status" placeholder="Enter contact_person">
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