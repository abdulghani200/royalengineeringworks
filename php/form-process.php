<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['message']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['service']) 		||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
$service = strip_tags(htmlspecialchars($_POST['service']));
	
// Create the email and send the message
$to = 'royalengineeringworks3116@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "New Query from ".$name." Received For Royal Engineering Works Regarding ".$service.".";
$email_body = "<html><body><h3>Name: ".$name."<br><br>Email: ".$email."<br><br>Phone: ".$phone."<br><br>Service Required: ".$service."<br></h3><p style=\"font-size:20px;\">Message: ".$message."<br></p></body></html>";
$headers = "From: noreply@royalengineeringworks.net\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email";	
$headers.="MIME-Version: 1.0\n";
$headers.="Content-type: text/html; charset=iso 8859-1";
$success = mail($to,$email_subject,$email_body,$headers);

 
// redirect to success page
if ($success){
   echo "success";
}else{
    echo "error";
}
 
?>