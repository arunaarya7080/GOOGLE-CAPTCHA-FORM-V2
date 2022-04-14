<?php

if(isset($_POST['submit']))
    {
$secret_key = "6LecMmkfAAAAACYCQ3dYwKjLuBciFeGzfTXHe2uQ";
$response = $_POST['g-recaptcha-response'];
$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secret_key&response=$response";
$fire= file_get_contents($url);
$data = json_decode($fire);

             if($data->success==true)
                          {
// form start
$name = $_POST['name'];
$email = $_POST['email'];
$number = $_POST['number'];
$service = $_POST['service'];
$message = $_POST['message'];

$from       = "From Prontosys It Services";
$webmaster  = "info@prontosys.com"; //It's web master mail info@example.com
$to         = "info@prontosys.com"; // where you want to get mail 
$subject    = "Ads Online Lead Prontosys It Services";

$headers    = "From: " . $from . "<" . $webmaster . ">\r\n";
$headers    .= "X-Mailer: PHP/" . phpversion() . "\r\n";
$headers    .= "MIME-Version: 1.0" . "\r\n";
$headers    .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

$message = "<html><body>";
$message .= "<p>Name :".$_POST['name']  ."</p>";
$message .= "<p>Email : ". $_POST['email'] ."</p>";
$message .= "<p>Phone : ". $_POST['number'] ."</p>";
$message .= "<p>Service : ". $_POST['service'] ."</p>";
$message .= "<p>Message :".$_POST['message']."</p>";
$message .= "</body></html>";

$sendmail = mail($to, $subject, $message, $headers);

echo "<script>alert('Thank you for contact us, our team will contact with you very soon');document.location='https://prontosys.ae/'</script>";
// end form
                          }
                          else {
                                
                            echo "<script>alert('reCaptcha error, Please fill the reCaptcha');document.location='https://prontosys.ae/'</script>";

                               }

 }

?>


