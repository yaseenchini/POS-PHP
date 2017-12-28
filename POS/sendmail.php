<?php
if(isset($_POST['submit']))
{

    $message=
        'Full Name: '.$_POST['fullname'].'<br />
        Subject:    '.$_POST['subject'].'<br />
        Phone:  '.$_POST['phone'].'<br />
        Email:  '.$_POST['emailid'].'<br />
        Comments:   '.$_POST['comments'].'
       ';
require "./PHPMailer_5.2.0/class.phpmailer.php"; //include phpmailer class

// Instantiate Class
$mail = new PHPMailer(true);

// Set up SMTP
$mail->IsSMTP();                // Sets up a SMTP connection
$mail->SMTPAuth = true;         // Connection with the SMTP does require authorization
$mail->SMTPSecure = "TLS";      // Connect using a TLS connection
$mail->Host = "smtp.gmail.com";  //Gmail SMTP server address
$mail->Port = 587;  //Gmail SMTP port
$mail->SMTPSecure = "TLS";

$mail->Encoding = '7bit';

$mail->SMTPOptions = array(
'ssl' => array(
'verify_peer' => false,
'verify_peer_name' => false,
'allow_self_signed' => true
)
);

// Authentication
$mail->Username   = "yaseen.chini@gmail.com"; // Your full Gmail address
$mail->Password   = "$15956897445"; // Your Gmail password

echo "authorization Successfully";
exit;
// Compose
$mail->SetFrom($_POST['emailid'], $_POST['fullname']);
$mail->AddReplyTo($_POST['emailid'], $_POST['fullname']);
$mail->Subject = "New Contact Form Enquiry";      // Subject (which isn't required)
$mail->MsgHTML($message);

// Send To
$mail->AddAddress("muhammad.kamran.5711@gmail.com", "Kamran"); // Where to send it - Recipient
$result = $mail->Send();        // Send!
$message = $result ? 'Successfully Sent!' : 'Sending Failed!';
unset($mail);

if(!$mail->Send())
{
   echo "Message could not be sent. <p>";
   echo "Mailer Error: " . $mail->ErrorInfo();
   exit;
}

echo "Message has been sent";

}
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

	<title>Student Inventory</title>
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
      <!-- new work -->
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
             <!-- form start-->
              <div style="margin: 100px auto 0;width: 300px;">
                      <h3>Contact Form</h3>
                      <form name="form1" id="form1" action="email.php" method="post">
                              <fieldset>
                                <input type="text" name="fullname" placeholder="Full Name"    />
                                <br />
                                <input type="text" name="subject" placeholder="Subject" />
                                <br />
                                <input type="text" name="phone" placeholder="Phone" />
                                <br />
                                <input type="text" name="emailid" placeholder="Email" />
                                <br />
                                <textarea rows="4" cols="20" name="comments" placeholder="Comments"></textarea>
                                <br />
                                <input type="submit" name="submit" value="Send" />
                              </fieldset>
                      </form>
                      <p><?php if(!empty($message)) echo $message; ?></p>
                  </div>          


       <!-- form End-->



        <!-- your main container ends -->





        <!-- end main container -->
          
        </div>
      </div>
    </div>
  </div>
	</div> 
	
</div>
<!-- form Start-->


<!-- form End-->
  
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