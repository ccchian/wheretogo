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


    <title>忘記密碼</title>
</head>

<body>
    <!--================Header Area =================-->
    <?php
include_once 'header_area.php';
?>
    <section class="sample-text-area">
        <div class="col-lg-8 col-md-8 mx-auto">
            <form action="includes/forget.inc.php" method="POST" class="logform mt-5 p-5 mx-auto">
                <h2>重設密碼</h2>

                <!-- Error START--->
                <?php if (isset($_GET['reset'])) {
    $reset = $_GET['reset'];
    ?>
                    <p class="error">
                        <?php
if ($reset == 'success') {
        echo "已寄出確認信件!";
    } else if ($reset == 'fail') {
        echo "Fail !";
    }?>
                    </p>
                <?php }?>
                <!-- Error END--->

                <p>請輸入信箱，並前往信箱收取重新設定密碼的連結。</p>
                <input type="mail" name="email" placeholder="your email" required>
                <button type="submit" name="resetBtn">送出</button>
            </form>
        </div>
    </section>


    <?php
include_once 'footer.php';
?>