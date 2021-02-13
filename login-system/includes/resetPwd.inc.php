<?php

if (isset($_POST['resetPwdBtn'])) {

    $selector = $_POST['selector'];
    $validator = $_POST['validator'];
    $pwd = $_POST['pwd'];
    $re_pwd = $_POST['re_pwd'];

    if (empty($pwd) || empty($re_pwd)) {
        header("Location: ../profile.php?newpwd=empty");
        exit();
    } else if ($pwd !== $re_pwd) {
        header("Location: ../profile.php?newpwd=nmatch");
        exit();
    }

    $currentDate = date("U");

    require 'class-autoload.inc.php';

    $newPwdObj = new ResetPwd();
    // echo $selector . "<br>";
    // echo $validator . "<br>";
    // echo $pwd . "<br>";
    // echo $re_pwd . "<br>";
    $newPwdObj->checkReset($selector, $currentDate, $validator, $pwd);

    header("Location: ../login.php?newpwd=successs");

} else {
    header("Location: ../index.php");
}
