<?php

session_start();

session_unset();
session_destroy();
//Success Info START

if (isset($_GET['update'])) {
    $loginError = $_GET['update'];
    if ($loginError = 'success') {
        echo "<script>alert('請確認信箱並點選連結修改密碼！');</script>";
        header("Location: ../login.php?update=success");
    }
} else {
    //<!-- Success Info START--->
    header("Location: ../../index2.php?bye");
}
