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


<?php include('header.php');?>

<!-- your main container -->
	
	<div class="cl-mcont">
    <div class="col-sm-12">
      <div class="input-group">
        <a class="btn btn-primary" name="submit" href="addsupplier.php">Add Supplier</a>
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


        <div class="row">

        <!-- your main container -->
        <?php
        include("config.php");     
        $query="SELECT * FROM supplier";
        $result=mysqli_query($con1,$query);
        $num=mysqli_num_rows($result);
        mysqli_close($con1);

        ?>

        <div class="block-flat">
		    <div class="header">              
		    	<h3>Supplier Records</h3>
		    </div>
          <div class="content" >
	           <table border="0" cellspacing="2" cellpadding="2" id="gvdetail">
		           <tr>
		            <td>
		            <font face="Arial, Helvetica, sans-serif">Id</font>
		            </td>
		            <td>
		            <font face="Arial, Helvetica, sans-serif">Name</font>
		            </td>
		            <td>
		            <font face="Arial, Helvetica, sans-serif">Address</font>
		            </td>
		            <td>
		            <font face="Arial, Helvetica, sans-serif">Contact</font>
		            </td>
		            <td>
		            <font face="Arial, Helvetica, sans-serif">Product</font>
		            </td>
		            <td>
		            <font face="Arial, Helvetica, sans-serif">Contact Person</font>
		            </td> 
		            <td>
		            <font face="Arial, Helvetica, sans-serif">Edit</font>
		            </td>
		            <td>
		            <font face="Arial, Helvetica, sans-serif">Delete</font>
		            </td>
		           </tr>
		              <?php
		              while ($row = mysqli_fetch_assoc($result))
		               {
		                //var_dump($row);
		                 $f1=$row['id'];
		                 $f2=$row['name'];
		                 $f3=$row['address'];
		                 $f4=$row['contact'];
		                 $f5=$row['product'];
		                 $f6=$row['contact_person'];
		               
		              ?>
		              <tr>
		                <td>
		                  <font face="Arial, Helvetica, sans-serif"><?php echo $f1; ?></font>
		                </td>
		                <td>
		                  <font face="Arial, Helvetica, sans-serif"><?php echo $f2; ?></font>
		                </td>
		                <td>
		                  <font face="Arial, Helvetica, sans-serif"><?php echo $f3; ?></font>
		                </td>
		                <td>
		                  <font face="Arial, Helvetica, sans-serif"><?php echo $f4; ?></font>
		                </td>
		                <td>
		                  <font face="Arial, Helvetica, sans-serif"><?php echo $f5; ?></font>
		                </td>

		                <td>
		                  <font face="Arial, Helvetica, sans-serif"><?php echo $f6; ?></font>
		                </td>
		                <td>
		                 <a href="editsupplier.php?Id=<?php echo $f1; ?>" class="btn btn-info">Edit</a>
		                </td>
		                <td>
		                  <a href="deletesupplier.php?id=<?php echo $f1; ?>" onclick="return confirm('Are you sure to delete it !')" class="btn btn-danger btn-rad">Delete</a>
		                </td>
		              </tr>
		              <?php
		                }
		              ?>   
          		</table>
      		</div>
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
