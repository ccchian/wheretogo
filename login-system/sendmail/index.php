<?php

require_once 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer();

$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl';
$mail->Host = 'smtp.gmail.com';
$mail->Port = '465';
$mail->isHTML();
$mail->Username = 'phpmaileryao@gmail.com';
$mail->Password = 'zzz777123@'; //need chage password
$mail->SetFrom('no-reply@howcode.org');
$mail->Subject = ('Heelo World!');
$mail->Body = ('a test email');
$mail->AddAddress('ysy2to2@gmail.com'); //mail to WHO

$mail->Send();
