<?php
require_once 'session_start.php';

    include("topic_pdo.php");

    if (isset($_GET['a_id'])){
        $a_id = $_GET['a_id'];
        $sql_select = "SELECT a_id, a_organizer, a_title, a_date_start, a_date_end,a_city, a_area, a_road, a_address, latitude, longitude, a_preview, a_url, a_text, a_price, a_type, id_event FROM activityform WHERE a_id = :a_id";
        $stmt = $db_link -> prepare($sql_select);
        $stmt -> execute([':a_id'=>$a_id]);
        $row_result = $stmt -> fetch();
        $a_organizer = $row_result["a_organizer"];
        $a_title = $row_result["a_title"];
        $a_date_start = $row_result["a_date_start"];
        $a_date_end = $row_result["a_date_end"];
        // $city
        // $area
        // $road,address
        $a_address = $row_result["a_address"];
        // $latitude_data
        // $longitude_data
        $a_preview = $row_result["a_preview"];
        $a_url = $row_result["a_url"];
        $a_text = $row_result["a_text"];
        $a_price = $row_result["a_price"];
        $a_type = $row_result["a_type"];
        $id_event = $row_result["id_event"];
        $a_id = $row_result["a_id"];
        switch($a_type){
            case "音樂戲劇":
                $id_calendar = "k5s35kegneqj0hv1jrblrp3pfo@group.calendar.google.com";
            break;

            case "藝文展覽":
                $id_calendar = "3oo9e88mf64gspfmer5q7psa6s@group.calendar.google.com";
            break;

            case "課程講座":
                $id_calendar = "nqbbsh8klugv0s9runjbl1tscs@group.calendar.google.com";
            break;

            case "旅遊美食":
                $id_calendar = "peao0cj5r50j45jc7ncf8bos7g@group.calendar.google.com";
            break;

            case "市集":
                $id_calendar = "090jpt3biktimd6e7pv45ctlg4@group.calendar.google.com";
            break;

            case "運動":
                $id_calendar = "2fokd3n4e0i0dijokm4svp5r5s@group.calendar.google.com";
            break;

            case "公益":
                $id_calendar = "sm04tudqvm0qsst7ah3s5bi0r0@group.calendar.google.com";
            break;

            case "其他":
                $id_calendar = "iinlgr3s9qqasu0k81d6ihs2i8@group.calendar.google.com";
            break;
            }

    }
	if(isset($_POST["action"])&&($_POST["action"]=="update")){

        $a_organizer = $_POST["a_organizer"];
        $a_title = $_POST["a_title"];
        $a_date_start = $_POST["a_date_start"];
        $a_date_end = $_POST["a_date_end"];
        $a_address = $_POST["a_address"];
        $a_url = $_POST["a_url"];
        $a_text = $_POST["a_text"];
        $a_price = $_POST["a_price"];

        date_default_timezone_set('Asia/Taipei');
        include_once 'vendor/autoload.php';
        //設置環境變量/設置環境變量
        putenv('GOOGLE_APPLICATION_CREDENTIALS=my-project-gclab-294311-d3e41f7d3b41.json');
        $client = new Google_Client();
        $client->useApplicationDefaultCredentials();
        $client->setScopes(['https://www.googleapis.com/auth/calendar']);
    
        $calendarService = new Google_Service_Calendar($client);

        $datetime_start = new DateTime($a_date_start);
        $datetime_end = new DateTime($a_date_end);    
        $time_start =$datetime_start->format(\DateTime::RFC3339);
        $time_end=$datetime_end->format(\DateTime::RFC3339);
    

        $event = $calendarService->events->get($id_calendar, $id_event);
        $event->setSummary('活動名稱： '.$a_title);
        $event->setLocation('活動地點： '.$a_address);
        $event->setDescription('活動連結： '.$a_url);

        $start = new Google_Service_Calendar_EventDateTime();
        $start->setDateTime($time_start);
        $event->setStart($start);

        $end = new Google_Service_Calendar_EventDateTime();
        $end->setDateTime($time_end);
        $event->setEnd($end);

        $updatedEvent = $calendarService->events->update($id_calendar, $event->getId(), $event);
        
        $sql_query = "UPDATE activityform SET a_organizer = :a_organizer, a_title = :a_title, a_date_start = :a_date_start, a_date_end = :a_date_end, a_address = :a_address, a_preview = :a_preview, a_url = :a_url, a_text = :a_text, a_price = :a_price WHERE a_id = :a_id";
        
        $stmt = $db_link -> prepare($sql_query);
        
        $stmt -> bindParam(':a_organizer', $a_organizer, PDO::PARAM_STR);
        $stmt -> bindParam(':a_title', $a_title, PDO::PARAM_STR);
        $stmt -> bindParam(':a_date_start', $a_date_start, PDO::PARAM_STR);
        $stmt -> bindParam(':a_date_end', $a_date_end, PDO::PARAM_STR);
        $stmt -> bindParam(':a_address', $a_address, PDO::PARAM_STR);
        $stmt -> bindParam(':a_preview', $a_preview, PDO::PARAM_STR);
        $stmt -> bindParam(':a_url', $a_url, PDO::PARAM_STR);
        $stmt -> bindParam(':a_text', $a_text, PDO::PARAM_STR);
        $stmt -> bindParam(':a_price', $a_price, PDO::PARAM_INT);
        $stmt -> bindParam(':a_id', $a_id, PDO::PARAM_INT);

        $stmt -> execute();
        
		$stmt=null;
		$db_link=null;
		//重新導向回到主畫面
        header("Location: myactivity.php");
        echo '$a_type';
        echo $a_type;
        echo '$id_event';
        echo $id_event;
        echo '$id_calendar';
        echo $id_calendar;
    }

    
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>更新活動資料</title>

<?php
        include("cdn.php");
?>
<link rel="stylesheet" href="header_area.css">
<link rel="stylesheet" href="css/responsive.css">

<style>
    body{
        font-family: 'Noto Sans TC', sans-serif;
        font-weight: 300;
        background-color: #FFF3EE;
    }
    
    .btn-danger{
            background-color: #AE0000;
        }

    .btn-primary{
        background-color: #005AB5;
    }

    .jumbotronbg {
    background-image:url("https://cdn.pixabay.com/photo/2016/10/16/16/58/salt-pan-1745796_1280.jpg");
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    height: 400px;
    }

    .hr_sty{
        border-top:3px solid #5B5B5B ;
    }

    .opacity-1 {
        background: rgba(255, 218, 200, 0.6);
    }
</style>
<script>
$.fn.datetimepicker.Constructor.Default = $.extend({},
            $.fn.datetimepicker.Constructor.Default,
            { icons:
                    { time: 'fas fa-clock',
                        date: 'fas fa-calendar',
                        up: 'fas fa-arrow-up',
                        down: 'fas fa-arrow-down',
                        previous: 'fas fa-arrow-circle-left',
                        next: 'fas fa-arrow-circle-right',
                        today: 'far fa-calendar-check-o',
                        clear: 'fas fa-trash',
                        close: 'far fa-times' } });


</script>
</head>
<body>

    <?php
        include("header_area.php");
    ?>

    <div class="jumbotron jumbotronbg jumbotron-fluid mb-3">
        <div class="card opacity-1 text-center mt-5">
            <h1 class="display-3  ">更新活動資料</h1>
            <hr class="my-3 hr_sty">
            <a href="topic_data_page.php" class="h4">回主畫面</a>
        </div>
    </div>

    <div class="container">
        <form action="" method="post" name="formFix" id="formFix">

            <div class="form-row col-md-12 mb-1 px-0 mx-0">
                <label for="a_organizer" class="mb-1">主辦單位</label>
                <input type="text" name="a_organizer" id="a_organizer" class="form-control" placeholder="" required="required" value="<?php echo $a_organizer;?>">
            </div>

            <div class="form-row col-md-12 mb-1 px-0 mx-0">
                <label for="a_title" class="mb-1">活動名稱</label>
                <input type="text" name="a_title" id="a_title" class="form-control" placeholder="" value="<?php echo $a_title;?>">
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-1 mx-0">
                    <label for="a_date_start" class="mb-1">活動開始時間</label>
                    <div class="input-group date"  id="datetimepicker1" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="a_date_start" value="<?php echo $a_date_start;?>">
                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>            
                <div class="col-md-6 mb-1 mx-0">
                    <label for="a_date_end" class="mb-1">活動結束時間</label>
                    <div class="input-group date"  id="datetimepicker2" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2" name="a_date_end" value="<?php echo $a_date_end;?>">
                        <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row col-md-12 mb-1 px-0 mx-0">
            <label for="a_address" class="mb-1">活動地點</label>
                <input type="text" name="a_address" id="a_address" class="form-control" placeholder="" required="required" value="<?php echo $a_address;?>">
            </div>

            <div class="form-row">
                <div class="form-row col-md-6 mb-1 mx-0">
                    <label for="a_price" class="mb-1">活動費用</label>
                    <input type="text" name="a_price" id="a_price" class="form-control" placeholder="" value="<?php echo $a_price;?>">
                </div>
                <div class="form-row col-md-6 mb-1 mx-0">
                    <label for="a_type" class="mb-1">活動類型</label>
                    <!-- <input type="text" name="a_type" id="type" class="form-control" placeholder="" value="<?php echo $a_type;?>"> -->
                    <!-- <select class="form-control" name="a_type" value="<?php echo $a_type;?>">
                        <option selected value="k5s35kegneqj0hv1jrblrp3pfo@group.calendar.google.com">音樂戲劇</option>
                        <option value="3oo9e88mf64gspfmer5q7psa6s@group.calendar.google.com">藝文展覽</option>
                        <option value="nqbbsh8klugv0s9runjbl1tscs@group.calendar.google.com">課程講座</option>
                        <option value="peao0cj5r50j45jc7ncf8bos7g@group.calendar.google.com">旅遊美食</option>
                        <option value="090jpt3biktimd6e7pv45ctlg4@group.calendar.google.com">市集</option>
                        <option value="2fokd3n4e0i0dijokm4svp5r5s@group.calendar.google.com">運動</option>
                        <option value="sm04tudqvm0qsst7ah3s5bi0r0@group.calendar.google.com">公益</option>
                        <option value="iinlgr3s9qqasu0k81d6ihs2i8@group.calendar.google.com">其他</option>
                    </select> -->
                    <input type="text" name="a_type" id="a_type" class="form-control" placeholder="" value="<?php echo $a_type;?>"  readonly="readonly">
                </div>
            </div>

            <div class="form-row col-md-12 mb-1 px-0 mx-0">
                <label for="a_url" class="mb-1">活動連結</label>
                <input type="text" name="a_url" id="a_url" class="form-control" placeholder="" value="<?php echo $a_url;?>">
            </div>

            <div class="form-row col-md-12 mb-1 px-0 mx-0">
                <label for="a_text" class="mb-1">活動文章</label>
                <textarea rows="8" name="a_text" id="a_text" class="form-control" placeholder="">
                <?php echo $a_text;?>
                </textarea>
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-1 mx-0">
                    <input type="submit" name="button" id="button" value="更新資料" class="btn btn-primary btn-block my-2">
                </div>            
                <div class="col-md-6 mb-1 mx-0">
                    <input type="reset" name="button2" id="button2" value="重新填寫" class="btn btn-danger btn-block my-2">
                </div>
            </div>
            <input name="id" type="hidden" value="<?php echo $a_id;?>">
            <input name="action" type="hidden" value="update">
        </form>
    </div>

<?php
include("footer.php");
?>


<?php
include("jsAndBs4.php");
?>
</body>
</html>
<?php 
    $stmt=null;
    $db_link=null;
?>