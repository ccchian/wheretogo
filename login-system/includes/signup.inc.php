<?php
require_once 'class-autoload.inc.php';

if (isset($_POST['submit'])) {
    $uAccount = $_POST['uaccount'];
    $uPass = $_POST['upass'];
    $re_uPass = $_POST['re_upass'];
    $uEmail = $_POST['uemail'];
    $uPhone = $_POST['uphone'];
    $uFirstname = $_POST['ufname'];
    $uLastname = $_POST['ulname'];

    require_once 'function.inc.php';

    if (empty($uAccount)) {
        header("Location: ../signup.php?sign=acc");
        exit();
    } else {
        if (empty($uPass)) {
            header("Location: ../signup.php?sign=pass&acc=$uAccount&mail=$uEmail&fir=$uFirstname&las=$uLastname&phone=$uPhone");
            exit();
        } else {
            if (empty($re_uPass)) {
                header("Location: ../signup.php?sign=repass&acc=$uAccount&mail=$uEmail&fir=$uFirstname&las=$uLastname&phone=$uPhone");
                exit();
            } else {
                if (empty($uFirstname)) {
                    header("Location: ../signup.php?sign=fir&acc=$uAccount&mail=$uEmail&&fir=$uFirstname&las=$uLastname&phone=$uPhone");
                    exit();
                } else {
                    if (empty($uLastname)) {
                        header("Location: ../signup.php?sign=las&acc=$uAccount&mail=$uEmail&phone=$uPhone&fir=$uFirstname");
                        exit();
                    } else {
                        if (empty($uEmail)) {
                            header("Location: ../signup.php?sign=mail&acc=$uAccount&fir=$uFirstname&las=$uLastname&phone=$uPhone");
                            exit();
                        } else {
                            if (empty($uPhone)) {
                                header("Location: ../signup.php?sign=phone&acc=$uAccount&mail=$uEmail&fir=$uFirstname&las=$uLastname");
                                exit();
                            }
                        }
                    }
                }
            }
        }
    }
    if (invalidUAccount($uAccount) !== false) {
        header("Location: ../signup.php?error=invalidacc");
        exit();
    }

    if (invalidUEmail($uEmail) !== false) {
        header("Location: ../signup.php?error=invalidmail");
        exit();
    }

    if (passMatch($uPass, $re_uPass) !== false) {
        header("Location: ../signup.php?error=diffpass");
        exit();
    }

    $signupObj = new Member();

    if ($signupObj->existMember($uAccount, $uEmail)) {
        header("Location: ../signup.php?error=stmtfail&acc=$uAccount&mail=$uEmail&fir=$uFirstname&las=$uLastname&phone=$uPhone");
        exit();
    }

    if ($signupObj->addMember($uAccount, $uPass, $uEmail, $uPhone, $uFirstname, $uLastname)) {
        header("Location: ../login.php?newlogin&acc=$uAccount&mail=$uEmail&fir=$uFirstname&las=$uLastname&phone=$uPhone");
    }

} else {
    header("Location: ../signup.php");
}
