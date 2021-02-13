<?php

require_once 'includes/class-autoload.inc.php';
if (isset($_POST['from_date']) && isset($_POST['to_date'])) {
    $fromDate = $_POST["from_date"];
    $toDate = $_POST["to_date"];
    if (empty($fromDate) || empty($toDate)) {
        header("Location:index.php?mess=error");
    } else {
        // ---- INSERT SQL -------
        $filterOBJ = new Filter();
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
    <title>Date Filter Result</title>
</head>
<body>
<div class="container">
        <div class="row">
            <div class="col">
                <div class="cards">
                    <!--執行搜尋結果 輸出在這-->
                    <?php $filterOBJ->doFilter($fromDate, $toDate);?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
