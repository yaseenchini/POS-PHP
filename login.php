<?php
  // if($_POST){
  //   $error = array();

  //   //start validation
  //   if(empty($_POST['stdname'])){
  //     $error['stdname1']="this field cant be empty";
  //   }
  //   // if(!preg_match("/^[a-zA-Z/'/-\040]+$/", $_POST['stdname'])){
  //   //   $error['stdname2']="Take only Alphabits";
  //   // }
  //   if(empty($_POST['fname'])){
  //     $error['fname1']="this field cant be empty";
  //   }
  //   if(empty($_POST['field'])){
  //     $error['field1']="this field cant be empty";
  //   }



  //   //check errors
  //   if(count($error)==0){
  //     include("config.php");
  //     $sql = "INSERT INTO  `student_db`.`add_student` (
  //         `Student Name` ,
  //         `Father Name` ,
  //         `Field` ,
  //         `Phone` ,
  //         `Address`
  //         ) 
  //         VALUES('".$_POST['stdname']."','".$_POST['fname']."','".$_POST['field']."','".$_POST['stphone']."','".$_POST['address']."');";

  //     if (mysqli_query($con1,$sql)) {
  //       $msg= "New record created successfully";
  //     } 
  //     else {
  //         echo "Error: " . $sql . "<br>";
  //     }
  //     mysqli_close();
  //     header("location:viewrecords.php?addmessage=$msg");
      
  //   }
  // }
  

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
            <li><a href="login.php"><i class="fa fa-home"></i><span>Rigester Student Record</span></a>
            </li>
            
            <li><a href="viewrecords.php"><i class="fa fa-home"></i><span>View Student Record</span></a>
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


    <div class="navbar-collapse">
        <ul class="nav navbar-nav navbar-right user-nav">
          <li class="dropdown profile_menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img alt="Avatar" src="images/avatar2.jpg"><span><?php session_start(); echo $_SESSION['username']; ?></span> <b class="caret"></b></a>
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

        <!-- your main container -->
        <!-- form Start-->
                <div class="block-flat">
                <div class="header">              
                  <h3>Student Registration Form</h3>
                </div>
                <div class="content">
                  <form class="form-horizontal" role="form" method="post">
                    <div class="form-group">
                    <label for="studentname" class="col-sm-2 control-label">Student Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="studentname" name="stdname" placeholder="Enter Name">
                      <p style="color:red"><?php if (isset($error['stdname1'])) echo $error['stdname1']; ?></p>
                      <p style="color:red"><?php if (isset($error['stdname2'])) echo $error['stdname2']; ?></p>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="fathername" class="col-sm-2 control-label">Father Name</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="fathername" name="fname" placeholder="Enter Father Name">
                      <p style="color:red"><?php if (isset($error['fname1'])) echo $error['fname1']; ?></p>
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="stdfield" class="col-sm-2 control-label">Field</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="stdfield" name="field" placeholder="Enter Field Name">
                      <p style="color:red"><?php if (isset($error['field1'])) echo $error['field1']; ?></p>
                    </div>
                    </div>

                    <div class="form-group">
                    <label for="stdphone" class="col-sm-2 control-label">Phone # </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="stdphone" name="stphone" placeholder="Enter Phone number">
                    </div>
                    </div>
                    <div class="form-group">
                    <label for="stdaddress" class="col-sm-2 control-label">Address</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="stdaddress" name="address" placeholder="Enter Address">
                    </div>
                    </div>
                    <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary">Sumit</button>
                      <button class="btn btn-default">Cancel</button>
                    </div>
                    </div>
                  </form>
                </div>
              </div>
        <!-- form End-->



        <!-- your main container ends -->
        
        </div>
      </div>


    
  
    </div>
  </div>
	</div> 
	
</div>

  
	<script src="js/jquery.js"></script>
	<script src="js/jquery.cookie/jquery.cookie.js"></script>
  <script src="js/jquery.pushmenu/js/jPushMenu.js"></script>
	<script type="text/javascript" src="js/jquery.nanoscroller/jquery.nanoscroller.js"></script>
	<script type="text/javascript" src="js/jquery.sparkline/jquery.sparkline.min.js"></script>
  <script type="text/javascript" src="js/jquery.ui/jquery-ui.js" ></script>
	<script type="text/javascript" src="js/jquery.gritter/js/jquery.gritter.js"></script>
	<script type="text/javascript" src="js/behaviour/core.js"></script>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
  <script src="js/bootstrap/dist/js/bootstrap.min.js"></script>
      <style type="text/css">
    #color-switcher{
      position:fixed;
      background:#272930;
      padding:10px;
      top:50%;
      right:0;
      margin-right:-109px;
    }
    
    #color-switcher .toggle{
      cursor:pointer;
      font-size:15px;
      color: #FFF;
      display:block;
      position:absolute;
      padding:4px 10px;
      background:#272930;
      width:25px;
      height:30px;
      left:-24px;
      top:22px;
    }
    
    #color-switcher p{color: rgba(255, 255, 255, 0.6);font-size:12px;margin-bottom:3px;}
    #color-switcher .palette{padding:1px;}
    #color-switcher .color{width:15px;height:15px;display:inline-block;cursor:pointer;}
    #color-switcher .color.purple{background:#7761A7;}
    #color-switcher .color.green{background:#19B698;}
    #color-switcher .color.red{background:#EA6153;}
    #color-switcher .color.blue{background:#54ADE9;}
    #color-switcher .color.orange{background:#FB7849;}
    #color-switcher .color.prusia{background:#476077;}
    #color-switcher .color.yellow{background:#fec35d;}
    #color-switcher .color.pink{background:#ea6c9c;}
    #color-switcher .color.brown{background:#9d6835;}
    #color-switcher .color.gray{background:#afb5b8;}
 </style>
  <div id="color-switcher">
    <p>Select Color</p>
    <div class="palette">
      <div class="color purple" data-color="purple"></div>
      <div class="color green" data-color="green"></div>
      <div class="color red" data-color="red"></div>
      <div class="color blue" data-color="blue"></div>
      <div class="color orange" data-color="orange"></div>
    </div>
    <div class="palette">
      <div class="color prusia" data-color="prusia"></div>
      <div class="color yellow" data-color="yellow"></div>
      <div class="color pink" data-color="pink"></div>
      <div class="color brown" data-color="brown"></div>
      <div class="color gray" data-color="gray"></div>
    </div>
    <div class="toggle"><i class="fa fa-angle-left"></i></div>
  </div>

  <script type="text/javascript">
    var link = $('link[href="css/style.css"]');
    
    // if($.cookie("css")) {
    //   link.attr("href",'css/skin-' + $.cookie("css") + '.css');
    // }
    
    $(function(){
      $("#color-switcher .toggle").click(function(){
        var s = $(this).parent();
        if(s.hasClass("open")){
          s.animate({'margin-right':'-109px'},400).toggleClass("open");
        }else{
          s.animate({'margin-right':'0'},400).toggleClass("open");
        }
      });
      
      $("#color-switcher .color").click(function(){
        var color = $(this).data("color");
        $("body").fadeOut(function(){
          //link.attr('href','css/skin-' + color + '.css');
          $.cookie("css", color, {expires: 365, path: '/'});
          window.location.href = "";
          $(this).fadeIn("slow");
        });
      });
    });
  </script>   <script src="js/jquery.codemirror/lib/codemirror.js"></script>
  <script src="js/jquery.codemirror/mode/xml/xml.js"></script>
  <script src="js/jquery.codemirror/mode/css/css.js"></script>
  <script src="js/jquery.codemirror/mode/htmlmixed/htmlmixed.js"></script>
  <script src="js/jquery.codemirror/addon/edit/matchbrackets.js"></script>
  <script src="js/jquery.vectormaps/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="js/jquery.vectormaps/maps/jquery-jvectormap-world-mill-en.js"></script>
  <script src="js/behaviour/dashboard.js"></script>
  
  
<script type="text/javascript" src="js/jquery.flot/jquery.flot.js"></script>
<script type="text/javascript" src="js/jquery.flot/jquery.flot.pie.js"></script>
<script type="text/javascript" src="js/jquery.flot/jquery.flot.resize.js"></script>
<script type="text/javascript" src="js/jquery.flot/jquery.flot.labels.js"></script>
</body>

<!-- Mirrored from condorthemes.com/flatdream/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 31 Dec 2014 07:41:16 GMT -->
</html>