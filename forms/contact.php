<?php
  /**
  * Requires the "PHP Email Form" library
  * The "PHP Email Form" library is available only in the pro version of the template
  * The library should be uploaded to: vendor/php-email-form/php-email-form.php
  * For more info and help: https://bootstrapmade.com/php-email-form/
  */

  // Replace contact@example.com with your real receiving email address
 
  $from_name = $_POST['name'];
  $from_email = $_POST['email'];

   $email_message .= "Name: ".$from_name."\n";
  
    $email_message .= "Mobile: ".$from_email."\n";
    $email_message .= "Subject: ".$_POST['subject']."\n";
    $email_message .= "Message: ".$_POST['message']."\n";
 


$msg = $email_message;

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

   	// Account details
	$apiKey = urlencode('bXDCXDjqs3A-C25Hwoyn6LtKfBr9d3wHqzdizTENuw');
	
	// Message details
	$numbers = array(919074812915);
	$sender = urlencode('TXTLCL');
	$message = rawurlencode($msg);
 
	$numbers = implode(',', $numbers);
 
	// Prepare data for POST request
	$data = array('apikey' => $apiKey, 'numbers' => $numbers, "sender" => $sender, "message" => $message);
 
	// Send the POST request with cURL
	$ch = curl_init('https://api.textlocal.in/send/');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo 'Enquiry Sent';


  
?>
