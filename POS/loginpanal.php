<?php
	include ("config.php");
	session_start();
	
	if(isset($_POST['submit']))
	{
		$username = $_POST['txtusername'];
		$password = $_POST['txtpassword'];
		
		$query = "SELECT * FROM users WHERE email='".$username."' and password='".$password."'";

		$result = mysqli_query($con1,$query);
			if(mysqli_num_rows($result)>0){
				$nam = mysqli_fetch_assoc($result);
				$name = $nam['user_name'];
				$role = $nam['role'];
				$_SESSION['name'] = $name;
				$_SESSION['role'] = $role;
				//header("Location:home.php");
			}
			else
			{	
				echo '<script language="javascript">';
		    	echo 'alert("invalid  username or password")';
		   		echo '</script>';
			}

	}
	
    if (isset($_SESSION['role']) ) 
    {
    	header('Location:home.php');
    	
    }
	  
	

?>

<html lang="en">

<!-- Mirrored from condorthemes.com/flatdream/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Dec 2014 07:45:26 GMT -->
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

	<link rel="stylesheet" href="fonts/font-awesome-4/css/font-awesome.min.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="../../assets/js/html5shiv.js"></script>
	  <script src="../../assets/js/respond.min.js"></script>
	<![endif]-->

	<!-- Custom styles for this template -->
	<link href="css/style.css" rel="stylesheet" />	

</head>

<body class="texture">

<div id="cl-wrapper" class="login-container">

	<div class="middle-login">
		<div class="block-flat">
			<div class="header">							
				<h3 class="text-center"><img class="logo-img" src="images/logo.png" alt="logo"/></h3>
			</div>
			<div>
				<form style="margin-bottom: 0px !important;" class="form-horizontal" method="post">
					<div class="content">
						<h4 class="title">Login Access</h4>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="text" placeholder="Username" id="username" name="txtusername" class="form-control">
									</div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input type="password" placeholder="Password" id="password" name="txtpassword" class="form-control">
									</div>
								</div>
							</div>
							
					</div>
					<div class="foot">
						<button class="btn btn-default" data-dismiss="modal" type="button" >Register</button>
						<button class="btn btn-primary" data-dismiss="modal" type="submit" name="submit">Log me in</button>
					</div>
				</form>
			</div>
		</div>
		<div class="text-center out-links"><a href="#">&copy; 2014 Your Company</a></div>
	</div> 
	
</div>

<script src="js/jquery.js"></script>
	<script type="text/javascript">
    $(function(){
      $("#cl-wrapper").css({opacity:1,'margin-left':0});
    });
  </script>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
  <script src="js/behaviour/voice-commands.js"></script>
  <script src="js/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.flot/jquery.flot.js"></script>
<script type="text/javascript" src="js/jquery.flot/jquery.flot.pie.js"></script>
<script type="text/javascript" src="js/jquery.flot/jquery.flot.resize.js"></script>
<script type="text/javascript" src="js/jquery.flot/jquery.flot.labels.js"></script>
</body>

<!-- Mirrored from condorthemes.com/flatdream/pages-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Dec 2014 07:45:26 GMT -->
</html>
