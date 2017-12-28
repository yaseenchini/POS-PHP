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
      $sql = "INSERT INTO order_shipment (container_no ,arrival_date,sent_date ,location,order_id,supplier_id) 
          VALUES('".$_POST['container_no']."','".$_POST['arrival_date']."','".$_POST['sent_date']."','".$_POST['location']."','".$_POST['order_id']."','".$_POST['supplier_id']."');";

          // echo $sql;
          // exit();
      if (mysqli_query($con1,$sql)) {
        $msg= "New record created successfully";
      } 
      else {
          echo "Error: " . $sql . "<br>";
      }
      mysqli_close($con1);
      header("location:shipment.php?addmessage=$msg");
      
    // }
  }
  

?>


<?php include('header.php');?>

<!-- your main container -->
	<div class="block-flat">
                <div class="header">              
                  <h3>Add Shipment</h3>
                </div>
                <div class="content">
                  <form class="form-horizontal" role="form" method="post">
                  <div class="form-group">
                    <label for="container_no" class="col-sm-3 control-label">Conatiner No</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="container_no" name="container_no" placeholder="Enter Number">
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
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Sent Date</label>
                    <div class="col-sm-6">
                      <div class="input-group date datetime col-md-5 col-xs-7" data-start-view="2" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                        <input class="form-control" size="16" type="text" name="sent_date" value="">
                        <span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
                      </div>                  
                    </div>
                  </div>
                  <div class="form-group">
                  <label for="location" class="col-sm-3 control-label">Location</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="location" name="location" value="" placeholder="Enter Location">
                    <p style="color:red"><?php if (isset($error['stdusername1'])) echo $error['stdusername1']; ?></p>
                    <p style="color:red"><?php if (isset($error['stdusername2'])) echo $error['stdusername2']; ?></p>
                  </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="supplier_name"> Order ID</label>
                    <div class="col-sm-6">
                      <select class="form-control" id="supplier_name" name="order_id">
                          <option value="1">Select Supplier</option>
                          <?php
                            include('config.php');
                              $myQuery = "SELECT id,product FROM orders";

                            $result = mysqli_query($con1,$myQuery) or die('Error: ' . mysql_error());
                            
                             //mysqli_query($myQuery, $link);
                            //$num=mysqli_num_rows($result);
                            mysqli_close($con1);
                            
                            while ($row = mysqli_fetch_assoc($result))
                            {
                              echo '<option value='.$row['id'].'>' . $row['product'] . '</option>';

                            }
                            ?>
                        </select>                 
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="supplier_name"> Supplier</label>
                    <div class="col-sm-6">
                      <select class="form-control" id="supplier_name" name="supplier_id">
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