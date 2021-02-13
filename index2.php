<?php
require_once "index\DB.php";
require_once 'session_start.php';

date_default_timezone_set("Asia/Taipei");
$now = new DateTime();
$stringNow = $now->format('Y-m-d H:i:s');
$date = strtotime($stringNow);
$toDatetime = date('Y-m-d H:i:s', $date);
// echo $toDatetime;
$time_sql = "SELECT * FROM activityform WHERE a_date_start >= ? ORDER BY a_date_start ASC LIMIT 3";
$time_result = $pdo->prepare($time_sql);
$time_result->execute([$toDatetime]);
// $time_result = $stmt->fetchAll(PDO::FETCH_ASSOC);
// $time_result = $pdo -> query($time_sql);

$sql_query = "SELECT * FROM activityform ORDER BY a_id DESC LIMIT 4";
$result = $pdo->query($sql_query); //讀取選取頁的資料
?>
<?php
if (isset($_GET['info'])) {
    $info = $_GET['info']; //得到success
    //echo $info;
    if ($info == 'success') {
?><script>
            alert('留言成功!!!');
        </script>
<?php
    }
}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>去哪 +1</title>
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <?php
    include("cdn.php");
    ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<style>
    .opacity-1 {
        background: rgba(0, 0, 0, 0.6);
        /* background: rgba(243, 195, 0, 0.6); */
    }
</style>
</head>

<body>

    <!--================Header Area =================-->
    <?php
    include("header_area_index.php");
    ?>
    <!--================Header Area =================-->

    <!--================Banner Area =================-->
    <section class="banner_area" id="s2">
        <div class="booking_table d_flex align-items-center">
            <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="banner_content text-center">


                <div class="card opacity-1 text-center mt-5">
                <h1 class="font-weight-bold display-4">去哪 +1</h1>
                    <br>
                    <h5 class="">網羅各式藝文活動、也可以自行辦理讀書會、party等</h5>
                    <br>
                    <h6><a href="login-system/signup.php" class="text-light">
                    深入體驗台南古都 立即加入會員 !</a></h6>
                </div>


                    <!-- <a href="login-system/signup.php" class="btn theme_btn button_hover">
                        <h6>加入會員</h6>
                    </a> -->
                </div>
            </div>
        </div>
        <div class="hotel_booking_area position">
            <div class="container">
                <div class="hotel_booking_table">
                    <div class="col-md-3 m-auto">
                        <h2>活動查詢<br>預定來台南的時間</h2>
                    </div>
                    <div class="col-md-9">
                        <div class="boking_table">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <div class=" book_tabel_item">
                                        <form action="date-filter/filter.php" method="POST">
                                            <div class="form-group">
                                                <div class='input-group date ' id='datetimepicker11'>
                                                    <input type='text' class="form-control" name=" from_date" placeholder="抵達時間" />
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class='input-group date ' id='datetimepicker1'>
                                                    <input type='text' class="form-control" name=" to_date" placeholder="離開時間" />
                                                    <span class="input-group-addon">
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                    </span>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                <div class="col-md-4 m-auto ">
                                    <input type="submit" name="filter" id="filter" style="background-color:#F3C300; width:300px;" class="genric-btn button_hover text-white btn-lg" value="立即查詢">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!--================Banner Area =================-->

    <!--================ Accomodation Area  =================-->
    <section class="accomodation_area section_gap bgc-3">
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_color">最新活動精選</h2>
                <h6>還沒有頭緒想參加什麼活動嗎？來看看我們的最新活動吧！ </h6>
            </div>
            <div class="row">
                <?php
                while ($row_result = $result->fetch(PDO::FETCH_ASSOC)) {
                    //讀取資料到表格內
                    echo "<div class='col-md-3 col-sm-6 mb-3 mt-md-0 '>";
                    echo "<div class='card cardbgc  p-0  border-secondary'>";
                    echo "<img src='upload_test/" . $row_result['a_preview'] . "' class='card-img-top cardimg1 border-bottom  border-secondary' alt='...'>";

                    echo "<div class='card-body p-0'>";

                    echo "<p class='mt-2 mb-1 pl-2 textellipsis h5 card-title'>" . $row_result['a_title'] . "</p>";

                    echo "<div class='mt-2 mb-1 pl-2'>";
                    echo "<i class='far fa-clock text-dark'></i>";
                    echo "<span class='pl-2 h6 text-dark'><small>" . $row_result['a_date_start'] . "</small></span>";
                    echo "</div>";

                    echo "<div class='mt-2 mb-1 pl-2'>";
                    echo "<i class='fas fa-map-marker-alt'></i>";
                    echo "<span class='mt-2 mb-1 pl-2'><small>" . $row_result['a_address'] . "</small></span>";
                    echo "</div>";

                    echo "<div class='mt-2 mb-1 pl-2'>";
                    echo "<i class='fas fa-tags text-muted'></i>";
                    echo "<span class='mt-2 mb-1 pl-2 text-muted'><small>" . $row_result['a_type'] . "</small></span>";
                    echo "</div>";

                    echo "</div>";

                    // echo "<div class='d-flex justify-content-center card-footer p-0'>";  
                    echo "<div class='d-flex justify-content-center card-footer p-0'>";
                    echo "<a href='active_page.php?a_id=" . $row_result['a_id'] . "' class='btn btn-warning mx-0 text-decoration-none text-white btn-block border-0 font-weight-bold'>詳細活動內容</a>";
                    echo "</div>";
                    echo "</div>";
                    // echo "</div>";  
                    echo "</div>";
                }
                ?>

                <!-- <div class="col-lg-3 col-sm-6">
                    <div class="accomodation_item text-center">
                        <div class="activites_img">
                            <img src="image/new/activites5.jpg" class="img-fluid" alt="">

                            <a href="#" class="btn theme_btn button_hover">了解更多</a>
                        </div>
                        <a href="#">
                            <h4 class="sec_h4">在地體驗</h4>
                        </a>

                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="accomodation_item text-center">
                        <div class="activites_img">
                            <img src="image/new/activites3.jpg" class="img-fluid" alt="">
                            <a href="#" class="btn theme_btn button_hover">了解更多</a>
                        </div>
                        <a href="#">
                            <h4 class="sec_h4">人文體驗</h4>
                        </a>

                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="accomodation_item text-center">
                        <div class="activites_img">
                            <img src="image/new/activites4.jpg" class="img-fluid" alt="">
                            <a href="#" class="btn theme_btn button_hover">了解更多</a>
                        </div>
                        <a href="#">
                            <h4 class="sec_h4">人文體驗</h4>
                        </a>

                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="accomodation_item text-center">
                        <div class="activites_img">
                            <img src="image/new/activites.jpg" class="img-fluid" alt="">
                            <a href="#" class="btn theme_btn button_hover">了解更多</a>
                        </div>
                        <a href="#">
                            <h4 class="sec_h4">熱門活動</h4>
                        </a>

                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!--================ Accomodation Area  =================-->

    <!--================ Facilities Area  =================-->
    <section class="facilities_area section_gap">
        <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background="">
        </div>
        <div class="container">
            <div class="section_title text-center">
                <h2 class="text-center mb-2 font-weight:bold" style="color:#FFE4CA;" ;>活動行事曆</h2>
                <h6 class="text-center mb-4" style="color:#FFE4CA" ;>快來建立專屬於你的行事曆吧！！</h6>
            </div>

            <section class="container my-5">
                <div class="row">
                    <div class="col-md-6 col-lg-3 cal_hover p-0" onclick="location.href='calendar/calendar1.php'">
                        <div class="text-center p-1 my-md-3 my-lg-3">
                            <img src="https://www.flaticon.com/svg/static/icons/svg/651/651758.svg" alt="" class="services-logo">
                            <h4 class="my-2">音樂戲劇</h4>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 cal_hover p-0" onclick="location.href='calendar/calendar2.php'">
                        <div class="text-center p-1 my-md-3 my-lg-3">
                            <img src="https://www.flaticon.com/premium-icon/icons/svg/853/853375.svg" alt="" class="services-logo">
                            <h4 class="my-2">藝文展覽</h4>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 cal_hover p-0" onclick="location.href='calendar/calendar3.php'">
                        <div class="text-center p-1 my-md-3 my-lg-3">
                            <img src="https://www.flaticon.com/svg/static/icons/svg/2121/2121288.svg" alt="" class="services-logo">
                            <h4 class="my-2">旅遊美食</h4>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 cal_hover p-0" onclick="location.href='calendar/calendar4.php'">
                        <div class="text-center p-1 my-md-3 my-lg-3">
                            <img src="https://www.flaticon.com/svg/static/icons/svg/3068/3068421.svg" alt="" class="services-logo">
                            <h4 class="my-2">課程講座</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-3 cal_hover p-0" onclick="location.href='calendar/calendar5.php'">
                        <div class="text-center p-1 my-md-3 my-lg-3">
                            <img src="https://www.flaticon.com/svg/static/icons/svg/3673/3673767.svg" alt="" class="services-logo">
                            <h4 class="my-2">市集</h4>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 cal_hover p-0" onclick="location.href='calendar/calendar6.php'">
                        <div class="text-center p-1 my-md-3 my-lg-3">
                            <img src="https://www.flaticon.com/svg/static/icons/svg/763/763812.svg" alt="" class="services-logo">
                            <h4 class="my-2">運動</h4>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 cal_hover p-0" onclick="location.href='calendar/calendar7.php'">
                        <div class="text-center p-1 my-md-3 my-lg-3">
                            <img src="https://www.flaticon.com/svg/static/icons/svg/3174/3174848.svg" alt="" class="services-logo">
                            <h4 class="my-2">公益</h4>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 cal_hover p-0" onclick="location.href='calendar/calendar8.php'">
                        <div class="text-center p-1 my-md-3 my-lg-3">
                            <img src="https://www.flaticon.com/svg/static/icons/svg/248/248924.svg" alt="" class="services-logo">
                            <h4 class="my-2">其它</h4>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
    <!--================ Facilities Area  =================-->
    <!--================ comeing soon Area  =================-->
    <section class="latest_blog_area section_gap bgc-3">
        <div class="container">
            <div class="section_title text-center">
                <h2 class="title_color">即將到來的活動</h2>
                <h6>快來看看接下來有什麼值得期待的活動吧！ </h6>
            </div>
            <div class="row card-deck">

                <?php
                while ($row_time_result = $time_result->fetch(PDO::FETCH_ASSOC)) {
                    //讀取資料到表格內
                    echo "<div class='col-md-4 col-sm-12 mb-3 mt-md-0'>";
                    echo "<div class='card cardbgc border-secondary p-0'>";
                    echo "<img src='upload_test/" . $row_time_result['a_preview'] . "' class='card-img-top cardimg2 border-bottom  border-secondary' alt='...'>";

                    echo "<div class='card-body p-0 '>";

                    echo "<p class='mt-2 mb-1 pl-2 textellipsis h5 card-title'>" . $row_time_result['a_title'] . "</p>";

                    echo "<div class='mt-2 mb-1 pl-2'>";
                    echo "<i class='far fa-clock text-dark'></i>";
                    echo "<span class='pl-2 h6 text-dark'><small>" . $row_time_result['a_date_start'] . " — " . $row_time_result['a_date_end'] . "</small></span>";
                    echo "</div>";

                    echo "<div class='mt-2 mb-1 pl-2'>";
                    echo "<i class='fas fa-map-marker-alt'></i>";
                    echo "<span class='mt-2 mb-1 pl-2'><small>" . $row_time_result['a_address'] . "</small></span>";
                    echo "</div>";

                    echo "<div class='mt-2 mb-1 pl-2'>";
                    echo "<i class='fas fa-tags text-muted '></i>";
                    echo "<span class='mt-2 mb-1 pl-2 text-muted'><small>" . $row_time_result['a_type'] . "</small></span>";
                    echo "</div>";

                    echo "</div>";

                    echo "<div class='d-flex justify-content-center card-footer p-0'>";
                    echo "<a href='active_page.php?a_id=" . $row_time_result['a_id'] . "' class='btn btn-warning mx-0 text-decoration-none text-white btn-block border-0 font-weight-bold'>詳細活動內容</a>";
                    echo "</div>";
                    // echo "</div>";  
                    echo "</div>";
                    echo "</div>";
                }
                ?>

                <!-- <div class="col-lg-4 col-md-6">
                    <div class="single-recent-blog-post">
                        <div class="thumb">
                            <img class="img-fluid" src="image/new/activity1.jpg" alt="post">
                        </div>
                        <div class="details">
                            <div class="tags">
                                <a href="#" class="button_hover tag_btn">台版亞馬遜河</a>

                            </div>
                            <a href="#">
                                <h4 class="sec_h4">安南區-台江國家公園</h4>
                            </a>
                            <p>悠閒午後，戴上斗笠，乘著竹筏，探索綠色隧道內紅樹林的多樣生態</p>
                            <h6 class="date title_color">活動日期：2020/11/01-2020/12/31</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-recent-blog-post">
                        <div class="thumb">
                            <img class="img-fluid" src="image/new/activity2.jpg" alt="post">
                        </div>
                        <div class="details">
                            <div class="tags">
                                <a href="#" class="button_hover tag_btn">大魚的祝福</a>

                            </div>
                            <a href="#">
                                <h4 class="sec_h4">安平區-港濱歷史公園 </h4>
                            </a>
                            <p>四周環海的福爾摩沙，乘載著不同時代的記憶，以擬化的鯨魚帶著文化的底蘊，帶著這些力量與故事續寫這塊土地的下一章</p>
                            <h6 class="date title_color">活動日期：2020/11/01-2020/12/31</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-recent-blog-post">
                        <div class="thumb">
                            <img class="img-fluid" src="image/new/activity3.jpg" alt="post">
                        </div>
                        <div class="details">
                            <div class="tags">
                                <a href="#" class="button_hover tag_btn">中西區-國華街</a>
                            </div>
                            <a href="#">
                                <h4 class="sec_h4">最道地的台南美食街</h4>
                            </a>
                            <p>號稱美食之都的台南，隨處可見上過電視的街頭美食，從古早味的青草茶到異國風味的泰奶，打開你的五感細細品嚐這城市的風味</p>
                            <h6 class="date title_color">活動日期：2020/12/1-2020/12/31</h6>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!--================ Testimonial Area  =================-->
    <section class="testimonial_area section_gap py-3 bgc-4">
        <div class="container">
            <div class="anchors">
                <div class="section_title text-center">

                    <section id="s1">
                        <h2 class="title_color">評價留言區</h2>
                        <p>參加活動後有什麼感動或新奇的呢？歡迎留下你的參與經驗與大家分享 </p>
                        <div>
                        </div>
                        <form action="index/edit3.php" method="post" class="smart-green">
                            <h1>留言資訊
                                <span>請留下你的資訊</span>
                            </h1>
                            <label>
                                <span>姓名 :</span>
                                <input id="name" type="text" name="name" class="error" placeholder="請輸入您的姓名" />
                                <div class="error-msg"></div>
                            </label>

                            <label>
                                <span>電子信箱 :</span>
                                <input id="email" type="email" value="" name="email" placeholder="請輸入電子信箱email" />
                                <div class="error-msg"></div>
                            </label>

                            <label>
                                <span>留言 :</span>
                                <textarea id="message" name="message" placeholder="請輸入你的建議"></textarea>
                                <div class="error-msg"></div>
                            </label>

                            <div class="success-msg"></div>

                            <!-- <label>  
        <input type="submit" class="button" value="提交"/>
    </label> -->
                            <input type="hidden" name="command" value="insert">



                            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                確認送出
                            </button>

                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">訊息</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            請再次確認輸入的訊息
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-secondary" data-dismiss="modal">關閉</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                </div>
                </section></section>

                <!-- <div class="col-lg-4 col-sm-12 footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>

                </div> -->
            <!-- </div>
        </div>
        </footer> -->
        <!--================ End footer Area  =================-->


        <?php
        include("footer.php");
        ?>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="js/jquery-3.2.1.min.js"></script>
        <script src="js/popper.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.js"></script>
        <script src="vendors/nice-select/js/jquery.nice-select.js"></script>
        <script src="js/mail-script.js"></script>
        <script src="js/stellar.js"></script>
        <script src="vendors/lightbox/simpleLightbox.min.js"></script>
        <script src="js/custom.js"></script>
</body>

</html>