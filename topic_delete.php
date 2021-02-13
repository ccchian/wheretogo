<?php 
require_once 'session_start.php';

    include("topic_pdo.php");
    $a_id = $_GET['a_id'];
    if (isset($_GET['a_id'])){
        $sql_select = "SELECT a_id, a_organizer, a_title, a_date_start, a_date_end, a_address, a_preview, a_url, a_text, a_price, a_type, id_event FROM activityform WHERE a_id = :a_id";
        $stmt = $db_link -> prepare($sql_select);
        $stmt -> execute([':a_id'=>$a_id]);
        $row_result = $stmt -> fetch();
        $a_organizer = $row_result["a_organizer"];
        $a_title = $row_result["a_title"];
        $a_date_start = $row_result["a_date_start"];
        $a_date_end = $row_result["a_date_end"];
        $a_address = $row_result["a_address"];
        // $summary = $row_result["summary"];
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



	if(isset($_POST["action"])&&($_POST["action"]=="delete")){	
        // echo "ffff";
        date_default_timezone_set('Asia/Taipei');
        include_once 'vendor/autoload.php';
        //設置環境變量/設置環境變量
        putenv('GOOGLE_APPLICATION_CREDENTIALS=my-project-gclab-294311-d3e41f7d3b41.json');
        $client = new Google_Client();
        $client->useApplicationDefaultCredentials();
        $client->setScopes(['https://www.googleapis.com/auth/calendar']);
    
        $calendarService = new Google_Service_Calendar($client);
        $calendarService->events->delete($id_calendar, $id_event);

        $sql_query = "DELETE FROM activityform WHERE a_id=:a_id";
		$stmt = $db_link -> prepare($sql_query);
		$stmt -> execute([':a_id'=>$a_id]);
		$stmt=null;
        $db_link=null;

        // echo $a_type;
        // echo $id_event;
        // echo $id_calendar;

        header("Location: myactivity.php");

    }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>刪除活動</title>

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
</head>
<body>

    <?php
        include("header_area.php");
    ?>

	<div class="jumbotron jumbotronbg jumbotron-fluid mb-3">
        <div class="card opacity-1 text-center mt-5">
            <h1 class="display-3  ">刪除活動資料</h1>
            <hr class="my-3 hr_sty">
            <a href="topic_data_page.php" class="h4">回主畫面</a>
        </div>
    </div>

	<div class="container">   
        <form action="" method="post" name="formFix" id="formFix">
        
            <div class="form-row col-md-12 mb-1 px-0 mx-0">
                <label for="a_organizer" class="mb-1">主辦單位</label>
                <input type="text" name="a_organizer" id="a_organizer" class="form-control" placeholder="" required="required" value="<?php echo $a_organizer;?>"readonly="readonly">
            </div>

            <div class="form-row col-md-12 mb-1 px-0 mx-0">
                <label for="a_title" class="mb-1">活動名稱</label>
                <input type="text" name="a_title" id="a_title" class="form-control" placeholder="" value="<?php echo $a_title;?>"  readonly="readonly">
            </div>

            <div class="form-row">
                <div class="col-md-6 mb-1 mx-0">
                    <label for="a_date_start" class="mb-1">活動開始時間</label>
                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="a_date_start" value="<?php echo $a_date_start;?>" readonly="readonly">
                </div>            
                <div class="col-md-6 mb-1 mx-0">
                    <label for="a_date_end" class="mb-1">活動結束時間</label>
                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2" name="a_date_end" value="<?php echo $a_date_end;?>" readonly="readonly">
                </div>
            </div>

            <div class="form-row col-md-12 mb-1 px-0 mx-0">
            <label for="a_address" class="mb-1">活動地點</label>
                <input type="text" name="a_address" id="a_address" class="form-control" placeholder="" value="<?php echo $a_address;?>" readonly="readonly">
            </div>

            <div class="form-row">
                <div class="form-row col-md-6 mb-1 mx-0">
                    <label for="a_price" class="mb-1">活動費用</label>
                    <input type="text" name="a_price" id="a_price" class="form-control" placeholder="" value="<?php echo $a_price;?>"  readonly="readonly">
                </div>
                <div class="form-row col-md-6 mb-1 mx-0">
                    <label for="a_type" class="mb-1">活動類型</label>
                    <input type="text" name="a_type" id="a_type" class="form-control" placeholder="" value="<?php echo $a_type;?>"  readonly="readonly">
                </div>
            </div>

            <div class="form-row col-md-12 mb-1 px-0 mx-0">
                <label for="a_url" class="mb-1">活動連結</label>
                <input type="text" name="a_url" id="a_url" class="form-control" placeholder="" value="<?php echo $a_url;?>" readonly="readonly">
            </div>

            <div class="form-row col-md-12 mb-1 px-0 mx-0">
                <label for="a_text" class="mb-1">活動文章</label>
                <textarea rows="8" name="a_text" id="a_text" class="form-control" placeholder="" readonly="readonly">
                <?php echo $a_text;?>
                </textarea>
            </div>           
			
			<div class="form-row col-md-12 mb-1 px-0 mx-0">
		        <input type="submit" name="button" id="button" value="刪除資料" class="btn btn-danger btn-block my-2">
			</div>
			<input name="id" type="hidden" value="<?php echo $id;?>">
			<input name="action" type="hidden" value="delete">
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