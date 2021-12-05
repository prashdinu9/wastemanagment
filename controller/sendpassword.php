<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//include '../common/dbconnection.php'; //To get connection string
//include '../model/customermodel.php';

//
//
//$ob = new dbconnection();
//$con = $ob->connection();
//
//$member_id = $_POST['proposer_id'];
//
//$obj = new member();
//$result = $obj->viewMember($member_id);
//
//$row = $result->fetch_array();
//$email = $row['email'];
//
//$rand = substr(md5(microtime()), rand(0, 26), 5);
//
//
//$mail = new PHPMailer;
//
//$mail->isSMTP();                            // Set mailer to use SMTP
//$mail->Host = 'smtp.gmail.com';             // Specify main and backup SMTP servers
//$mail->SMTPAuth = true;                     // Enable SMTP authentication
//$mail->Username = 'bitproject99@gmail.com';          // SMTP username
//$mail->Password = 'star4shine'; // SMTP password
//$mail->SMTPSecure = 'tls';                  // Enable TLS encryption, `ssl` also accepted
//$mail->Port = 587;                          // TCP port to connect to
//
//$mail->setFrom('bitproject99@gmail.com', 'PPFA Admin');
////$mail->addReplyTo('info@example.com', 'CodexWorld');
//$mail->addAddress($email);   // Add a recipient
////$mail->addCC('cc@example.com');
////$mail->addBCC('bcc@example.com');
//
//$mail->isHTML(true);  // Set email format to HTML
//
//$bodyContent = '<h1>Verification Code :</h1>';
//$bodyContent .= $rand;
//
//$mail->Subject = 'Verification Code for new member Registration';
//$mail->Body = $bodyContent;
//
//if (!$mail->send()) {
//    //  echo 'Message could not be sent.';
//    //  echo 'Mailer Error: ' . $mail->ErrorInfo;
//} else {
//    //  echo 'Message has been sent';
//}
//echo $rand;

//send email
require '../../vendor/autoload.php';

$mail = new PHPMailer(true);
try {
    //Server settings
    $mail->SMTPDebug = 2;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'snowflight89@gmail.com';
    $mail->Password = 'star4shine';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('snowflight89@gmail.com', 'Admin');
    $mail->addAddress('prashdinu@gmail.com', '$name');
    // $mail->addAddress('recipient2@example.com');
    $mail->addReplyTo('noreply@example.com', 'noreply');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //Attachments
    // $mail->addAttachment('/backup/myfile.tar.gz');

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Test Mail Subject!';
    $mail->Body    = 'Hello Prashani, Thank you for registering. please login to the system and ';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}

?>

<!--<input type="hidden" name="hid" id="hid" value="--><?php //echo $rand; ?><!--" />-->

