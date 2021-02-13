<?php
include "topic_pdo.php";
require_once 'session_start.php';

if (isset($_SESSION['uID'])) {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <?php
include "cdn.php";
    ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <title>活動資訊修改</title>
</head>
<body>

<?php
include "header_area.php";
    ?>
<!-- Card Start-->
<section class="sample-text-area">
    <div class="container mt-5">
    <div class="row">
    <?php
$sql = 'SELECT * FROM host INNER JOIN activityform ON activityform.a_id=host.a_id WHERE u_id=' . $_SESSION['uID'] . ';';
    $stmt = $db_link->query($sql);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($result as $x) {
        //print_r($x);
        echo "<div class='col-md-4 col-sm-6 mb-3 mt-md-0'>";
        echo "<div class='card cardbgc p-0'>";
        echo "<img src='upload_test/" . $x['a_preview'] . "' class='card-img-top cardimg' alt='...'>";

        echo "<div class='card-body p-0 '>";

        echo "<div class='mt-2 mb-1 px-2'>";
        echo "<i class='far fa-clock text-dark'></i>";
        echo "<span class='px-2 h6 text-dark'>" . $x['a_date_start'] . "-" . $x['a_date_end'] . "</span>";
        echo "</div>";

        echo "<p class='mt-2 mb-1 px-2 textellipsis h5'>" . $x['a_title'] . "</p>";

        echo "<div class='d-flex justify-content-center'>";
        if (isset($_SESSION['uID'])) {
            echo "<a href='topic_update.php?a_id=" . $x['a_id'] . "' class='btn btn-primary mx-2 text-decoration-none text-white'>編輯</a>";
            echo "<a href='topic_delete.php?a_id=" . $x['a_id'] . "' class='btn btn-danger mx-2 text-decoration-none text-white'>刪除</a>";
        }
        echo "<a href='active_page.php?a_id=" . $x['a_id'] . "' class='btn btn-secondary mx-2 text-decoration-none text-white'>詳細活動內容</a>";
        // echo "<a href='active_page.php?a_id=".$x['a_id']."' class='btn btn-secondary mx-0 text-decoration-none text-white btn-block btn-lg'>詳細活動內容</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        // echo "</div>";
        echo "</div>";
    }
    //  else {
    //     echo "您尚未建立任何活動";
    // }

    //     ?>
    </div>
    </div>
</div>
<!-- Card End-->
</section>
<?php
include "footer.php";
    ?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
</html>
<?php
} else {
    header("Location: login-system/login.php");
}
