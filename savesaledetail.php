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
      echo $da = date("Y/m/d");
      //exit();
      $invoice_nu = $_POST['invoice_number']; 
      $sql = "INSERT INTO invoices (invoice_no ,now_date,total_bill ,amount_paid,remaining,recieve_by,customer_id) 
          VALUES('".$_POST['invoice_number']."','".$da."','".$_POST['total_price']."','".$_POST['paid']."','".$re_amt."','".$name."','".$_POST['customer_id']."');";

          // echo $sql;
          // exit();
      if (mysqli_query($con1,$sql)) {
        $msg= "Product Succefully saled";
      } 
      else {
          echo "Error: " . $sql . "<br>";
      }
      mysqli_close($con1);
      header("location:preview.php?invoice=$invoice_nu");
      
    // }
  }



?>

