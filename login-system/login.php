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

    <title>登入</title>
</head>

<body>
    <!--================Header Area =================-->
    <?php
include_once 'header_area.php';
?>
    <section class="sample-text-area">
        <div class="col-lg-8 col-md-8 mx-auto">
            <form action="includes/login.inc.php" method="post" class="logform mt-5 p-3 mx-auto">
                <!--================Header Area =================-->
                <h2>登入 LOGIN</h2>

                <!-- Error START--->
                <?php if (isset($_GET['error'])) {
    $loginError = $_GET['error'];
    ?>
                    <p class="error">
                        <?php
if ($loginError == 'emptyinput') {
        echo "請輸入帳號與密碼";
    } else if ($loginError == 'paswrong') {
        echo "密碼錯誤";
    } else if ($loginError == 'none') {
        echo "帳號不存在";
    } else if ($loginError == 'needlogin') {
        echo "請先登入會員";
    }?>
                    </p>
                <?php }?>
                <!-- Error END--->
                <?php
//Success Info START

if (isset($_GET['update'])) {
    $loginError = $_GET['update'];
    if ($loginError = 'success') {
        echo "<script>alert('請確認信箱並點選連結修改密碼！');</script>";
    }
}
?>
                <!-- After new user creat START--->
                <?php
if (isset($_GET['newpwd'])) {?>
                    <p class="success">
                        <?php echo "修改成功！以新密碼登入"; ?>
                    </p>
                <?php }?>
                <!-- After new user creat -->

                <!-- After reset password START--->
                <?php
if (isset($_GET['newlogin'])) {?>
                    <p class="success">
                        <?php echo "申請成功! 可用新帳號登入"; ?>
                    </p>
                <?php }?>
                <!-- After reset password -->

                <label for="">會員帳號</label>
                <input type="text" name="uaccount" placeholder="user account/email"><br>

                <label for="">密碼</label>
                <input type="password" name="upass" placeholder="password"><br>

                <button type="submit" name="submit">登入</button>
                <a href="signup.php" class="ca">加入會員</a>
                <a href="forget.php" class="ca">忘記密碼?</a>
            </form>
        </div>
    </section>
    <?php
include_once 'footer.php';
?>