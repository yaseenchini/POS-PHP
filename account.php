
<?php include('header.php');?>


<!-- your main container -->
<div class="block-flat">
<a  href="home.php"><button class="btn btn-default btn-large" style="float: none;"><i class="icon icon-circle-arrow-left icon-large"></i> Back</button></a>
</br></br></br></br>
<form class="form-horizontal" role="form" action="incoming.php" method="post" >
											
<!-- <input type="hidden" name="pt" value="<?php //echo $_GET['id']; ?>" /> -->
	<div class="col-sm-6">
		<input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" />
		<div class="col-sm-4">
			<!-- testing select with search -->
			<!-- <select id="example28" multiple="multiple"></select> -->
			<!-- testing select with search ends -->

			<select name="product" style="width:100%" required>
			<option>select product</option>
				<?php
				include("config.php");
				$sql = "SELECT * FROM products";
				$result = mysqli_query($con1,$sql);
				//$result->bindParam(':userid', $res);
				//$result->execute();
				while ($row = mysqli_fetch_assoc($result))
				{
				?>
					<option value="<?php echo $row['id'];?>"><?php echo $row['product_name']; ?>-<?php echo $row['product_code']; ?>-<?php echo 'qty: '.$row['quantity']; ?></option>
				<?php
				}
				?>
			</select>
		</div>
		<input type="number" name="qty" value="1" min="1" placeholder="Qty" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" / required>
		<input type="hidden" name="discount" value="" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" />
		<input type="hidden" name="date" value="<?php echo date("m/d/y"); ?>" />
		<button type="submit" class="btn btn-info" name="add_product" style="width: 123px; height:35px; margin-top:-5px;" /><i class="icon-plus-sign icon-large"></i> Add</button>
	</div>
	<div class="col-sm-6">
		<!-- <input type="hidden" name="invoice" value="<?php echo $_GET['invoice']; ?>" /> -->
		<div class="col-sm-4">
			<select name="com_product"  style="width:70%;max-height: 150" class="chzn-select" required>
			<option>Select Com-Product</option>
				<?php
				include("config.php");
				$sql = "SELECT * FROM compound_products";
				$result = mysqli_query($con1,$sql);
				//$result->bindParam(':userid', $res);
				//$result->execute();
				while ($row = mysqli_fetch_assoc($result))
				{
				?>
					<option value="<?php echo $row['id'];?>"><?php echo $row['compound_product_name']; ?>-<?php echo 'qty: '.$row['quantity']; ?></option>
				<?php
				}
				?>
			</select>
		</div>
		<input type="number" name="com_qty" value="1" min="1" placeholder="Qty" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" / required>
		<input type="hidden" name="com_discount" value="" autocomplete="off" style="width: 68px; height:30px; padding-top:6px; padding-bottom: 4px; margin-right: 4px; font-size:15px;" />
		<input type="hidden" name="date" value="<?php echo date("m/d/y"); ?>" />
		<button type="submit" class="btn btn-info" name="add_com_product" style="width: 123px; height:35px; margin-top:-5px;" /><i class="icon-plus-sign icon-large"></i> Add</button>
	</div>
</form>
<div class="clearfix"></div>
<table class="table table-bordered" id="resultTable" data-responsive="table">
	<thead>
		<tr>
			<th> Product Name </th>
			<th> Product Code </th>
			<th> Category / Description </th>
			<th> Price </th>
			<th> Qty </th>
			<th> Amount </th>
			<th> Profit </th>
			<th> Action </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
			$id=$_GET['invoice'];
			//echo $id;
			//include('config.php');
			$sql2 = "SELECT * FROM sales_order WHERE type=1 and invoice='".$id."'";
			//echo $sql2;

			// $result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
			// $result->bindParam(':userid', $id);
			// $result->execute();
			// for($i=1; $row = $result->fetch(); $i++){
			$result2 = mysqli_query($con1,$sql2);
			//$result->bindParam(':userid', $res);
			//$result->execute();
			while ($row = mysqli_fetch_assoc($result2))
			{
			?>
			<tr class="record">
			<td hidden><?php echo $row['product']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['product_code']; ?></td>
			<td><?php echo $row['qty'].'|'.$row['name']; ?></td>
			<td>
			<?php
			$ppp= $row['price'];
			echo formatMoney($ppp, true);
			?>
			</td>
			<td><?php echo $row['qty']; ?></td>
			<td>
			<?php
			$dfdf=$row['amount'];
			echo formatMoney($dfdf, true);
			?>
			</td>
			<td>
			<?php
			$profit=$row['profit'];
			echo formatMoney($profit, true);
			?>
			</td>
			<td width="90"><a href="deleteincommingproduct.php?id=<?php echo $row['transaction_id']; ?>&invoice=<?php echo $_GET['invoice']; ?>&qty=<?php echo $row['qty'];?>&code=<?php echo $row['product'];?>"><button class="btn btn-mini btn-warning"><i class="icon icon-remove"></i> Cancel </button></a></td>
			</tr>
			<?php
				}
			?>
			<!-- compund list added start -->

			<?php
			$id=$_GET['invoice'];
			//echo $id;
			//include('config.php');
			$sql2 = "SELECT * FROM sales_order WHERE type=2 and invoice='".$id."'";
			//echo $sql2;

			// $result = $db->prepare("SELECT * FROM sales_order WHERE invoice= :userid");
			// $result->bindParam(':userid', $id);
			// $result->execute();
			// for($i=1; $row = $result->fetch(); $i++){
			$result2 = mysqli_query($con1,$sql2);
			//$result->bindParam(':userid', $res);
			//$result->execute();
			while ($row = mysqli_fetch_assoc($result2))
			{
			?>
			<tr class="record">
			<td hidden><?php echo $row['product']; ?></td>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo 'Nill'; ?></td>
			<td><?php echo $row['product_code']; ?></td>
			<td>
			<?php
			$ppp= $row['price'];
			echo formatMoney($ppp, true);
			?>
			</td>
			<td><?php echo $row['qty']; ?></td>
			<td>
			<?php
			$dfdf=$row['amount'];
			echo formatMoney($dfdf, true);
			?>
			</td>
			<td>
			<?php
			$profit=$row['profit'];
			echo formatMoney($profit, true);
			?>
			</td>
			<td width="90"><a href="deleteincommingcom_product.php?id=<?php echo $row['transaction_id']; ?>&invoice=<?php echo $_GET['invoice']; ?>&qty=<?php echo $row['qty'];?>&code=<?php echo $row['product'];?>"><button class="btn btn-mini btn-cancle"><i class="icon icon-remove"></i> Cancel </button></a></td>
			</tr>
			<?php
				}
			?>



			<!-- compund list added ends -->
			<tr>
			<th> </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			<th>  </th>
			<td> Total Amount: </td>
			<td> Total Profit: </td>
			<!-- <th>  </th> -->
		</tr>
			<tr>
				<th colspan="5"><strong style="font-size: 12px; color: #222222;">Total:</strong></th>
				<td colspan="1"><strong style="font-size: 12px; color: #222222;">
				<?php
				function formatMoney($number, $fractional=false) {
					if ($fractional) {
						$number = sprintf('%.2f', $number);
					}
					while (true) {
						$replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1,$2', $number);
						if ($replaced != $number) {
							$number = $replaced;
						} else {
							break;
						}
					}
					return $number;
				}
				$sdsd=$_GET['invoice'];
				$sql3 = "SELECT sum(amount) FROM sales_order WHERE invoice='".$sdsd."'";
				//$resultas = $db->prepare("SELECT sum(amount) FROM sales_order WHERE invoice= :a");
				//$resultas->bindParam(':a', $sdsd);
				//$resultas->execute();
				//for($i=0; $rowas = $resultas->fetch(); $i++){
				$result3 = mysqli_query($con1,$sql3);
				while ($rowas = mysqli_fetch_assoc($result3))
				{
				$fgfg=$rowas['sum(amount)'];
				echo formatMoney($fgfg, true);
				}
				?>
				</strong></td>
				<td colspan="1"><strong style="font-size: 12px; color: #222222;">
			<?php 
				$sql4 = "SELECT sum(profit) FROM sales_order WHERE invoice='".$sdsd."'";
				// $resulta = $db->prepare("SELECT sum(profit) FROM sales_order WHERE invoice= :b");
				// $resulta->bindParam(':b', $sdsd);
				// $resulta->execute();
				// for($i=0; $qwe = $resulta->fetch(); $i++){
				$result4 = mysqli_query($con1,$sql4);
				mysqli_close($con1);
				while ($rowas = mysqli_fetch_assoc($result4))
				{
				$asd=$rowas['sum(profit)'];
				echo formatMoney($asd, true);
				}
				?>
		
				</td>
				<!-- <th></th> -->
			</tr>
		
	</tbody>
</table>
<br>
<form class="form-horizontal" role="form" action="savesaledetail.php" method="post">
	<div class="form-group">
	  <label class="col-sm-3 control-label" for="customer_id"> Select Customer</label>
	  <div class="col-sm-6">
	    <select class="form-control" id="customer_id" name="customer_id">
	        <option>Select Customer</option>
				<?php
				include("config.php");
				$sql = "SELECT * FROM customers";
				$result = mysqli_query($con1,$sql);
				//$result->bindParam(':userid', $res);
				//$result->execute();
				mysqli_close($con1);
				while ($row = mysqli_fetch_assoc($result))
				{
				?>
					<option value="<?php echo $row['id'];?>"><?php echo $row['name']; ?></option>
				<?php
				}
				?>
	      </select>                 
	  </div>
	</div>
	
	<div class="form-group">
	  <label for="total_price" class="col-sm-3 control-label" id="lblremaining">Total Amount</label>
	  <div class="col-sm-6">
	    <input readonly type="text" class="form-control" id="total_price" name="total_price" value="<?=$fgfg?>">
	  </div>
	</div>
	<div class="form-group">
	  <label for="paid" class="col-sm-3 control-label">Paid</label>
	  <div class="col-sm-6">
	    <input type="number" class="form-control" id="paid" name="paid" onkeyup="return KeyUp(this, '#remaining');">
	  </div>
	</div>
	<div class="form-group">
	  <label for="invoice_number" class="col-sm-3 control-label" >Invoice</label>
	  <div class="col-sm-6">
	    <input readonly type="text" class="form-control" id="invoice_number" name="invoice_number" value="<?php echo $_GET['invoice']?>">
	  </div>
	</div>
	<!-- for holding check buttons -->
	
	<!-- <br><br>
	<div class="form-group">
		<div class="col-sm-6" style="padding-left:30%">	
			<label for="hold" class="col-sm-3 control-label">Hold</label>
			<input type="radio" id="hold" class="form-control iradio_flat-green" name="ans" value="hold">
		</div>
		<div class="col-sm-6">
			<label for="rdpaid" class="col-sm-3 control-label">Full Paiment</label>
			<input id="rdpaid" type="radio" class="form-control iradio_flat-green" name="ans" value="paid">
		</div>
	</div>
	<br><br>
	<div class="form-group">
	  <label for="paid" class="col-sm-3 control-label" id="lblpaid" style="display:none;">Paid</label>
	  <div class="col-sm-6">
	    <input type="text" class="form-control" id="paid" style="display:none;" name="paid" placeholder="Enter Amount">
	  </div>
	</div>
	<div class="form-group">
	  <label for="remaining" class="col-sm-3 control-label" id="lblremaining" style="display:none;">Remaining</label>
	  <div class="col-sm-6">
	    <input readonly type="text" class="form-control" id="remaining" style="display:none;" name="remaining">
	  </div>
	</div>
 -->
 	<div class="form-group">
 	  <div class="col-sm-offset-4">
 	    <button class="btn btn-default" name="cancle">Cancle</button>
 	    <button class="btn btn-success" name="submit">Submit</button>
 	  </div>
 	</div>

</form>
<!-- <a rel="facebox" href="checkout.php?invoice=<?php echo $_GET['invoice']?>&total=<?php echo $fgfg ?>&totalprof=<?php echo $asd ?>&cashier=<?php echo $_SESSION['SESS_FIRST_NAME']?>"><button class="btn btn-success btn-large btn-block"><i class="icon icon-save icon-large"></i> SAVE</button></a> -->
<div class="clearfix"></div>
</div>  




<!-- testing script of select with search -->
<script type="text/javascript">
	$(document).ready(function(){
		$("input[type='radio']").change(function(){
			if($(this).val()=="hold")
			{
			    $("#paid").show();
			    $("#lblpaid").show();
			    $("#remaining").show();
			    $("#lblremaining").show();
			    
			}
			else
			{
			    $("#paid").hide();
			    $("#lblpaid").hide(); 
			    $("#remaining").hide();
			    $("#lblremaining").hide();
			}
			    
			});

	});


</script>



        

<?php include('footer.php');?>



