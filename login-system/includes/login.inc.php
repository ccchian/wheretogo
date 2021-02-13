<?php
require_once 'class-autoload.inc.php';

if (isset($_POST['submit'])) {
    $uAccount = $_POST['uaccount'];
    $uPass = $_POST['upass'];

    require_once 'function.inc.php';

    if (emptyInputLogin($uAccount, $uPass)) {
        header("Location: ../login.php?error=emptyinput");
        exit();
    } // 2nd if end

    $logInObj = new Member();
    $resultdata = $logInObj->existMember($uAccount, $uPass);
    if ($resultdata) {
        //echo "find pass";
        $passHash = $resultdata["u_pass"];
        $getAccount = $resultdata["u_account"];
        $getUID = $resultdata["u_id"];
        $getUEmail = $resultdata["u_email"];
        $getUPhone = $resultdata["u_phone"];
        $getUFname = $resultdata["u_firstname"];
        $getULname = $resultdata["u_lastname"];
        $getUType = $resultdata["u_type"];
        loginUser($uPass, $passHash, $getAccount, $getUID, $getUEmail, $getUPhone, $getUFname, $getULname, $getUType);
        exit();
    } else {
        header("Location: ../login.php?error=none");
    }

} else {
    header("Location: ../login.php?error=smtfail");
    exit();
} // 1st if end
