<?php
include_once 'sessionStart.php';
//確定有session才能進來
//給看帳號信箱 提供修改密碼按鈕 導向reset
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

        <?php
        include("../cdn.php");
    ?>
        <link rel="stylesheet" href="../header_area.css">
        <link rel="stylesheet" href="../index/style.css">
        <link rel="stylesheet" href="../css/responsive.css">

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

        <title>會員資料</title>
</head>

<body>
        <!--================Header Area =================-->
        <?php
include_once 'header_area.php';
?>
        <section class="sample-text-area">
<div class="col-lg-8 col-md-8 mx-auto">

                <form action="includes/updatePass.inc.php" method="post" class="logform mt-5 p-4 mx-auto">
                        <h2>個人資料</h2>

                        <!-- Success Info START--->
                        <?php
if (isset($_GET['update'])) {
    $loginError = $_GET['update'];
    if ($loginError = 'success') {?>
                                        <script>
                                                alert("請確認信箱並點選連結修改密碼！");
                                        </script>
                        <?php
header("Location: includes/logout.inc.php");
    }
}?>
                        <!-- Success Info START--->


                        <label for="">會員帳號</label>
                        <?php
echo '<input type="text" name="uaccount" readonly="readonly" value="' . $_SESSION['uAccount'] . '"><br>';
?>
                        <label for="">名</label>
                        <?php
echo '<input type="text" name="ufname" readonly="readonly" value="' . $_SESSION['uFname'] . '"><br>';
?>

                        <label for="">姓氏</label>
                        <?php
echo '<input type="text" name="ulname" readonly="readonly" value="' . $_SESSION['uLname'] . '"><br>';
?>

                        <label for="">Email</label>
                        <?php
echo '<input type="email" name="uemail" readonly="readonly" value="' . $_SESSION['uEmail'] . '"><br>';
?>

                        <label for="">連絡電話</label>
                        <?php
echo '<input type="text" name="uphone" readonly="readonly" value="' . $_SESSION['uPhone'] . '"><br>';
?>

                        <button type="submit" name="updatePassBtn" id="updatePassBtn">修改密碼</button>
                        <a href="../index2.php" class="ca">返回</a>
                </form>
                </div>
        </section>

        <?php
      include("footer.php");
      ?>