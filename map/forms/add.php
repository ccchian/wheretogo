<?php
require_once 'includes/class-autoload.inc.php';

if (isset($_POST['actName']) && isset($_POST['startDate']) && isset($_POST['startTime']) && isset($_POST['endDate']) && isset($_POST['endTime']) && isset($_POST['city']) && isset($_POST['area']) && isset($_POST['road'])) {
    $actName = $_POST['actName'];
    $startDate = $_POST['startDate'];
    $startTime = $_POST['startTime'];
    $endDate = $_POST['endDate'];
    $endTime = $_POST['endTime'];
    $cityName = $_POST['city'];
    $areaName = $_POST['area'];
    $roadName = $_POST['road'];
    $actAddress = $_POST['city'] . $_POST['area'] . $_POST['road'];

    if (empty($actName) || empty($startDate) || empty($startTime) || empty($endDate) || empty($endTime) || empty($actAddress)) {
        header("Location:activityForm.php?mess=error");
    } else {
        // -------- Geocoding START --------
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$actAddress}&key=AIzaSyCrFM_OGWwKsfaMthFujvs4C4mh2AAOwH8&language=zh-TW";

        /*取得回傳的json值*/
        $response_json = file_get_contents($url);

        /*處理json轉為變數資料以便程式處理*/
        $response = json_decode($response_json, true);

        /*如果能夠進行地理編碼，則status會回傳OK*/
        if ($response['status'] = 'OK') {
            //取得需要的重要資訊
            $latitude_data = $response['results'][0]['geometry']['location']['lat']; //緯度
            $longitude_data = $response['results'][0]['geometry']['location']['lng']; //精度
            //$data_address = $response['results'][0]['formatted_address'];

            echo $latitude_data;
            echo "<br>";
            echo $longitude_data;
            echo "<br>";
            //echo $data_address;
            echo $actAddress;

            // ---- INSERT SQL -------
            $insertObj = new Adrs();
            $insertObj->insertAdrs($actName, $cityName, $areaName, $roadName, $startDate, $startTime, $endDate, $endTime, $actAddress, $latitude_data, $longitude_data);

        } else {
            return false;
        }
        // -------- Geocoding END --------

        $conn = null;
        exit();
    }
} else {
    header("Location: activityForm.php?mess=error");
}
