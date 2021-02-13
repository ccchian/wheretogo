<!--================Header Area =================-->
<header class="header_area">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <!-- Brand and toggle get grouped for better mobile display -->
            <a class="navbar-brand logo_h" href="index2.php"><img src="image/new/logopic.png" alt="去哪＋1"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offset" id="navbarSupportedContent" class="anchors">
                <ul class="nav navbar-nav menu_nav ml-auto">
                    <li class="nav-item active"><a style="font-size:23px" class="nav-link" href="index2.php">首頁</a></li>

                    <!-- <li class="nav-item"><a class="nav-link" href="accomodation.html">熱門活動</a></li> -->
                    <li class="nav-item"><a style="font-size:22px" class="nav-link" href="topic_data_page.php">活動一覽</a>
                    <li class="nav-item submenu dropdown">
                        <a style="font-size:22px" href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">活動查詢</a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a style="font-size:18px" class="nav-link" href="calendar/calendar1.php">活動行事曆</a></li>
                            <li class="nav-item"><a style="font-size:18px" class="nav-link" href="map/index.php">依地點查詢活動</a></li>
                        </ul>
                    </li>
                    <li class="nav-item" class="anchors"><a style="font-size:22px" style="font-size:25px" class="nav-link" href="addmessage.php">聯絡我們</a></li>
                    <?php
if (isset($_SESSION['uID'])) {
    echo '<li class="nav-item"><a style="font-size:22px" class="nav-link" href="addactivity.php">建立活動</a></li>';
    echo '<li class="nav-item submenu dropdown">
                <a style="font-size:22px" href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">會員資料</a>
                <ul class="dropdown-menu">
                    <li class="nav-item"><a style="font-size:18px" class="nav-link" href="login-system/profile.php">個人資訊修改</a></li>
                    <li class="nav-item"><a style="font-size:18px" class="nav-link" href="myactivity.php">活動資訊修改</a></li>
                </ul>
            </li>';
    echo '<li class="nav-item"><a style="font-size:22px" class="nav-link" href="login-system/includes/logout.inc.php">登出</a></li>';
} else {
    echo '<li class="nav-item"><a style="font-size:22px" class="nav-link" href="login-system/login.php">會員登入</a></li>';
}
?>
                    <!-- <li class="nav-item">
                        <aside class="single_sidebar_widget search_widget">
                            <div class="input-group">
                                <form action="search-bar/search.php" method="POST">
                                    <input type="text" class="form-control mt-3" name="searchBar" placeholder="Search" style="font-size: 14px;
    line-height: 25px;
    border: 0px;
    width: 50%;
    font-weight: 300;
    color: #fff;
    padding-left: 20px;
    border-radius: 45px;
    z-index: 0;
    background: #f3c300;">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit" name="submit" value="submit" style="position: absolute;
    background: transparent;
    box-shadow: none;
    font-size: 14px;
    color: #fff;
    padding: 0px;
    top: 50%;
    z-index: 1;"><i class="lnr lnr-magnifier"></i></button>
                                    </span>
                                </form>
                            </div>
                        </aside>
                    </li> -->
                </ul>
            </div>
        </nav>
    </div>
</header>
<!--================Header Area =================-->