<?php
require_once 'includes/class-autoload.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Date Picker-->
    <link rel="stylesheet" href="../css/jquery-ui.min.css">
    <link rel="stylesheet" href="../css/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="../css/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="style.css">
    <!--Time Picker-->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $(function () {
        $("#startDate").datepicker({
            dateFormat: "yy-mm-dd", //修改顯示順序
            changeMonth: true
        });
        $("#endDate").datepicker({
            dateFormat: "yy-mm-dd", //修改顯示順序
            changeMonth: true
        });

        $('#startTime').timepicker({
            timeFormat: 'HH:mm',
            interval: 60,
            minTime: '24',
            maxTime: '23:00',
            defaultTime: '10',
            startTime: '5:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
        $('#endTime').timepicker({
            timeFormat: 'HH:mm',
            interval: 60,
            minTime: '24',
            maxTime: '23:00',
            defaultTime: '10',
            startTime: '5:00',
            dynamic: false,
            dropdown: true,
            scrollbar: true
        });
    });
    </script>
    <title>增加活動</title>

</head>
<body>
<main>
    <form action="add.php" method="post" autocomplete="off">
    <?php if (isset($_GET['mess']) && $_GET['mess'] == "error") {?>
        <p>BACK</p>
    <?php } else {?>
        <label for="">活動名稱:</label>
        <input type="text" name="actName" id="actName">
        <label for="">開始時間:</label>
        <input type="text" name="startDate" id="startDate">
        <input type="text" name="startTime" id="startTime">
        <label for="">結束時間:</label>
        <input type="text" name="endDate" id="endDate">
        <input type="text" name="endTime" id="endTime">
        <label for="">活動地址:</label>
        <div id="areaList">
            <select id="city" name="city">
                <option value="" selected disabled>選縣市</option>
            </select>
            <select id="area" name="area">
            <option value="" selected disabled>選區域</option>
            </select>
            <input type="text" name="road" id="road">
        </div>
        <!--<button type="submit" onclick="getLatLng1()">Add &nbsp; <span>&#43;</span></button>-->
        <button type="submit">Add &nbsp; <span>&#43;</span></button>

    <?php }?>
    </form>
    </main>

    <script>
        var urLat;
        var urLng;
        const getCityDatas = '../assets/CityCountyData.json';

        //縣市選單選項
    async function crateCityOption() {
        const citySelect = document.getElementById('city');
        const response = await fetch(getCityDatas);
        const data = await response.json();
        console.log(data);
        let cityOptionHTML = "";

        cityOptionHTML = `<option value="" selected disabled>選縣市</option><option value="臺南市">臺南市</option><option value="高雄市">高雄市</option>`
        //輸出在選單中
        citySelect.innerHTML = cityOptionHTML;
        document.getElementById('city').addEventListener('change', function () {
        const citySelected = document.getElementById('city').value; // 取得台南市string
        createAreaOption(citySelected);
        })
    }

    // 輸出鄉鎮選單選項
    async function createAreaOption(citySelected) {
        const areaSelect = document.getElementById('area');
        const response = await fetch(getCityDatas);
        const data = await response.json();
        const citySelectedObj = data.find(item => item.CityName === citySelected);
        //console.log(citySelectedObj) //= { CityName: "桃園市", CityEngName: "Taoyuan City", AreaList: Array }
        const areaArray = citySelectedObj.AreaList;
        let areaOptionHTML = "";
        for (let i = 0; i < areaArray.length; i++) {
            areaOptionHTML += `<option value="${areaArray[i].AreaName}">${areaArray[i].AreaName}</option>`;
        }

        // 輸出在選單中
        areaSelect.innerHTML = areaOptionHTML;
        document.getElementById('area').addEventListener('change', function () {
            var areaSelected = document.getElementById('area').value; // 取得東區string
        })
    }

    crateCityOption();

    // function getLatLng1(){
    //     alert("yeh");
    //     let urAddress = "";
    //         urAddress = document.getElementById('city').value + document.getElementById('area').value + document.getElementById('actAddress').value;
    //         let geocodeURL = new URL("https://maps.googleapis.com/maps/api/geocode/json?");
    //         geocodeURL.searchParams.append(name = "address", value = urAddress);
    //         geocodeURL.searchParams.append(name = "key", value = "AIzaSyCrFM_OGWwKsfaMthFujvs4C4mh2AAOwH8");
    //         console.log(geocodeURL);
    //         getLatLng2()

    //         async function getLatLng2() {
    //             let response = await fetch(geocodeURL);
    //             let data = await response.json();
    //             console.log(data);
    //             var urLat = data.results[0].geometry.location.lat;
    //             var urLng = data.results[0].geometry.location.lng;
    //             console.log(urLat);
    //             alert(urLat);
    //         }
    //}
    </script>
    <!--Time Picker-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
</body>
</html>