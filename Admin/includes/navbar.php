<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';
$mail = new PHPMailer(true);
//$mail->SMTPDebug = 2;
$mail->isSMTP();
$mail->Host	 = 'smtp.gmail.com;';
$mail->SMTPAuth = true;
$mail->Username = 'jaiganeshroughuse@gmail.com';
$mail->Password = 'HemanthKumar123';
$mail->SMTPSecure = 'tls';
$mail->Port	 = 587;

$mail->setFrom('jaiganeshroughuse@gmail.com', $name);
$mail->addAddress($email);
$mail->isHTML(true);

$mail->Subject = 'Email Verification from Hemanth Info Tech';
$email_template = "<div style='font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2'>
  <div style='margin:50px auto;width:70%;padding:20px 0'>
    <div style='border-bottom:1px solid #eee'>
      <a href='' style='font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600'>Pharmacy</a>
    </div>
    <p style='font-size:1.1em'>Hi,</p>
    <p>Thank you for choosing Pharmacy. Use the following OTP to complete your Sign Up procedures. OTP is valid for 5 minutes</p>
    <h2 style='background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;'>324457</h2>
    <p style='font-size:0.9em;'>Regards,<br />Pharmacy</p>
    <hr style='border:none;border-top:1px solid #eee' />
    <div style='float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300'>
      <p>Pharmacy </p>
      <p>1600 Amphitheatre Parkway</p>
      <p>Chenani</p>
    </div>
  </div>
</div>";

$mail->Body    = $email_template;
//$mail->AltBody = 'Body in plain text for non-HTML mail clients';
$mail->send();
//echo 'Mail has been sent successfully!';
