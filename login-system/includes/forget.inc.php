<?php
if (isset($_POST['resetBtn'])) {

    //set 2 different tokens to prevent timing attack
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "http://localhost/去哪+1_4/login-system/newpass.php?selector=" . $selector . "&validator=" . bin2hex($token); //need change url

    // create expire date for token
    $expires = date("U") + 1800;

    require 'class-autoload.inc.php';

    $userMail = $_POST['email'];

    // clear exits tokens in DB first
    $resetObj = new ResetPwd();
    $resetObj->delReset($userMail);

    // add tokens
    $resetObj->addReset($userMail, $selector, $token, $expires);

    $to = $userMail;
    $subject = 'Reset your password from GoWhere+1';
    $message = '<p>We recieved a password reset request. Please click the link to reset.</p>';
    $message .= 'Here is the link: </br>';
    $message .= '<a href="' . $url . '">' . $url . '</a></p>';

    // Send Mail Start
    require_once '../sendmail/PHPMailer/PHPMailerAutoload.php';

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
    $mail->Subject = ($subject);
    $mail->Body = ($message);
    $mail->AddAddress($userMail); //mail to WHO

    $mail->Send();
    // Send Mail End

    // $headers = "From: 去哪+1<phpmaileryao@gmail.com>\r\n";
    // $headers .= "Reply-To: phpmaileryao@gmail.com\r\n";
    // $headers .= "Content-type: text/html\r\n";

    // mail($to, $subject, $message, $headers);

    header("Location: ../forget.php?reset=success");
} else {
    header("Location: ../forget.php?reset=fail");
}
