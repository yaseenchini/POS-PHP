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
	$mail->Host = 'smtp.gmail.com'; 
	$mail->Port = 465;
	$mail->SMTPSecure = 'ssl';;

	$mail->Encoding = '7bit';

	// Authentication
	$mail->Username   = "yaseen.chini@gmail.com"; // Your full Gmail address
	$mail->Password   = "$15956897445"; // Your Gmail password

	// Compose
	$mail->SetFrom($_POST['emailid'], $_POST['fullname']);
	$mail->AddReplyTo($_POST['emailid'], $_POST['fullname']);
	$mail->Subject = "New Contact Form Enquiry";      // Subject (which isn't required)
	$mail->MsgHTML($message);

	// Send To
	$mail->AddAddress("muhammad.kamran.5711@gmail.com", "Kamran"); // Where to send it - Recipient

	//$result = $mail->Send();        // Send!
	 echo "authorization Successfully";
	 exit;
	//$message = $result ? 'Successfully Sent!' : 'Sending Failed!';
	//unset($mail);

	if(!$mail->Send())
	{
	   echo "Message could not be sent. <p>";
	   echo "Mailer Error: " . $mail->ErrorInfo();
	   exit;
	}

	echo "Message has been sent";
	echo "authorization Successfully";
	exit;
	}


?>


