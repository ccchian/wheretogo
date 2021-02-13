<?php
require_once 'class-autoload.inc.php';

function invalidUAccount($uAccount)
{
    $result;
    if (!preg_match("/^[a-zA-Z0-9]*$/", $uAccount)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUEmail($uEmail)
{
    $result;
    if (!filter_var($uEmail, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function passMatch($uPass, $re_uPass)
{
    $result;
    if ($uPass !== $re_uPass) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

//uid exit function 待做
function emptyInputLogin($uAccount, $uPass)
{
    $result;
    if (empty($uAccount) || empty($uPass)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($uPass, $passHash, $getAccount, $getUID, $getUEmail, $getUPhone, $getUFname, $getULname, $getUType)
{
    $checkPass = password_verify($uPass, $passHash); //match->return true

    if ($checkPass === false) {
        //not match
        header("Location: ../login.php?error=paswrong");
        exit();
    } else if ($checkPass === true) {
        session_start();
        $_SESSION['uID'] = $getUID;
        $_SESSION['uAccount'] = $getAccount;
        $_SESSION['uEmail'] = $getUEmail;
        $_SESSION['uPhone'] = $getUPhone;
        $_SESSION['uFname'] = $getUFname;
        $_SESSION['uLname'] = $getULname;
        $_SESSION['uType'] = $getUType;
        header("Location: ../../index2.php?login=success");

        exit();
    }
}
