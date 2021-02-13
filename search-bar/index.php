<?php
require_once 'includes/class-autoload.inc.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Bar using PHP MySQL</title>
</head>

<body>
    <form action="search.php" method="POST">
        <label>Search Bar</label>
        <input type="text" name="searchBar">
        <input type="submit" name="submit" value="submit">
    </form>
</body>

</html>
