<?php
$invoice=$_GET['invoice'];
$date = date('d/m/y');
?>


<?php include('header.php');?>

<script language="javascript">
function Clickheretoprint()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=800, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('</head><body onLoad="self.print()" style="width: 800px; font-size: 13px; font-family: arial;">');          
   docprint.document.write(content_vlue); 
   docprint.document.close(); 
   docprint.focus(); 
}
</script>
<div class="block-flat">
	<a href="account.php?id=cash&invoice=<?php echo $finalcode ?>"><button class="btn btn-default"><i class="icon-arrow-left"></i> Back to Sales</button></a>

	<div id="content">
	<div>
	<div>
	<center><div style="font:bold 25px 'Aleo';">Sales Receipt</div>
	Company Name's	<br>
	Address,Phone no etc	<br>	<br>
	</center>
	<!-- <div>
	<?php
	// $resulta = $db->prepare("SELECT * FROM customer WHERE customer_name= :a");
	// $resulta->bindParam(':a', $cname);
	// $resulta->execute();
	// for($i=0; $rowa = $resulta->fetch(); $i++){
	// $address=$rowa['address'];
	// $contact=$rowa['contact'];
	// }
	?>
	</div> -->
	</div>
	<div style="float: left;">
	<table cellpadding="3" cellspacing="0" style="font-family: arial; font-size: 12px;text-align:left;width : 100%;">

		<tr>
			<td>OR No. :</td>
			<td><?php echo $invoice ?></td>
		</tr>
		<tr>
			<td>Date :</td>
			<td><?php echo $date ?></td>
		</tr>
	</table>
	
	</div>
	<div class="clearfix"></div>
	</div>
	<div style="width: 100%; margin-top:-70px;">
	<table border="1" cellpadding="4" cellspacing="0" style="font-family: arial; font-size: 12px;	text-align:left;" width="100%">
		<thead>
			<tr>
				<th width="90"> Product Code </th>
				<th> Product Name </th>
				<th> Qty </th>
				<th> Price </th>
				<th> Discount </th>
				<th> Amount </th>
			</tr>
		</thead>
		<tbody>
			
				<?php
				include("config.php");
				$id=$_GET['invoice'];
				$sql ="SELECT * FROM sales_order WHERE invoice='".$id."'";
				$result4 = mysqli_query($con1,$sql);
				mysqli_close($con1);
				while ($row = mysqli_fetch_assoc($result4))
				{
				?>
				<tr class="record">
				<td><?php echo $row['product_code']; ?></td>
				<td><?php echo $row['name']; ?></td>
				<td><?php echo $row['qty']; ?></td>
				<td>
				<?php
				$ppp=$row['price'];
				echo formatMoney($ppp, true);
				?>
				</td>
				<td>
				<?php
				$ddd=$row['discount'];
				echo formatMoney($ddd, true);
				?>
				</td>
				<td>
				<?php
				$dfdf=$row['amount'];
				echo formatMoney($dfdf, true);
				?>
				</td>
				</tr>
				<?php
					}
				?>
			
				<tr>
					<td colspan="5" style=" text-align:right;"><strong style="font-size: 12px;">Total: &nbsp;</strong></td>
					<td colspan="2"><strong style="font-size: 12px;">
					<?php
					$sdsd=$_GET['invoice'];
					include("config.php");
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
				</tr>
				<?php //if($pt=='cash'){
				?>
				<tr>
					<td colspan="5"style=" text-align:right;"><strong style="font-size: 12px; color: #222222;">Paid:&nbsp;</strong></td>
					<td colspan="2"><strong style="font-size: 12px; color: #222222;">
					<?php
					include("config.php");
					$sql5 = "SELECT * FROM invoices WHERE invoice_no='".$sdsd."'";
					//$resultas = $db->prepare("SELECT sum(amount) FROM sales_order WHERE invoice= :a");
					//$resultas->bindParam(':a', $sdsd);
					//$resultas->execute();
					//for($i=0; $rowas = $resultas->fetch(); $i++){
					$result5 = mysqli_query($con1,$sql5);
					while ($rowas = mysqli_fetch_assoc($result5))
					{
					$pa=$rowas['amount_paid'];
					$re=$rowas['remaining'];
					echo formatMoney($pa, true);
					}
					?>
					</strong></td>
				</tr>
				<?php
				//}
				?>
				<tr>
					<td colspan="5" style=" text-align:right;"><strong style="font-size: 12px; color: #222222;">
					<font style="font-size:20px;">
					<?php
					//if($pt=='cash'){
					echo 'Remaining:';
					//}
					// if($pt=='credit'){
					// echo 'Due Date:';
					// }
					?>&nbsp;
					</strong></td>
					<td colspan="2"><strong style="font-size: 15px; color: #222222;">
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
					echo formatMoney($re, true);
					?>
					</strong></td>
				</tr>
			
		</tbody>
	</table>
	
	</div>
	
	</div><br><br>
	<div class="pull-right" style="margin-right:100px;">
		<a href="javascript:Clickheretoprint()" style="font-size:20px;"><button class="btn btn-success btn-large"><i class="icon-print"></i> Print</button></a>
	</div>	<br><br><br>

	</div>
<?php include('footer.php');?>