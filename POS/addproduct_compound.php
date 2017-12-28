<?php

  if(isset($_POST['submit']))
  {
  	include("config.php");
  	$array_product_id=$_POST['product_id'];
  	$current_quantity;
  	$count_purchase_cost=0;
  	$count_sale_price = 0;
    $allproducts = '';
    $xyz;
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
           $sql = "INSERT INTO p_cp (compound_id ,product_id,quantity) VALUES(".$_POST['id'].",".$product_id.",".$current_quantity.")";
           $result=mysqli_query($con1,$sql);
		    
  	}
    $compoundproducts = rtrim($allproducts,',');
  	echo "purchase_cost: ".$count_purchase_cost;
  	echo "sale cost: ".$count_sale_price;
  	$sql_4  ="UPDATE compound_products SET `purchase_cost`='".$count_purchase_cost."',`sale_price`='".$count_sale_price."',`products`='".$compoundproducts."' WHERE `id`=".$_POST['id'];
      if (mysqli_query($con1,$sql_4)) {
        $msg= "Parts successfully added in compund product";
      } 
      else {
          echo "Error: " . $sql . "<br>";
      }
      mysqli_close($con1);
      header("location:compound_product.php?addmessage=$msg");
      
    // }
  }
  

?>
<script type="text/javascript">
	$(document).ready(function () {
    $('.input_control').change(function () {
        $('input[name=' + this.value + ']')[0].disabled = !this.checked;
    }).change();
});
</script>
<?php include('header.php');?>

<!-- your main container -->

	<!-- <div class="cl-mcont"> -->
    <div class="col-lg-6 col-md-8 col-sm-10 col-xs-12">
      <div class="form-group input-group">
          <input  type="search" id="txtsrc" class="form-control" onkeyup="return KeyUp(this, '#gvdetail');" placeholder="Search. . . " />
          <span class="input-group-btn">
              <button class="btn btn-default" type="button">
                  <i class="fa fa-search"></i>
              </button>
          </span>

      </div>
    </div>
    <div class="clearfix"></div>



        <!-- your main container -->
        <?php
        include("config.php");     
        $query="SELECT id,product_name,sale_price,purchase_cost,quantity FROM products";
        $result=mysqli_query($con1,$query);
        $num=mysqli_num_rows($result);
        mysqli_close($con1);

        ?>
        <div class="block-flat col-xs-12">
	        <div class="header">              
	            <h3>Add Product Parts</h3>
	        </div>
            <div class="content col-xs-12">
            	<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
        		<div class="form-group">
          			<input type="hidden" class="form-control" id="id" value="<?php echo $_GET['Id'] ?>" name="id">
                </div>
	            <table class="col-xs-12" border="0" cellspacing="2" cellpadding="2" id="gvdetail" >
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
		                	<div class="col-sm-6">
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
	          		<div class="form-group">
	                  	<div class="col-sm-offset-2 col-sm-10">
		                    <button type="submit" class="btn btn-primary" name="submit">Sumit</button>
		                    <button class="btn btn-default">Cancel</button>
	                    </div>
	                </div>
	          	</form>
      			</div>
  			</div>
  			
<!-- </div>   -->

<!-- end main container -->


<script type="text/javascript">

        function KeyUp(txtboxID, GridViewID) {
            if ($(txtboxID).val() != "") {

                $(GridViewID).children('tbody').children('tr').each(function () {
                    $(this).show();
                });

                $(GridViewID).children('tbody').children('tr').each(function () {
                    var match = false;
                    if ($(this).text().toUpperCase().indexOf($(txtboxID).val().toUpperCase()) > 0) match = true;
                    if (match) $(this).show();
                    else $(this).hide();
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