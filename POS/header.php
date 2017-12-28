
<?php
function createRandomPassword() {
  $chars = "003232303232023232023456789";
  srand((double)microtime()*1000000);
  $i = 0;
  $pass = '' ;
  while ($i <= 7) {

    $num = rand() % 33;

    $tmp = substr($chars, $num, 1);

    $pass = $pass . $tmp;

    $i++;

  }
  return $pass;
}
$finalcode='RS-'.createRandomPassword();
?>



<?php 
//session_start();
?>
<?php
  session_start();
   if (isset($_SESSION['role']) ) 
    {
    if ($_SESSION['role']==1) 
      {
        //echo "<h1>Admin Panal</h1>";
     
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from condorthemes.com/flatdream/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Dec 2014 07:40:29 GMT -->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="shortcut icon" href="images/avatar2.jpg">

	<title>POS</title>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>

	<!-- Bootstrap core CSS -->
	<link href="js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="js/jquery.gritter/css/jquery.gritter.css" />
	<link rel="stylesheet" href="fonts/font-awesome-4/css/font-awesome.min.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="../../assets/js/html5shiv.js"></script>
	  <script src="../../assets/js/respond.min.js"></script>
	<![endif]-->
	<link rel="stylesheet" type="text/css" href="js/jquery.nanoscroller/nanoscroller.css" />

    <link rel="stylesheet" type="text/css" href="js/jquery.codemirror/lib/codemirror.css">
  <link rel="stylesheet" type="text/css" href="js/jquery.codemirror/theme/ambiance.css">
  <link rel="stylesheet" type="text/css" href="js/jquery.vectormaps/jquery-jvectormap-1.2.2.css"  media="screen"/>
  <!-- <link rel="stylesheet" type="text/css" href="js/bootstrap.daterangepicker/daterangepicker-bs3.css" /> -->
  <link rel="stylesheet" type="text/css" href="js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css" />
  <link rel="stylesheet" type="text/css" href="js/jasny.bootstrap/extend/css/jasny-bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="js/jquery.icheck/skins/flat/green.css">
  <link rel="stylesheet" type="text/css" href="js/jquery.select2/select2.css" />

  <link rel="stylesheet" type="text/css" href="js/jquery.datatables/bootstrap-adapter/css/datatables.css" />

  <link rel="stylesheet" type="text/css" href="js/fuelux/css/fuelux.css">
  <link rel="stylesheet" type="text/css" href="js/fuelux/css/fuelux-responsive.min.css">

<link rel="stylesheet" type="text/css" href="js/bootstrap.multiselect/css/bootstrap-multiselect.css"/>
<link rel="stylesheet" type="text/css" href="js/jquery.multiselect/css/multi-select.css" />



	<link href="css/style.css" rel="stylesheet" />	
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

</head>
<body class="animated" onLoad="document.getElementById('country').focus();">

<div id="cl-wrapper">

  <div class="cl-sidebar">
    <div class="cl-toggle"><i class="fa fa-bars"></i></div>
    <div class="cl-navblock">
      <div class="menu-space">
        <div class="content">
          <div class="sidebar-logo">
            <div class="logo">
                <a href="index.php"></a>
            </div>
          </div>
          <ul class="cl-vnavigation">
            <li><a href="home.php"><i class="fa fa-home"></i><span>Home</span></a>
            </li>
            
            <li><a href="orders.php"><i class="fa fa-book"></i><span>Orders</span></a>
            </li>
            <li><a href="shipment.php"><i class="fa fa-male"></i><span>Shipment</span></a>
            </li>
            <li><a href="supplier.php"><i class="fa fa-group"></i><span>Suppliers</span></a>
            </li>
            <li><a href="products.php"><i class="fa  fa-cutlery"></i><span>Products</span></a>
            </li>
            <li><a href="compound_product.php"><i class="fa fa-cutlery"></i><span>Componund Product</span></a>
            </li>
            <li><a href="customers.php"><i class="fa fa-group"></i><span>Customers</span></a>
            </li>
            <li><a href="report.php"><i class="fa fa-edit"></i><span>Reports</span></a>
            </li>
            <li><a href="discount.php"><i class="fa  fa-minus-square"></i><span>Discounts</span></a>
            </li>
            <li><a href="account.php?invoice=<?php echo $finalcode ?>"><i class="fa fa-pencil"></i><span>Saling Products</span></a>
            </li>
            <li><a href="app.php"><i class="fa fa-mobile-phone"></i><span>App</span></a>
            </li>
            <li><a href="settings.php"><i class="fa fa-gear"></i><span>Settings</span></a>
            </li>
            
          </ul>

        </div>
      </div>
    </div>
  </div>
	<div class="container-fluid" id="pcont">
   <!-- TOP NAVBAR -->
  <div id="head-nav" class="navbar navbar-default">
    <div class="container-fluid">
      <!-- new work -->
      <div class="navbar-collapse">
        <ul class="nav navbar-nav navbar-right user-nav">
          <li class="dropdown profile_menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img alt="Avatar" src="images/avatar2.jpg"><span><?php echo $_SESSION['name']; ?></span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">My Account</a></li>
              <li><a href="#">Profile</a></li>
              <li><a href="#">Messages</a></li>
              <li class="divider"></li>
              <li><a href="logout.php">Sign Out</a></li>
            </ul>
          </li>
        </ul> 
      </div>
      <!-- end work -->

      <div class="cl-mcont">
        <div class="row">

<?php
      }
      else
    {
      //echo "<h1>Cashier is online </h1>";
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from condorthemes.com/flatdream/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Dec 2014 07:40:29 GMT -->
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="images/icon.png">

  <title>POS</title>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,400italic,700,800' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Raleway:300,200,100' rel='stylesheet' type='text/css'>

  <!-- Bootstrap core CSS -->
  <link href="js/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="js/jquery.gritter/css/jquery.gritter.css" />
  <link rel="stylesheet" href="fonts/font-awesome-4/css/font-awesome.min.css">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
    <script src="../../assets/js/html5shiv.js"></script>
    <script src="../../assets/js/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" type="text/css" href="js/jquery.nanoscroller/nanoscroller.css" />

    <link rel="stylesheet" type="text/css" href="js/jquery.codemirror/lib/codemirror.css">
  <link rel="stylesheet" type="text/css" href="js/jquery.codemirror/theme/ambiance.css">
  <link rel="stylesheet" type="text/css" href="js/jquery.vectormaps/jquery-jvectormap-1.2.2.css"  media="screen"/>
  <!-- <link rel="stylesheet" type="text/css" href="js/bootstrap.daterangepicker/daterangepicker-bs3.css" /> -->
  <link rel="stylesheet" type="text/css" href="js/bootstrap.datetimepicker/css/bootstrap-datetimepicker.min.css" />
  <link rel="stylesheet" type="text/css" href="js/jasny.bootstrap/extend/css/jasny-bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="js/jquery.icheck/skins/flat/green.css">
  <link rel="stylesheet" type="text/css" href="js/jquery.select2/select2.css" />
  <link rel="stylesheet" type="text/css" href="js/jquery.datatables/bootstrap-adapter/css/datatables.css" />
  
  <link href="css/style.css" rel="stylesheet" />  

   
</head>
<body class="animated">

<div id="cl-wrapper">

  <div class="cl-sidebar">
    <div class="cl-toggle"><i class="fa fa-bars"></i></div>
    <div class="cl-navblock">
      <div class="menu-space">
        <div class="content">
          <div class="sidebar-logo">
            <div class="logo">
                <a href="index.php"></a>
            </div>
          </div>
          <ul class="cl-vnavigation">
            <li><a href="home.php"><i class="fa fa-home"></i><span>Home</span></a>
            </li>
            
            <li><a href="orders.php"><i class="fa fa-book"></i><span>Orders</span></a>
            </li>
            <li><a href="products.php"><i class="fa  fa-male"></i><span>Products</span></a>
            </li>
            <li><a href="customers.php"><i class="fa fa-group"></i><span>Customers</span></a>
            </li>
            <li><a href="supplier.php"><i class="fa fa-group"></i><span>Suppliers</span></a>
            </li>
          </ul>

        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid" id="pcont">
   <!-- TOP NAVBAR -->
  <div id="head-nav" class="navbar navbar-default">
    <div class="container-fluid">
      <!-- new work -->
      <div class="navbar-collapse">
        <ul class="nav navbar-nav navbar-right user-nav">
          <li class="dropdown profile_menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img alt="Avatar" src="images/avatar2.jpg"><span><?php echo $_SESSION['name']; ?></span> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">My Account</a></li>
              <li><a href="#">Profile</a></li>
              <li><a href="#">Messages</a></li>
              <li class="divider"></li>
              <li><a href="logout.php">Sign Out</a></li>
            </ul>
          </li>
        </ul> 
      </div>
      <!-- end work -->

      <div class="cl-mcont">
        <div class="row">
<?php 
   }
  }
?>