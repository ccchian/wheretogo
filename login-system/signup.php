<?php
include_once 'sessionStart.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../image/new/littleonegotaquestion.jpg" type="image/jpg">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../vendors/linericon/style.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="../vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="../vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="../vendors/owl-carousel/owl.carousel.min.css">
    <!-- main css -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="style.css">

    <?php
        include("../cdn.php");
    ?>
        <link rel="stylesheet" href="../header_area.css">
        <link rel="stylesheet" href="../index/style.css">
        <link rel="stylesheet" href="../css/responsive.css">


    <title>註冊</title>
</head>

<body>
    <!--================Header Area =================-->
    <?php
include_once 'header_area.php';
?>
    <section class="sample-text-area">
<div class="col-lg-8 col-md-8 mx-auto">
        <form action="includes/signup.inc.php" method="post" class=" mt-5 p-4 mx-auto logform">
            <h2>加入會員</h2>

            <!--INFO ALERT START-->

            <?php if (isset($_GET['sign'])) {
    $signupcCheck = $_GET['sign'];
    ?>
                <p class="error">
                    <?php
if ($signupcCheck == 'acc') {
        echo "請確認帳號!";
    } else if ($signupcCheck == 'pass') {
        echo "請確認密碼!";
    } else if ($signupcCheck == 'repass') {
        echo "請再次確認密碼!";
    } else if ($signupcCheck == 'repassfail') {
        echo "密碼不相符!";
    } else if ($signupcCheck == 'mail') {
        echo "請輸入有效e-mail!";
    } else if ($signupcCheck == 'phone') {
        echo "請確認電話號碼!";
    } else if ($signupcCheck == 'fir') {
        echo "請輸入名字!";
    } else if ($signupcCheck == 'las') {
        echo "請輸入姓氏!";
    }?>
                </p>
            <?php }?>

            <?php if (isset($_GET['error'])) {
    $signupError = $_GET['error'];
    ?>
                <p class="error">
                    <?php
if ($signupError == 'invalidacc') {
        echo "請輸入字母或數字(aA-zZ/0-9)";
    } else if ($signupError == 'invalidmail') {
        echo "請輸入適當e-mail";
    } else if ($signupError == 'diffpass') {
        echo "密碼不相符，請再次確認";
    } else if ($signupError == 'stmtfail') {
        echo "帳號或e-mail已被使用，請再次輸入";
    }?>
                </p>
            <?php }?>
            <!--INFO ALERT END-->


            <label for="">會員帳號</label>
            <?php
if (isset($_GET['acc'])) {
    $uAccount = $_GET['acc'];
    echo '<input type="text" name="uaccount" placeholder="user account" value="' . $uAccount . '"><br>';
} else {
    echo '<input type="text" name="uaccount" placeholder="user account"><br>';
}
?>


            <label for="">密碼</label>
            <input type="password" name="upass" placeholder="password"><br>

            <label for="">確認密碼</label>
            <input type="password" name="re_upass" placeholder="re_password"><br>

            <label for="">名</label>
            <?php
if (isset($_GET['fir'])) {
    $uFirst = $_GET['fir'];
    echo '<input type="text" name="ufname" placeholder="user first name" value="' . $uFirst . '"><br>';
} else {
    echo '<input type="text" name="ufname" placeholder="user first name"><br>';
}
?>

            <label for="">姓氏</label>
            <?php
if (isset($_GET['las'])) {
    $uLast = $_GET['las'];
    echo '<input type="text" name="ulname" placeholder="user last name" value="' . $uLast . '"><br>';
} else {
    echo '<input type="text" name="ulname" placeholder="user last name"><br>';
}
?>

            <label for="">E-mail</label>
            <?php
if (isset($_GET['mail'])) {
    $uEmail = $_GET['mail'];
    echo '<input type="email" name="uemail" placeholder="user email" value="' . $uEmail . '"><br>';
} else {
    echo '<input type="email" name="uemail" placeholder="user email"><br>';
}
?>

            <label for="">連絡電話</label>
            <?php
if (isset($_GET['phone'])) {
    $uPhone = $_GET['phone'];
    echo '<input type="text" name="uphone" placeholder="user phone" value="' . $uPhone . '"><br>';
} else {
    echo '<input type="text" name="uphone" placeholder="user phone"><br>';
}
?>

            <button type="submit" name="submit">確認註冊</button>
            <a href="login.php" class="ca">已加入會員?</a>
        </form>
        </div>
    </section>
    <?php
include_once 'footer.php';
?>