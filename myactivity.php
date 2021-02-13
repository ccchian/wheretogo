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

    <?php
        include("cdn.php");
    ?>
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="header_area.css">
    <link rel="stylesheet" href="index/style.css">

    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> -->

    <title>活動資訊修改</title>
    <style>
    .cardimg{
        /* height: 220px; */
        object-fit: cover;
    }
    </style>
</head>
<body>

<?php
include "header_area_myact.php";
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
        echo "<div class='col-md-6 col-sm-12 mb-3 mt-md-0'>";

        echo "<div class='card flex-row flex-wrap p-0 '>";

        echo "<div class='card-header border-0 w-50 h-75 p-0'>";
        echo "<img src='upload_test/" . $x['a_preview'] . "' class='card-img-top cardimg p-0 my-auto d-block' alt='...'>";
        echo "</div>";

        echo "<div class='card-block p-0 w-50 h-75'>";

        echo "<p class='mt-2 mb-1 px-2 textellipsis h5'>" . $x['a_title'] . "</p>";

        echo "<div class='mt-2 mb-1 px-2'>"; 
        echo "<i class='fas fa-map-marker-alt'></i>";
        echo "<span class='mt-2 mb-1 px-2'><small>".$x['a_address']."</small></span>";
        echo "</div>";  

        echo "<div class='mt-2 mb-1 px-2'>";
        echo "<i class='far fa-clock text-dark'></i>";
        echo "<span class='px-2 h6 text-dark'><small>" . $x['a_date_start'] . "-" . $x['a_date_end'] . "</small></span>";
        echo "</div>";

        echo "<div class='mt-2 mb-1 px-2'>"; 
        echo "<i class='fas fa-tags text-muted'></i>";
        echo "<span class='mt-2 mb-1 px-2 text-muted'><small>".$x['a_type']."</small></span>";
        echo "</div>";  

        echo "</div>";



        echo "<div class='card-footer w-100 h-25 p-0'>";
        echo "<div class='d-flex justify-content-center'>";
        if (isset($_SESSION['uID'])) {
            echo "<a href='topic_update.php?a_id=" . $x['a_id'] . "' class='btn btn-primary my-0 mx-1 text-decoration-none text-white btn-sm  btn-block'>編輯</a>";
            echo "<a href='topic_delete.php?a_id=" . $x['a_id'] . "' class='btn btn-danger my-0 mx-1 text-decoration-none text-white btn-sm  btn-block'>刪除</a>";
        }
        echo "<a href='active_page.php?a_id=" . $x['a_id'] . "' class='btn btn-warning my-0 mx-1 text-decoration-none text-white btn-sm  btn-block'>詳細活動內容</a>";
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
<!-- </div> -->
<!-- Card End-->
</section>

<?php
include("footer.php");
include("jsAndBs4.php");
?>

</body>
</html>
<?php
} else {
    header("Location: login-system/login.php");
}
