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
        <a class="btn btn-primary" name="submit" href="addorder.php">Add Order</a>
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
        $query="SELECT orders.*,supplier.name,order_shipment.container_no FROM orders left join supplier ON orders.supplier_id = supplier.id left join order_shipment ON orders.shipment_id = order_shipment.id";
        $result=mysqli_query($con1,$query);
        $num=mysqli_num_rows($result);
        mysqli_close($con1);

        ?>
        <div class="block-flat">
          <div class="header">              
            <h3>Order Records</h3>
          </div>
          <div class="content">
           <table border="0" cellspacing="2" cellpadding="2" id="gvdetail" >
           <tr>
            <td>
            <font face="Arial, Helvetica, sans-serif">Id</font>
            </td>
            <td>
            <font face="Arial, Helvetica, sans-serif">Invoice Number</font>
            </td>
            <td>
            <font face="Arial, Helvetica, sans-serif">Product</font>
            </td>
            <td>
            <font face="Arial, Helvetica, sans-serif">Suplier</font>
            </td>
            <td>
            <font face="Arial, Helvetica, sans-serif">Container No</font>
            </td>
            <td>
            <font face="Arial, Helvetica, sans-serif">Quantity</font>
            </td>
            <td>
            <font face="Arial, Helvetica, sans-serif">Order Date</font>
            </td>
            <td>
            <font face="Arial, Helvetica, sans-serif">Recieving Date</font>
            </td>
            <td>
            <font face="Arial, Helvetica, sans-serif">Bill</font>
            </td>
            <td>
            <font face="Arial, Helvetica, sans-serif">Paid</font>
            </td>
             <td>
            <font face="Arial, Helvetica, sans-serif">Status</font>
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
                 $f2=$row['invoice_no'];
                 $f3=$row['product'];
                 $f4=$row['name'];
                 $f41=$row['container_no'];
                 $f5=$row['quantity'];
                 $f6=$row['order_date'];
                 $f7=$row['recieve_date'];
                 $f8=$row['bill'];
                 $f9=$row['paid'];
                 $f10=$row['status'];
               
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
                  <font face="Arial, Helvetica, sans-serif"><?php echo $f41; ?></font>
                </td>
                <td>
                  <font face="Arial, Helvetica, sans-serif"><?php echo $f5; ?></font>
                </td>

                <td>
                  <font face="Arial, Helvetica, sans-serif"><?php echo $f6; ?></font>
                </td>
                <td>
                  <font face="Arial, Helvetica, sans-serif"><?php echo $f7; ?></font>
                </td>
                <td>
                  <font face="Arial, Helvetica, sans-serif"><?php echo $f8; ?></font>
                </td>
                <td>
                  <font face="Arial, Helvetica, sans-serif"><?php echo $f9; ?></font>
                </td>
                <td>
                  <font face="Arial, Helvetica, sans-serif">    
                    <?php
                      $today = date("Y-m-d", strtotime("now"));
                      $expire = $f7; //from db
                      if($today < $expire) 
                      {
                        echo "Pending"; 
                        include("config.php");
                        $sql = "UPDATE orders SET `status`='0' where 'orders'.'id'=".$f1;
                        mysqli_query($con1,$sql);
                        mysqli_close($con1);
                      }
                      elseif($today > $expire)
                      {
                        echo "Completed";
                        include("config.php");
                        $sql = "UPDATE orders SET `status`='1' where 'orders'.'id'=".$f1;
                        mysqli_query($con1,$sql);
                        mysqli_close($con1);
                      }

                    ?>
                     
                  </font>
                </td>
                <td>
                 <a href="editorder.php?Id=<?php echo $f1; ?>" class="btn btn-info">Edit</a>
                </td>
                <td>
                  <a href="deleteorder.php?id=<?php echo $f1; ?>" onclick="return confirm('Are you sure to delete it !')" class="btn btn-danger btn-rad">Delete</a>
                </td>
              </tr>
              <?php
                }
              ?>   

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