<?php
include "topic_pdo.php";
require_once 'session_start.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>建立新活動</title>
    <?php
include "cdn.php";
?>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="header_area.css">
    <link rel="stylesheet" href="css/responsive.css">

    <style>
        .jumbotronbg {
            /* background-image:url("https://cdn.pixabay.com/photo/2016/10/16/16/58/salt-pan-1745796_1280.jpg");
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover; */
            height: 400px;
        }
        .bg-1{
            background-color: #f3c300;
        }

        .bg-2{
            background-color: #333;
        }

        a:hover {
            color: #627585;
            text-decoration: none;
        }

        .hr_sty{
        border-top:3px solid #F8F9FA ;
        }

        .footer_a{
            color:#bdbdbd;
        }
    </style>
</head>
<body>

<?php
include "header_area_add.php";
?>

<div class="jumbotron jumbotronbg jumbotron-fluid bg-1 ">
  <div class="container text-center mt-5">
    <h1 class="display-3 text-light font-weight-bold">建立新活動</h1>
    <hr class="my-3 hr_sty">
    <p class="h4 text-light">快來創建一個新活動吧！</p>
  </div>
</div>

<div class="container mb-5" id="dialog" >

        <form action="topic_insert.php" method="post" enctype="multipart/form-data">

            <div class="form-row col-md-12 mb-1 px-0 mx-0">
                <label for="a_organizer" class="mb-1 h5">主辦單位</label>
                <input type="text" name="a_organizer" id="a_organizer" class="form-control" placeholder="" required="required">
            </div>

            <div class="form-row col-md-12 mb-1 px-0 mx-0">
                <label for="a_title" class="mb-1 h5">活動名稱</label>
                <input type="text" name="a_title" id="a_title" class="form-control" placeholder="" required="required">
            </div>

            <div class="form-row">
                <div class="form-row col-md-6 mb-1 mx-0">
                    <label for="a_city" class="mb-1 h5">縣市</label>
                    <select class="form-control" id="a_city" name="a_city">
                        <option value="" selected disabled>選縣市</option>
                    </select>
                </div>
                <div class="form-row col-md-6 mb-1 mx-0">
                    <label for="a_area" class="mb-1 h5">區</label>
                    <select class="form-control" id="a_area" name="a_area">
                        <option value="" selected disabled>選區域</option>
                    </select>
                </div>
            </div>

            <div class="form-row col-md-12 mb-1 px-0 mx-0">
                <label for="a_road" class="mb-1 h5">地址</label>
                <input type="text" name="a_road" id="a_road" class="form-control" placeholder="" required="required">
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-1 mx-0">
                    <label for="a_date_start" class="mb-1 h5">活動開始時間</label>
                    <div class="input-group date"  id="datetimepicker1" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="a_date_start"/>
                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 mb-1 mx-0">
                    <label for="a_date_end" class="mb-1 h5">活動結束時間</label>
                    <div class="input-group date"  id="datetimepicker2" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2" name="a_date_end"/>
                        <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-row col-md-6 mb-1 mx-0">
                    <label for="a_price" class="mb-1 h5">活動費用</label>
                    <input type="text" name="a_price" id="a_price" class="form-control" placeholder="" required="required">
                </div>
                <div class="form-row col-md-6 mb-1 mx-0">
                    <label for="a_type" class="mb-1 h5">活動類型</label>
                    <select class="form-control" name="a_type">
                        <option selected value="k5s35kegneqj0hv1jrblrp3pfo@group.calendar.google.com">音樂戲劇</option>
                        <option value="3oo9e88mf64gspfmer5q7psa6s@group.calendar.google.com">藝文展覽</option>
                        <option value="nqbbsh8klugv0s9runjbl1tscs@group.calendar.google.com">課程講座</option>
                        <option value="peao0cj5r50j45jc7ncf8bos7g@group.calendar.google.com">旅遊美食</option>
                        <option value="090jpt3biktimd6e7pv45ctlg4@group.calendar.google.com">市集</option>
                        <option value="2fokd3n4e0i0dijokm4svp5r5s@group.calendar.google.com">運動</option>
                        <option value="sm04tudqvm0qsst7ah3s5bi0r0@group.calendar.google.com">公益</option>
                        <option value="iinlgr3s9qqasu0k81d6ihs2i8@group.calendar.google.com">其他</option>
                    </select>
                </div>
            </div>

            <div class="form-row col-md-12 mb-1 px-0 mx-0">
                <label for="a_url" class="mb-1 h5">活動連結</label>
                <input type="text" name="a_url" id="a_url" class="form-control" placeholder="">
            </div>

            <div class="form-row col-md-12 mb-1 px-0 mx-0">
            <input name="file" type="file" id="file" class="form-control-file" accept="image/*" onchange="checkfile(this);">
            </div>

            <div class="form-row col-md-12 mb-1 px-0 mx-0">
                <label for="a_text" class="mb-1 h5">活動文章</label>
                <textarea rows="8" name="a_text" id="a_text" class="form-control" placeholder="" required="required">
                </textarea>
            </div>

            <input type="submit" name="submit" id="submit" value="送出表單" class="btn btn-primary btn-block mt-3 mb-5 btn-lg h5">

        </form>


    </div>


<?php
include "footer.php";
include "jsAndBs4.php";
?>
</body>
</html>