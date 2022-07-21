<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';

if (!empty($_POST)) {
    $email = $_POST['email'];

    $sql_email_check = "SELECT `email` FROM `user` WHERE `email` = '$email'";
    $table_email_check = mysqli_query($connexion, $sql_email_check);
    // print_r($table_email_check);

    if (mysqli_num_rows($table_email_check) > 0) {


        $token = md5($email);

        $sql_update_token = "UPDATE `user` SET `token` = '$token' WHERE `email` = '$email'";
        mysqli_query($connexion, $sql_update_token);


        $mail = new PHPMailer(true);

        try {

            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'mywebsite.amazon@gmail.com';                     //SMTP username
            $mail->Password   = 'amazonwebsite2022@';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set
            $mail->setFrom('mywebsite.amazon@gmail.com', 'Mailer');
            $mail->addAddress($email, 'Utillisateur');     //Add a recipient 
            $mail->addReplyTo('mywebsite.amazon@gmail.com', 'Information');

            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Voici le lien';
            $mail->Body    = '<a href="http://localhost/projet_php2/backoffice/modif_mdp.php?token=' .$token.'">Clique!</a>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
