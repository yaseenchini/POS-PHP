<?php
	//include("login.php");
	include("config.php");
	if (isset($_GET['Id'])){
		$query="SELECT * FROM orders WHERE id =".$_GET['Id'];
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

		$invoice_no= $data['invoice_no'];
		$product = $data['product'];
		$name = $data['supplier_id'];
		$container_no = $data['shipment_id'];
		$quantity = $data['quantity'];
		$order_date = $data['order_date'];
		$recieve_date = $data['recieve_date'];
		$bill = $data['bill'];
		$paid = $data['paid'];
		$status = $data['status'];
		     

	} 
	mysqli_close($con1);
	
 ?>
 <?php 
	include("config.php");
		if(isset($_POST['update']))
		{
	        $sql = "UPDATE orders SET `invoice_no`='".$_POST['invoice_no']."', `product`='".$_POST['product']."', `supplier_id`='".$_POST['supplier_name']."', `quantity`='".$_POST['quantity']."', `order_date`='".$_POST['order_date']."', `recieve_date`='".$_POST['recieve_date']."', `shipment_id`='".$_POST['container_no']."', `bill`='".$_POST['bill']."', `paid`='".$_POST['paid']."', `status`='".$_POST['status']."' WHERE `id`=".$_POST['id'];
	        $result= mysqli_query($con1,$sql);
	        mysqli_close($con1);
	        $af = mysqli_affected_rows($result);
	       if($af < 0){
	                $msg = "fail";
	       }
	        else{
	                $msg = 'Record Updated Successfully...';
	        }
	        
	        header("location:orders.php?updatemessage=$msg");
        }
        
?>
<?php //echo $name; ?>


<?php include('header.php');?>

<!-- your main container -->
	<div class="block-flat">
                <div class="header">              
                  <h3>Update Order</h3>
                </div>
                <div class="content">
                  <form class="form-horizontal" role="form" method="post">
	                  	<div class="form-group">
	                  		<input type="hidden" class="form-control" id="id" value="<?php echo $_GET['Id'] ?>" name="id">
	                	  </div>
	                    <div class="form-group">
                      <label for="invoice_no" class="col-sm-3 control-label">Invoice Number</label>
                      <div class="col-sm-6">
                        <input type="text"  class="form-control" disabled="disabled" id="product" name="invoice_no" value="<?php echo $invoice_no; ?>" placeholder="Disabled input text">
                      </div>
                    </div>

                    <div class="form-group">
                    <label for="product" class="col-sm-3 control-label">Product</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="product" name="product" value="<?php echo $product; ?>" placeholder="Enter Name">
                      <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
                      <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
                    </div>
                  </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label" for="supplier_name"> Supplier</label>
                      <div class="col-sm-6">
                        <select class="form-control" id="supplier_name" value="<?php echo $name; ?>" name="supplier_name">
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
                        <select class="form-control" id="container_no" value="<?php echo $container_no; ?>"name="container_no">
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
                      <input type="text" class="form-control" id="quantity" name="quantity" value="<?php echo $quantity; ?>" placeholder="Enter Quantity">
                      <p style="color:red"><?php if (isset($error['stdusername1'])) echo $error['stdusername1']; ?></p>
                      <p style="color:red"><?php if (isset($error['stdusername2'])) echo $error['stdusername2']; ?></p>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="bill" class="col-sm-3 control-label">Bill</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="bill" name="bill" value="<?php echo $bill; ?>" placeholder="Enter Bill">
                      <p style="color:red"><?php if (isset($error['stdusername1'])) echo $error['stdusername1']; ?></p>
                      <p style="color:red"><?php if (isset($error['stdusername2'])) echo $error['stdusername2']; ?></p>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="paid" class="col-sm-3 control-label">Paid</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="paid" value="<?php echo $paid; ?>" name="paid" placeholder="Enter product">
                    </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Order Date</label>
                      <div class="col-sm-6">
                        <div class="input-group date datetime col-md-5 col-xs-7" data-start-view="2" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                          <input class="form-control" size="16" type="text" name="order_date" value="<?php echo $order_date; ?>">
                          <span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
                        </div>                  
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Recieving Date</label>
                      <div class="col-sm-6">
                        <div class="input-group date datetime col-md-5 col-xs-7" data-start-view="2" data-date="1979-09-16T05:25:07Z" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                          <input class="form-control" size="16" type="text" name="recieve_date" value="<?php echo $recieve_date; ?>">
                          <span class="input-group-addon btn btn-primary"><span class="glyphicon glyphicon-th"></span></span>
                        </div>                  
                      </div>
                    </div>
                    <div class="form-group">
                    <label for="status" class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="status" name="status" value="<?php echo $status; ?>"placeholder="Enter contact_person">
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
