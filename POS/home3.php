<?php
$total_purchase_price_product=0;
$total_purchase_price_compound= 0;
$total_sale_price_product=0;
$total_sale_price_compound=0;

	if(isset($_POST['products_info']))
	{
	  	include("config.php");
	  	//$array_product_id;
	  	
	  	$array_product_id=$_POST['product_id'];
	  	$current_quantity;
	  	$count_purchase_cost=0;
	  	$count_sale_price = 0;
	    $allproducts = '';
	    $xyz;
	    $compound_total = $_POST['total_price_compound'];
	    $compound_sale = $_POST['sale_price_compound'];
	  	for($i=0; $i<count($array_product_id) ; $i++)
	  	{
	           $product_id = $array_product_id[$i];
	           $current_quantity = $_POST[$array_product_id[$i]];
	           //fetching quantity , cost and purchase price from product table ...
	           $sql_2 = "SELECT product_name,quantity,purchase_cost,sale_price FROM products where id=".$product_id;
	           $result_2=mysqli_query($con1,$sql_2);
		       $row = mysqli_fetch_assoc($result_2); 

	         ///////// storing products in String
	         $product_name=$row['product_name'];
	         $a = $current_quantity;
	         $b = $product_name;
	         $allproducts .= $a . "|". $b .",";

		       //calculating total purchase price
		       $purchase_cost=$row['purchase_cost'];
		       $compound_purchase_cost=$current_quantity*$purchase_cost;
		       $count_purchase_cost = $count_purchase_cost + $compound_purchase_cost;

		       //calculating total sale price
		       $sale_price=$row['sale_price'];
		       $compound_sale_price=$current_quantity*$sale_price;
		       $count_sale_price = $count_sale_price + $compound_sale_price;
		        
		        //updating quantity to product from current quantity
		       $quantity=$row['quantity'];
		       $final_quantity = $quantity-$current_quantity;
	           $sql_3  ="UPDATE products SET `quantity`=".$final_quantity." WHERE `id`=".$product_id;
	           $result_3=mysqli_query($con1,$sql_3);
			    
	  	}

	    $compoundproducts = rtrim($allproducts,',');
	    echo 'product_name: '.$compoundproducts;
	  	echo "purchase_cost: ".$count_purchase_cost;
	  	echo "sale cost: ".$count_sale_price;
	  	$GLOBALS['total_purchase_price_product'] = $compound_total + $count_purchase_cost;
	  	$GLOBALS['total_sale_price_product'] = $compound_sale + $count_sale_price;

	}
  if(isset($_POST['compound_info']))
	{
	  	include("config.php");
	  	if(isset($_POST['compound_id']))
	  	{
	  	$array_comound_product_id=$_POST['compound_id'];
	  	$current_quantity;
	  	$count_purchase_cost=0;
	  	$count_sale_price = 0;
	    $allproducts = '';
	    $xyz;
	    $product_total = $_POST['total_price_product'];
	    $product_sale = $_POST['sale_price_product'];
	    echo "product_total is: ".$product_total;
	  	for($i=0; $i<count($array_comound_product_id) ; $i++)
	  	{
	           $product_id = $array_comound_product_id[$i];
	           $current_quantity = $_POST[$array_comound_product_id[$i]];
	           //fetching quantity , cost and purchase price from product table ...
	           $sql_2 = "SELECT compound_product_name,quantity,purchase_cost,sale_price FROM compound_products where id=".$product_id;
	           $result_2=mysqli_query($con1,$sql_2);
		       $row = mysqli_fetch_assoc($result_2); 

	         ///////// storing products in String
	         $product_name=$row['compound_product_name'];
	         $a = $current_quantity;
	         $b = $product_name;
	         $allproducts .= $a . "|". $b .",";

		       //calculating total purchase price
		       $purchase_cost=$row['purchase_cost'];
		       $compound_purchase_cost=$current_quantity*$purchase_cost;
		       $count_purchase_cost = $count_purchase_cost + $compound_purchase_cost;

		       //calculating total sale price
		       $sale_price=$row['sale_price'];
		       $compound_sale_price=$current_quantity*$sale_price;
		       $count_sale_price = $count_sale_price + $compound_sale_price;
		        
		        //updating quantity to product from current quantity
		       $quantity=$row['quantity'];
		       $final_quantity = $quantity-$current_quantity;
	           //$sql_3  ="UPDATE products SET `quantity`=".$final_quantity." WHERE `id`=".$product_id;
	           //$result_3=mysqli_query($con1,$sql_3);
			    
	  	}

		$compoundproducts = rtrim($allproducts,',');
	    echo 'product_name: '.$compoundproducts;
	  	echo "purchase_cost: ".$count_purchase_cost;
	  	echo "sale cost: ".$count_sale_price;
	  	$GLOBALS['total_purchase_price_compound'] = $product_total + $count_purchase_cost;
	  	$GLOBALS['total_sale_price_compound'] = $product_sale + $count_sale_price;
	  	// exit();
	  }

	} 


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
      session_start();
      $name = '';
       if (isset($_SESSION['role']) ) 
        {
        if ($_SESSION['role']==1) 
          {
          	$name = 'Admin';
          }
          else
          {
          	$name = 'Cashier';
          }
		}
		
      $re_amt = $_POST['total_price'] - $_POST['paid'];
      //echo $re_amt;
      //echo $name;
      //exit();
      $sql = "INSERT INTO invoices (invoice_no ,now_date,total_bill ,amount_paid,remaining,recieve_by,customer_id) 
          VALUES('".$_POST['invoice_number']."','".$_POST['now_date']."','".$_POST['total_price']."','".$_POST['paid']."','".$re_amt."','".$name."','".$_POST['customer_id']."');";

          // echo $sql;
          // exit();
      if (mysqli_query($con1,$sql)) {
        $msg= "New record created successfully";
      } 
      else {
          echo "Error: " . $sql . "<br>";
      }
      mysqli_close($con1);
      header("location:home.php");
      
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

<div class="content col-xs-12">
<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">


            	<!-- Step 1 Start -->
            	<?php
            	include("config.php");     
            	$query="SELECT id,product_name,sale_price,purchase_cost,quantity FROM products";
            	$result=mysqli_query($con1,$query);
            	$num=mysqli_num_rows($result);
            	mysqli_close($con1);

            	?>
              <div class="block-flat col-xs-6 pull-left">
		        <div class="header col-xs-6 pull-left">              
		            <h3>Add Product Parts</h3>
		        </div>
		        <div class="col-xs-6 pull-right">
		              <div class="form-group input-group">
		                  <input  type="search" id="txtsrc" class="form-control" onkeyup="return KeyUp(this, '#gvdetail1');" placeholder="Search. . . " />
		                  <!-- <span class="input-group-btn">
		                      <button class="btn btn-default" type="button">
		                          <i class="fa fa-search"></i>
		                      </button>
		                  </span> -->

		              </div>
		            </div>
		            <div class="clearfix"></div>
	            <div class="content col-xs-12">
	            	<!-- <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data"> -->
	        		<div class="form-group">
	          			<input type="hidden" class="form-control" id="id" value="<?php echo $_GET['Id'] ?>" name="id">
	                </div>
		            <table class="col-xs-12" border="0" cellspacing="2" cellpadding="2" id="gvdetail1" >
			           <tr>
			            <td>
			            <font face="Arial, Helvetica, sans-serif">Select Product</font>
			            </td>
			            <td>
			            <font face="Arial, Helvetica, sans-serif">Product Name</font>
			            </td>
			            <td>
			            <font face="Arial, Helvetica, sans-serif">Quantity</font>
			            </td>
			            <td>
			            <font face="Arial, Helvetica, sans-serif">Purchase</font>
			            </td>
			            <td>
			            <font face="Arial, Helvetica, sans-serif">Sale</font>
			            </td>
			            <td>
			            <font face="Arial, Helvetica, sans-serif">Select Quantity</font>
			            </td>
			           </tr>
			              <?php
			              while ($row = mysqli_fetch_assoc($result))
			               {
			                //var_dump($row);
			                 $f1=$row['id'];
			                 $f2=$row['product_name'];
			                 $f3=$row['quantity'];
			                 $f4=$row['purchase_cost'];
			                 $f5=$row['sale_price'];
			              ?>
			              <tr>
			              	
			                <td>
			                	<div class="form-group">
			                		<input class="input_control" type="checkbox" name="product_id[]" style="margin: 0 20px;" value="<?php echo $f1; ?>">
				                </div>
			                </td>
			                <td>
			                  <font face="Arial, Helvetica, sans-serif"><?php echo $f2; ?></font>
			                </td>
			                <td>
			                  <font face="Arial, Helvetica, sans-serif"><?php echo $f3; ?></font>
			                </td>
			                <td>
			                	<input type="hidden" name="pur[<?php echo $f1;?>]" value="<?php echo $f4; ?>">
			              		<font face="Arial, Helvetica, sans-serif"><?php echo $f4; ?></font>
				            </td>
				            <td>
				            	<input type="hidden" id="sale<?php echo $f1;?>" value="<?php echo $f5; ?>">
				            	<font face="Arial, Helvetica, sans-serif"><?php echo $f5; ?></font>
				            </td>
			                <td>
			                	<div class="">
			                      <input type="text" class="form-control textbox" id="quantity" name="<?php echo $f1; ?>" placeholder="Enter quantity">
		                      <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
		                      <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
			                    </div>
			                </td>
			              </tr>
			              <?php
			                }
			              ?> 
		          		</table>

		          	<!-- </form> -->
	      			</div>
	      			<input readonly type="hidden" class="form-control" id="total_price_product" name="total_price_product" value="<?php echo $total_purchase_price_product;?>">
  		            <input readonly type="hidden" class="form-control" id="sale_price_product" name="sale_price_product" value="<?php echo $total_sale_price_product;?>">
	      			
	      			<div class="clearfix"></div>
	      			
	                <div class="form-group">
	                  <div class="col-sm-offset-2 col-sm-10">
	                    <!-- <button class="btn btn-default">Cancel</button> -->
	                    <button name="products_info" class="next btn btn-primary" >Add Products</button>
	                  </div>
	                </div>									
              </div>

              <!-- Step 1 Ends  -->





              <!-- step 2 starts -->
              <div class="block-flat col-xs-6 pull-right">

              	<?php
            	include("config.php");     
            	$query="SELECT id,compound_product_name,sale_price,purchase_cost,quantity FROM compound_products";
            	$result=mysqli_query($con1,$query);
            	$num=mysqli_num_rows($result);
            	mysqli_close($con1);

            	?>

              		        <div class="header col-xs-6 pull-left">              
              		            <h3> Compound Product</h3>
              		        </div>
              		        <div class="col-xs-6 pull-right">
              		              <div class="form-group input-group">
              		                  <input  type="search" id="txtsrc" class="form-control" onkeyup="return KeyUp(this, '#gvdetail2');" placeholder="Search. . . " />
              		                  <!-- <span class="input-group-btn">
              		                      <button class="btn btn-default" type="button">
              		                          <i class="fa fa-search"></i>
              		                      </button>
              		                  </span> -->

              		              </div>
              		            </div>
              		            <div class="clearfix"></div>
              	            <div class="content col-xs-12">
              	            	<!-- <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data"> -->
              	        		<div class="form-group">
              	          			<input type="hidden" class="form-control" id="id" value="<?php echo $_GET['Id'] ?>" name="id">
              	                </div>
              		            <table class="col-xs-12" border="0" cellspacing="2" cellpadding="2" id="gvdetail2" >
              			           <tr>
              			            <td>
              			            <font face="Arial, Helvetica, sans-serif">Select Product</font>
              			            </td>
              			            <td>
              			            <font face="Arial, Helvetica, sans-serif">Product Name</font>
              			            </td>
              			            <td>
              			            <font face="Arial, Helvetica, sans-serif">Quantity</font>
              			            </td>
              			            <td>
              			            <font face="Arial, Helvetica, sans-serif">Purchase</font>
              			            </td>
              			            <td>
              			            <font face="Arial, Helvetica, sans-serif">Sale</font>
              			            </td>
              			            <td>
              			            <font face="Arial, Helvetica, sans-serif">Select Quantity</font>
              			            </td>
              			           </tr>
              			              <?php
              			              while ($row = mysqli_fetch_assoc($result))
              			               {
              			                //var_dump($row);
              			                 $f1=$row['id'];
              			                 $f2=$row['compound_product_name'];
              			                 $f3=$row['quantity'];
              			                 $f4=$row['purchase_cost'];
              			                 $f5=$row['sale_price'];
              			              ?>
              			              <tr>
              			              	
              			                <td>
              			                	<div class="form-group">
              			                		<input class="input_control" type="checkbox" name="compound_id[]" style="margin: 0 20px;" value="<?php echo $f1; ?>">
              				                </div>
              			                </td>
              			                <td>
              			                  <font face="Arial, Helvetica, sans-serif"><?php echo $f2; ?></font>
              			                </td>
              			                <td>
              			                  <font face="Arial, Helvetica, sans-serif"><?php echo $f3; ?></font>
              			                </td>
              			                <td>
              			                	<input type="hidden" name="pur[<?php echo $f1;?>]" value="<?php echo $f4; ?>">
              			              		<font face="Arial, Helvetica, sans-serif"><?php echo $f4; ?></font>
              				            </td>
              				            <td>
              				            	<input type="hidden" id="sale<?php echo $f1;?>" value="<?php echo $f5; ?>">
              				            	<font face="Arial, Helvetica, sans-serif"><?php echo $f5; ?></font>
              				            </td>
              			                <td>
              			                	<div class="">
              			                      <input type="text" class="form-control textbox" id="quantity" name="<?php echo $f1; ?>" placeholder="Enter quantity">
						                      <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
						                      <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
              			                    </div>
              			                </td>
              			              </tr>
              			              <?php
              			                }
              			              ?> 
              		          		</table>

              		          	<!-- </form> -->
              	      			</div>
              	      			<input readonly type="hidden" class="form-control" id="total_price_compound" name="total_price_compound" value="<?php echo $total_purchase_price_compound;?>">
              					<input type="hidden" class="form-control" id="sale_price_compound" name="sale_price_compound" value="<?php echo $total_sale_price_compound;?>">
              	      			
              	      		<div class="clearfix"></div>

                <div class="form-group">
                  <div class="col-sm-offset-2 col-sm-10">
                    <!-- <button class="btn btn-default wizard-previous">Previous</button> -->
                    <button class="btn btn-primary" name="compound_info">Add Compound</button>
                  </div>
                </div>	
              </div>

              <!-- step 2 ends -->
              <div class="block-flat col-xs-12">
                <div class="clearfix"></div>
              	                <div class="form-group">
              	                  <label for="invoice_number" class="col-sm-3 control-label">Invoice Number</label>
              	                  <div class="col-sm-6">
              	                    <input readonly type="text" class="form-control" id="invoice_number" name="invoice_number" value="<?=$finalcode?>">
              	                  </div>
              	                </div>
              	                <div class="form-group">
              	                  <label for="invoice_number" class="col-sm-3 control-label">Date </label>
              	                  <div class="col-sm-6">
              	                    <input readonly type="text" class="form-control" id="now_date" name="now_date" value="<?=date("Y/m/d")?>">
              	                  </div>
              	                </div>
              	                <div class="form-group">
              	                  <label class="col-sm-3 control-label" for="customer_id"> Customer</label>
              	                  <div class="col-sm-6">
              	                    <select class="form-control" id="customer_id" name="customer_id">
              	                        <option value="">Select Container</option>
              	                        <?php
              	                          include('config.php');
              	                            $myQuery = "SELECT id,name FROM customers";

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
                	                <label for="total_price" class="col-sm-3 control-label">Purchase Price</label>
                	                <div class="col-sm-6">
                	                  <input readonly type="text" class="form-control" id="total_price" name="total_sale_price" value="<?php echo $total_purchase_price_product+$total_purchase_price_compound;?>">
                	                </div>
                                </div>
                                <div class="form-group">
                	                <label for="total_price" class="col-sm-3 control-label">Sale Price</label>
                	                <div class="col-sm-6">
                	                  <input readonly type="text" class="form-control" id="total_price" name="total_price" value="<?php echo $total_sale_price_product+$total_sale_price_compound;?>">
                	                </div>
                                </div>
                                <div class="form-group">
                	                <label for="total_price" class="col-sm-3 control-label">Discount</label>
                	                <div class="col-sm-6">
                	                  <input type="text" class="form-control" id="total_price" name="total_price" placeholder="Enter Product name">
                	                  <p style="color:red"><?php if (isset($error['name1'])) echo $error['name1']; ?></p>
                	                  <p style="color:red"><?php if (isset($error['name2'])) echo $error['name2']; ?></p>
                	                </div>
                                </div>
                      			<div class="form-group">
                	                <label for="total_price" class="col-sm-3 control-label">Total Price</label>
                	                <div class="col-sm-6">
                	                  <input readonly type="text" class="form-control" id="total_price" name="total_price" value="<?php echo $total_sale_price_product+$total_sale_price_compound;?>">
                	                </div>
                                </div>
                                <div class="form-group">
                	                <label for="total_price" class="col-sm-3 control-label">Paid</label>
                	                <div class="col-sm-6">
                	                  <input type="text" class="form-control" id="paid" name="paid" placeholder="Enter paid amount">
                	                </div>
                                </div>
                <div class="form-group">
                  <div class="col-sm-offset-4">
                    <button class="btn btn-default" name="cancle">Cancle</button>
                    <button class="btn btn-success" name="submit">Submit</button>
                  </div>
                </div>	
              </div>
            </form>



</div>

<!-- end main container -->


<script type="text/javascript">
	

        function KeyUp(txtboxID, GridViewID) {
            if ($(txtboxID).val() != "") {

                $(GridViewID).children('tbody').children('tr').each(function () {
                    $(this).show();
                });

                $(GridViewID).children('tbody').children('tr').each(function () {
                    var match = false;
                    if ($(this).text().toUpperCase().indexOf($(txtboxID).val().toUpperCase()) > 0) 
                    	match = true;
                    if (match) 
                    	$(this).show();
                    else 
                    	$(this).hide();
                });
            }
            else {

                $(GridViewID).children('tbody').children('tr').each(function () {
                    $(this).show();
                });
            }
        }
</script>
          
<?php include('footer.php');?>
