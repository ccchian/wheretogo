<?php
require_once 'includes/class-autoload.inc.php';

if (isset($_POST['from_date']) && isset($_POST['to_date'])) {
    $fromDate = $_POST["from_date"];
    $toDate = $_POST["to_date"];
    if (empty($fromDate) || empty($toDate)) {
        header("Location:index2.php?mess=error");
    } else {
        // ---- INSERT SQL -------
        $filterOBJ = new Filter();
        $filterOBJ->doFilter($fromDate, $toDate);
        header("Location:../index2.php");
    }
} else {
    header("Location:gowhere/index2.php?mess=error");
}
