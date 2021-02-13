<?php
require_once 'session_start.php';

include("topic_pdo.php");

$images=$_FILES['file']['name'];
$tmp_dir=$_FILES['file']['tmp_name'];
$imageSize=$_FILES['file']['size'];

$upload_dir='upload_test/';
$imgExt=strtolower(pathinfo($images,PATHINFO_EXTENSION));
$valid_extensions=array('jpeg', 'jpg', 'png', 'gif', 'pdf');
$picProfile=rand(1000, 900000000).".".$imgExt;
move_uploaded_file($tmp_dir, $upload_dir.$picProfile);
$a_preview = $picProfile;


// echo '檔案名稱: ' . $_FILES['file']['name'] . '<br/>';
// echo '檔案類型: ' . $_FILES['file']['type'] . '<br/>';
// echo '檔案大小: ' . ($_FILES['file']['size'] / 1024) . ' KB<br/>';
// echo '暫存名稱: ' . $_FILES['file']['tmp_name'] . '<br/>';
// $file = $_FILES['file']['tmp_name'];
// $dest = 'upload_test/' . $_FILES['file']['name'];
// move_uploaded_file($file, $dest);
    // $a_preview = $dest;
    echo $a_preview;

    $a_organizer = $_POST['a_organizer'];
    $a_title = $_POST['a_title'];
    $a_date_start = $_POST['a_date_start'];
    $a_date_end = $_POST['a_date_end'];
    


    $a_text = $_POST['a_text'];
    $a_price = $_POST['a_price'];
    $a_url = $_POST['a_url'];
    $a_city = $_POST['a_city'];
    $a_area = $_POST['a_area'];
    $a_road = $_POST['a_road'];
    $a_address = $a_city . $a_area . $a_road;

    // -------- Geocoding START --------
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$a_address}&key=AIzaSyCrFM_OGWwKsfaMthFujvs4C4mh2AAOwH8&language=zh-TW";

    /*取得回傳的json值*/
    $response_json = file_get_contents($url);

    /*處理json轉為變數資料以便程式處理*/
    $response = json_decode($response_json, true);

    /*如果能夠進行地理編碼，則status會回傳OK*/
    if ($response['status'] = 'OK') {
        //取得需要的重要資訊
        $latitude = $response['results'][0]['geometry']['location']['lat']; //緯度
        $longitude = $response['results'][0]['geometry']['location']['lng']; //精度
        //$data_address = $response['results'][0]['formatted_address'];

        echo $latitude;
        echo "<br>";
        echo $longitude;
        echo "<br>";
        echo $a_address;
        echo "<br>";
    } 
    else {
        return false;
    }
// }
////


////GC

// $m=''; //for error messages
// $id_event=''; //id事件已創建
// $link_event; 

// if(isset($_POST['submit'])){
    
    date_default_timezone_set('Asia/Taipei');
    include_once 'vendor/autoload.php';

    //設置環境變量/設置環境變量
    putenv('GOOGLE_APPLICATION_CREDENTIALS=my-project-gclab-294311-d3e41f7d3b41.json');
    $client = new Google_Client();
    $client->useApplicationDefaultCredentials();
    $client->setScopes(['https://www.googleapis.com/auth/calendar']);

    //定義日曆ID
    $id_calendar=$_POST['a_type'];//
    
    $datetime_start = new DateTime($_POST['a_date_start']);
    $datetime_end = new DateTime($_POST['a_date_end']);
    
    //將初始時間增加一小時/將開始日期增加1小時
    // $time_end = $datetime_end->add(new DateInterval('PT1H'));
    
    //日期時間必須為RFC3339格式
    $time_start =$datetime_start->format(\DateTime::RFC3339);
    $time_end=$datetime_end->format(\DateTime::RFC3339);

    $a_title=(isset($_POST['a_title']))?$_POST['a_title']:' xyz ';
    // $a_address = $_POST['address'];
    // $summary = $_POST['summary'];

    // try{
        
        //實例化服務
    	 $calendarService = new Google_Service_Calendar($client);
      
        //用於在新事件的日期範圍內搜索事件的參數
        //參數以搜索給定日期的事件
        $optParams = array(
            'orderBy' => 'startTime',
            'maxResults' => 20,
            'singleEvents' => TRUE,
            'timeMin' => $time_start,
            'timeMax' => $time_end,
        );

        //得到事件 
        $events=$calendarService->events->listEvents($id_calendar,$optParams);
        
        //獲取事件數/獲取給定日期中存在的事件數
        $cont_events=count($events->getItems());
     
        //如果沒有事件，則創建事件/僅在給定日期中沒有事件時，才創建事件
        // if($cont_events == 0){

            $event = new Google_Service_Calendar_Event();
            $event->setSummary('活動名稱： '.$a_title);
            $event->setLocation('活動地點： '.$a_address);
            // $event->setDescription('測試說明： '.'$summary');
            $event->setDescription('活動連結： '.$a_url);

            //開始日期
            $start = new Google_Service_Calendar_EventDateTime();
            $start->setDateTime($time_start);
            $event->setStart($start);
            //結束日期
            $end = new Google_Service_Calendar_EventDateTime();
            $end->setDateTime($time_end);
            $event->setEnd($end);

            $createdEvent = $calendarService->events->insert($id_calendar, $event);
            $id_event= $createdEvent->getId();
            $link_event= $createdEvent->gethtmlLink();
            echo $id_event;
    // }catch(Google_Service_Exception $gs){
     
    //   $m = json_decode($gs->getMessage());
    //   $m= $m->error->message;

    // }catch(Exception $e){
    //     $m = $e->getMessage();
      
    // }
// }
////

////DB

    switch($_POST['a_type']){
        case "k5s35kegneqj0hv1jrblrp3pfo@group.calendar.google.com":
            $a_type = "音樂戲劇";
        break;

        case "3oo9e88mf64gspfmer5q7psa6s@group.calendar.google.com":
            $a_type = "藝文展覽";
        break;

        case "nqbbsh8klugv0s9runjbl1tscs@group.calendar.google.com":
            $a_type = "課程講座";
        break;

        case "peao0cj5r50j45jc7ncf8bos7g@group.calendar.google.com":
            $a_type = "旅遊美食";
        break;

        case "090jpt3biktimd6e7pv45ctlg4@group.calendar.google.com":
            $a_type = "市集";
        break;

        case "2fokd3n4e0i0dijokm4svp5r5s@group.calendar.google.com":
            $a_type = "運動";
        break;

        case "sm04tudqvm0qsst7ah3s5bi0r0@group.calendar.google.com":
            $a_type = "公益";
        break;

        case "iinlgr3s9qqasu0k81d6ihs2i8@group.calendar.google.com":
            $a_type = "其他";
        break;
    }

    //表單變數


    $sql = "INSERT INTO activityform (a_organizer,a_title,a_date_start,a_date_end,a_city,a_area,a_road,a_address,latitude,longitude,a_preview,a_text,a_price,a_url,a_type,id_event) 
            value('$a_organizer','$a_title','$a_date_start','$a_date_end','$a_city','$a_area','$a_road','$a_address','$latitude','$longitude','$a_preview','$a_text','$a_price','$a_url','$a_type','$id_event')";
    $db_link->query($sql);
    $last_id=$db_link->lastInsertId();
    

    header('location: handler.php?id='.$last_id);

    ?>