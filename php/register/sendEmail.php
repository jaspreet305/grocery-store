<?php

if (!isset($_SESSION)) {
    session_start();
}

// open the users file
$handle = fopen("../backstore/database/users.csv", "r");
$emailRecovery = $_POST["emailRecovery"];

// I am using PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// set the session variables
$found = FALSE;
while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
    if ($row[0] === $emailRecovery) {
        $_SESSION['passwordRecovery'] = $row[1];
        $_SESSION['firstName'] = $row[2];
        $_SESSION['lastName'] = $row[3];
        $found = TRUE;
        break;
    }
}
fclose($handle);

// send an email
if ($found) {
    $passwordRecovery = $_SESSION['passwordRecovery'];
    $firstName = $_SESSION['firstName'];
    $lastName = $_SESSION['lastName'];

    include "../mail/PHPMailer.php";
    include "../mail/SMTP.php";
    include "../mail/Exception.php";

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth = true;                                   //Enable SMTP authentication
        $mail->Username = 'tropicalflavorsoen228@gmail.com';                     //SMTP username
        $mail->Password = 'vdmnekslftbvcnhj';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port = 465;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('tropicalflavorsoen228@gmail.com', 'Tropical Flavors');
        $mail->addAddress($emailRecovery, $firstName." ".$lastName);     //Add a recipient     //Name is optional
        $mail->addReplyTo('tropicalflavorsoen228@gmail.com', 'Tropical Flavors Email Service');

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Recovery e-mail';
        $mail->Body = "This is your password: "."<b>".$passwordRecovery."<b>";
        $mail->AltBody = 'This is you password: '.$passwordRecovery;

        $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
unset($_SESSION['passwordRecovery']);
unset($_SESSION['firstName']);
unset($_SESSION['lastName']);
header("Location: recoveryMessage.php");
