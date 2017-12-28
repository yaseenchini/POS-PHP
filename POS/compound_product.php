<?php
  if (isset($_GET['addmessage'])){
    $msg = $_GET['addmessage'];
    echo '<script language="javascript">';
    echo 'alert("'.$msg.'")';
    echo '</script>';
  }
  if (isset($_GET['deletemassage'])){
    $msg = $_GET['deletemassage'];
    echo '<script language="javascript">';
    echo 'alert("'.$msg.'")';
    echo '</script>';
  }

  if (isset($_GET['updatemessage'])){
    $msg = $_GET['updatemessage'];
    echo '<script language="javascript">';
    echo 'alert("'.$msg.'")';
    echo '</script>';
  }

?>

 <style  rel="stylesheet" type="text/css">
 /* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(33, 31, 31, 0.81); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: rgba(185, 175, 175, 0.84);
    margin: auto;
    padding: 20px;
    border: 1px solid #888;
    width: 60%;
    height:80%;
    overflow: scroll;
}

/* The Close Button */
.close {
    color: #aaaaaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: #000;
    text-decoration: none;
    cursor: pointer;
}
</style>

<?php include('header.php');?>

<!-- your main container -->

	<!-- <div class="cl-mcont"> -->
    <div class="col-sm-12">
      <div class="input-group">
        <a class="btn btn-primary" name="submit" href="addcompoundproduct.php">Add Product</a>
      </div>
    </div>
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
        $query="SELECT * FROM compound_products";
        $result=mysqli_query($con1,$query);
        $num=mysqli_num_rows($result);
        mysqli_close($con1);

        ?>
        <div class="block-flat col-xs-12">
	        <div class="header">              
	            <h3>Order Records</h3>
	        </div>
            <div class="content col-xs-12">
	            <table class="col-xs-12" border="0" cellspacing="2" cellpadding="2" id="gvdetail" >
		           <tr>
		            <td>
		            <font face="Arial, Helvetica, sans-serif">Id</font>
		            </td>
		            <td>
		            <font face="Arial, Helvetica, sans-serif">Product Name</font>
		            </td>
		            <td>
		            <font face="Arial, Helvetica, sans-serif">Discription</font>
		            </td>
		            <td>
		            <font face="Arial, Helvetica, sans-serif">Location</font>
		            </td>
		            <td>
		            <font face="Arial, Helvetica, sans-serif">Image</font>
		            </td>
		            <td>
		            <font face="Arial, Helvetica, sans-serif">Add Product_parts</font>
		            </td>
		            <td>
		            <font face="Arial, Helvetica, sans-serif">Edit</font>
		            </td>
		            <td>
		            <font face="Arial, Helvetica, sans-serif">Delete</font>
		            </td>
		            <td>
		            <font face="Arial, Helvetica, sans-serif">View Detail</font>
		            </td>
		           </tr>
		              <?php
		              while ($row = mysqli_fetch_assoc($result))
		               {
		                //var_dump($row);
		                 $f1=$row['id'];
		                 $f2=$row['compound_product_name'];
		                 $f3=$row['purchase_cost'];
		                 $f4=$row['sale_price'];
		                 $f5=$row['discription'];
		                 $f6=$row['location'];
		                 $f7=$row['image'];
		                 $f8=$row['quantity'];
		                 $f9=$row['discount'];
		                 $f10=$row['products'];

		               
		              ?>
		              <tr>
		                <td>
		                  <font face="Arial, Helvetica, sans-serif"><?php echo $f1; ?></font>
		                </td>
		                <td>
		                  <font face="Arial, Helvetica, sans-serif"><?php echo $f2; ?></font>
		                </td>
		                <td>
		                  <font face="Arial, Helvetica, sans-serif"><?php echo $f5; ?></font>
		                </td>
		                <td>
		                  <font face="Arial, Helvetica, sans-serif"><?php echo $f6; ?></font>
		                </td>
		                <td>
		                	<?= '<img src="images/products/'.$f7.'" width="100" height="100"/>';?>
		                  <!-- <font face="Arial, Helvetica, sans-serif"><?php echo $f12; ?></font> -->
		                </td>
		                <td>
		                 <a href="addproduct_compound.php?Id=<?php echo $f1; ?>" class="btn btn-info">Add Products</a>
		                </td>
		                <td>
		                 <a href="editshipment.php?Id=<?php echo $f1; ?>" class="btn btn-info">Edit</a>
		                </td>
		                <td>
		                  <a href="deletecompoundproduct.php?id=<?php echo $f1; ?>" onclick="return confirm('Are you sure to delete it !')" class="btn btn-danger btn-rad">Delete</a>
		                </td>
		                <td>              
							<a data-toggle="modal" data-target="#popupModal<?php echo $f1; ?>" class="btn btn-danger btn-primary">View Detail</a>
                   			<div id="popupModal<?php echo $f1; ?>" class="modal">
                 			  <!-- Modal content -->
                 			  <div class="modal-content">
                 			    <span class="close">&times;</span>
                 			    <?= '<img src="images/products/'.$f7.'" width="100" height="100"/>';?>
                 			    <div class="form-group">
			                      <label for="invoice_no" class="col-sm-3 control-label">ID:  <?php echo $f1; ?></label>
			                    </div></br>
			                    <div class="form-group">
			                      <label for="invoice_no" class="col-sm-3 control-label">Product Name:  <?php echo $f2; ?></label>
			                    </div></br>
			                    <div class="form-group">
			                      <label for="invoice_no" class="col-sm-3 control-label">Purchase Cost:  <?php echo $f3; ?></label>
			                    </div></br>
			                    <div class="form-group">
			                      <label for="invoice_no" class="col-sm-3 control-label">Sale Price:  <?php echo $f4; ?></label>
			                    </div></br>
			                    <div class="form-group">
			                      <label for="invoice_no" class="col-sm-3 control-label">Discription:  <?php echo $f5; ?></label>
			                    </div></br><br>
			                    <div class="form-group">
			                      <label for="invoice_no" class="col-sm-3 control-label">Location:  <?php echo $f6; ?></label>
			                    </div></br>
			                    <div class="form-group">
			                      <label for="invoice_no" class="col-sm-3 control-label">Quantity:  <?php echo $f8; ?></label>
			                    </div></br>
			                    <div class="form-group">
			                      <label for="invoice_no" class="col-sm-3 control-label">Discount:  <?php echo $f9; ?></label>
			                    </div></br>
			                    <div class="form-group">
			                      <label for="invoice_no" class="col-sm-3 control-label">Products:  <?php echo $f10; ?></label>
			                    </div>
                 			  </div>
                 			</div>
		                </td>
		              </tr>
		              <?php
		                }
		              ?> 
	          		</table>
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
// $('a[data-toggle="modal"]').on('click', function (e) {

//     //get the pdf link (from the previous element which is a hidden input)
//     //pdf = $(this).prev('.pdf-link').val();

//     //load the pdf in a iframe window placed within the modal
//     //$('.modal-body').html('<iframe src="'+pdf+'"></iframe>');
// });
</script>


          
<?php include('footer.php');?>