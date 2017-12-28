<?php
	//include("login.php");
	include("config.php");
	if (isset($_GET['Id'])){
		$query="SELECT * FROM order_shipment WHERE id =".$_GET['Id'];
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

		$container_no= $data['container_no'];
		$arrival_date = $data['arrival_date'];
		$sent_date = $data['sent_date'];
		$location = $data['location'];
		$order_id = $data['order_id'];
    $supplier_id = $data['supplier_id'];
	} 
	mysqli_close($con1);
	
 ?>
 <?php 
	include("config.php");
		if(isset($_POST['update']))
		{
	        $sql = "UPDATE order_shipment SET `container_no`='".$_POST['container_no']."', `arrival_date`='".$_POST['arrival_date']."', `sent_date`='".$_POST['sent_date']."', `location`='".$_POST['location']."', `order_id`='".$_POST['order_id']."', `supplier_id`='".$_POST['supplier_id']."' WHERE `id`=".$_POST['id'];
	        $result= mysqli_query($con1,$sql);
	        mysqli_close($con1);
	        $af = mysqli_affected_rows($result);
	       if($af < 0){
	                $msg = "fail";
	       }
	        else{
	                $msg = 'Record Updated Successfully...';
	        }
	        
	        header("location:shipment.php?updatemessage=$msg");
        }
        
?>
<?php //echo $name; ?>


<?php include('header.php');?>

<!-- your main container -->
	<div class="block-flat">
                <div class="header">              
                  <h3>Update Shipment</h3>
                </div>
                <div class="content">
                  <form class="form-horizontal" role="form" method="post">
	                  	<div class="form-group">
	                  		<input type="hidden" class="form-control" id="id" value="<?php echo $_GET['Id'] ?>" name="id">
	                	  </div>
	                    <div class="form-group">
                    <label for="container_no" class="col-sm-3 control-label">Conatiner No</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="container_no" name="container_no" value="<?php echo $container_no; ?>" placeholder="Enter Number">
                      <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
                      <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label">Arrival Date</label>
                    <div class="col-sm-6">
                      <div class="input-group date datetime col-md-5 col-xs-7" data-start-view="2" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                        <input class="form-control" size="16" type="text" name="arrival_date" value="<?php echo $arrival_date; ?>">
                        <span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
                      </div>                  
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label">Sent Date</label>
                    <div class="col-sm-6">
                      <div class="input-group date datetime col-md-5 col-xs-7" data-start-view="2" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                        <input class="form-control" size="16" type="text" name="sent_date" value="<?php echo $sent_date; ?>">
                        <span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
                      </div>                  
                    </div>
                  </div>
                  <div class="form-group">
                  <label for="location" class="col-sm-3 control-label">Location</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" id="location" name="location" value="<?php echo $location; ?>" placeholder="Enter Location">
                    <p style="color:red"><?php if (isset($error['stdusername1'])) echo $error['stdusername1']; ?></p>
                    <p style="color:red"><?php if (isset($error['stdusername2'])) echo $error['stdusername2']; ?></p>
                  </div>
                  </div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label" for="order_id"> Order ID</label>
                    <div class="col-sm-6">
                      <select class="form-control" id="order_id" name="order_id">
                          <option value="<?php echo $order_id; ?>">Select Order</option>
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
                    <label class="col-sm-3 control-label" for="supplier_id"> Supplier</label>
                    <div class="col-sm-6">
                      <select class="form-control" id="supplier_id" name="supplier_id">
                          <option value="<?php echo $supplier_id; ?>">Select Supplier</option>
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
                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                    <button class="btn btn-default">Cancel</button>
                  </div>
                  </div>
                  </form>
                </div>
              </div>
<!-- end main container -->
          
<?php include('footer.php');?>
