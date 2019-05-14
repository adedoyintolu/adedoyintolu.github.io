<?php
session_start();
if(isset($_POST['email'])) {
     
    // CHANGE THE TWO LINES BELOW
    $email_to = "momoduoladapo@gmail.com";
     
    function died($error) {
        // your error code can go here
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
    }
     
    // validation expected data exists
    if(!isset($_POST['name']) ||
    !isset($_POST['email']) ||
    !isset($_POST['subject']) ||
    !isset($_POST['message'])) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
     
  $name = $_POST['name']; // required
  $email_from = $_POST['email']; // required
  $subject = $_POST['subject']; // required
  $message = $_POST['message']; // required



 function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }

     
  $email_message .= "Name: ".clean_string($name)."\n";
  $email_message .= "Email: ".clean_string($email_from)."\n";
  $email_message .= "Subject: ".clean_string($subject)."\n";
  $email_message .= "Message?: ".clean_string($message)."\n";
  
  $email_address = "noreply@noreply.com";
  $email_subject = "Message From Website";
  
 
 // create email headers
    $headers = 'From:' .$email_address. "\r\n".// This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
    'Reply-To:' .$email_address. "\r\n".
    'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject,$email_message,$headers);
	include('message-sent.html');    

?>

<!-- place your own success html below -->

<?php
}
die();
?>