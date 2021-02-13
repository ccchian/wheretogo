<?php
include_once 'header.php';
?>

        <!-- Check tokens in URL -->
        <?php
if (!isset($_POST['updatePassBtn'])) {
    echo "無法執行，請返回登入頁面";
} else {
    $selector = $_GET['selector'];
    $validator = $_GET['validator'];

    if (empty($selector) || empty($validator)) {
        echo "無法執行，請返回登入頁面";
    } else {
        if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false) {
            ?>

<form action="includes/resetPwd.inc.php" method="post">
        <h2>重置密碼</h2>
        <input type="hidden" name="selector" value="<?php echo $selector ?>">
        <input type="hidden" name="validator" value="<?php echo $validator ?>">
        <input type="password" name="pwd" placeholder="Enter new password...">
        <input type="password" name="re_pwd" placeholder="Repeat new password...">
        <button type="submit" name="resetPwdBtn">確認</button>
        <a href="signup.php" class="ca">加入會員</a>
        <a href="forget.php" class="ca">忘記密碼?</a>
    </form>

<?php
}
    }
}

?>



    <?php
include_once 'footer.php';
?>
