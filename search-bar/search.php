<?php
require_once 'includes/class-autoload.inc.php';
if (isset($_POST['searchBar'])) {
    $searchBar = $_POST['searchBar'];
    // $actName = $_POST['actName'];
    // $startDate = $_POST['startDate'];
    // $startTime = $_POST['startTime'];
    // $endDate = $_POST['endDate'];
    // $endTime = $_POST['endTime'];
    // $cityName = $_POST['city'];
    // $areaName = $_POST['area'];
    // $roadName = $_POST['road'];
    // $actAddress
    if (empty($searchBar)) {
        header("Location:index.php?mess=error");
    } else {
        // ---- INSERT SQL -------
        $searchOBJ = new search();
    }
} else {
    header("Location: index.php?mess=error");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Google Font-->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <!--Stylesheet-->
    <link rel="stylesheet" href="style.css">
    <title>搜尋結果</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="cards">
                    <!--執行搜尋結果 輸出在這-->
                    <?php $searchOBJ->doSearch($searchBar);?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
