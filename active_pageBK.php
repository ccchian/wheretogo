<?php
  include("topic_pdo.php");
  require_once 'session_start.php';

  $a_id = $_GET['a_id']; //定義
  if (isset($_GET['a_id'])){ //判斷
        
    // $sql_select = "SELECT a_id, u_name, u_email, u_phone, a_title, a_date_start, a_date_end, a_address, a_preview, a_text, a_price, a_type, a_organizer, a_url FROM activityform WHERE a_id = :a_id";
    $sql_select = "SELECT a_id, a_title, a_date_start, a_date_end, a_address, a_preview, a_text, a_price, a_type, a_organizer, a_url FROM activityform WHERE a_id = :a_id";
    $stmt = $db_link -> prepare($sql_select);
    $stmt -> execute([':a_id'=>$a_id]);
    $row_result = $stmt -> fetch();
    // $u_name = $row_result["u_name"];
    // $u_email = $row_result["u_email"];
    // $u_phone = $row_result["u_phone"];
    $a_title = $row_result["a_title"];
    $a_date_start = $row_result["a_date_start"];
    $a_date_end = $row_result["a_date_end"];
    $a_address = $row_result["a_address"];
    $a_preview = $row_result["a_preview"];
    $a_text = $row_result["a_text"];
    $a_price = $row_result["a_price"];
    $a_type = $row_result["a_type"];
    $a_id = $row_result["a_id"];
    $a_organizer = $row_result["a_organizer"];
    $a_url = $row_result["a_url"];}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
     echo "<title>".$a_title."</title>"
     ?>

<?php
include "cdn.php";
?>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="header_area.css">
    <link rel="stylesheet" href="css/responsive.css">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <link media="print" rel="stylesheet" type="text/css" href="GIPDSD/xslGip/xslExport/1/ccaEvent/css/print.css">

    <script type="text/javascript" src="https://addevent.com/libs/atc/1.6.1/atc.min.js" async defer></script>

</head>
<body>
    <style>
      html,
      body {
        margin: 0;
        padding: 0;
        font-family: 'source-han-sans-traditional', sans-serif;
        font-size: 20px;
        font-weight: 700;
  
      }

      .table{
        width: 500px;
        height: 250px;
        border: 1px solid #f00;
        text-align: center;
        display: table-cell;
        vertical-align: middle;
        margin-left:auto; 
        margin-right:auto;
      }
      .picture{
        /* width: 250px;
        height: 350px; */
        width: auto;
        height: auto;
        /* margin-left: auto;
        margin-right: auto;*/
        position: absolute;
        /* margin: auto; */
        top:30%;
      }
      .photo{
        position:relative;
      }
      .block1{
        /* width: 35%; */
        /* height: 450px; */
        /* background-color: rgb(177, 15, 15); */

      }      
      .block2{
        /* width: 65%; */
        /* height: 450px; */
        /* background-color: rgb(17, 28, 182); */
      }
      .block3{
        /* width: 65%; */
        /* height: 450px; */
        /* background-color: rgb(17, 182, 25); */
      }
      .block4{
        /* width: 65%; */
        /* height: 450px; */
        /* background-color: rgb(223, 219, 11); */
      }

      .spFunction{
        width: 420px;
        height: 110px;
        position: absolute;
        top: 10%;
        right: 13%;
        /* flex-wrap: wrap; */
      }

      .spSearch{
        font-family: "微軟正黑體",Helvetica, Verdana, Geneva, Arial, sans-serif;
        font-size: 15px;
        font-weight: 300;
        text-align: left;
        text-decoration: none;
        /* display: block; */
        float: left;
        padding: 0 10px 0 38px;
        width: 130px;
        height: 36px;
        line-height: 36px;
        border-radius: 30px;
        background: #ac0 url(../images/icon_mail.png) no-repeat 10px center;
        background-size: 28px auto;
        color: #fff;
        overflow: hidden;
        text-indent: 12px;
        transition: all .3s;
        background-image: url(https://event.moc.gov.tw/GIPDSD/xslGip/xslExport/1/ccaEvent/images/icon_spSearch.png);
      }

      .spPrint{
        font-family:  "微軟正黑體",Helvetica, Verdana, Geneva, Arial, sans-serif;
        font-size: 15px;
        font-weight: 300;
        text-align: left;
        text-decoration: none;
        /* display: block; */
        float: left;
        padding: 0 10px 0 38px;
        width: 130px;
        height: 36px;
        line-height: 36px;
        border-radius: 30px;
        background: #ac0 no-repeat 10px center;
        background-size: 28px auto;
        color: #fff;
        overflow: hidden;
        text-indent: 12px;
        transition: all .3s;
        background-image: url(https://event.moc.gov.tw/GIPDSD/xslGip/xslExport/1/ccaEvent/images/icon_spPrint.png);
      }
      .spForward{
        font-family: "微軟正黑體",Helvetica, Verdana, Geneva, Arial, sans-serif;
        font-size: 15px;
        font-weight: 300;
        text-align: left;
        text-decoration: none;
        /* display: block; */
        float: left;
        padding: 0 10px 0 38px;
        width: 130px;
        height: 36px;
        line-height: 36px;
        border-radius: 30px;
        background: #ac0 url(../images/icon_mail.png) no-repeat 10px center;
        background-size: 28px auto;
        color: #fff;
        overflow: hidden;
        text-indent: 12px;
        transition: all .3s;
        background-image: url(https://event.moc.gov.tw/GIPDSD/xslGip/xslExport/1/ccaEvent/images/icon_mail.png);
      }
      #map{
        width: 100%;
        height: 100%;
        /* position: absolute;
        top: 600px;
        left: 170px; */
      }
      .cardimg{
        height: 350px;
        object-fit: cover;
        width:100%;
      }

      /* .t1{
        width: 100px;
      } */
    </style>

</head>
<body>
<?php
include "header_area_page.php";
?>

    <!-- <div class="spFunction">
        <div class="spSearch ml-1"><a href="#" title="進階查詢">進階查詢</a></div>
        <div class="spPrint ml-1<a href="javascript:window.print()"  title="友善列印(另開新視窗)">友善列印</a><noscript>(不支援 script 時請按 ctrl+p 列印)</noscript>
        </div>
        <div class="spForward ml-1"><a href="#" title="轉寄友人">轉寄友人</a></div>
    </div> -->

    <div class="container-fluid">
      <div class="row ">

          <div class="col block1 col-md-4">
          
                <div class=" block2 cardimg">
                    <figure class="figure">
                      <img src="upload_test/<?php echo $a_preview;?>" class="figure-img img-fluid rounded">
                    </figure>
                </div>
                <hr>
                <div class="col block3">
                  <!-- <div class="eventMap"> -->
                        <!-- <h4>活動位置圖</h4> -->
                        <div style="font-size: 15px;font-weight: 300;border-width: 0px;margin: 0px;cursor: url("https://maps.gstatic.com/mapfiles/openhand_8_8.cur"), default; touch-action: pan-x pan-y;">
                          <div class="google_map">
                            <div id="map_canvas" style="width: 25vw; height: 50vh; min-width:80%"></div><br/>
                            <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrFM_OGWwKsfaMthFujvs4C4mh2AAOwH8"></script>
                            <script type="text/javascript">
                              var address='<?php echo $a_address;?>';
                              
                              var geocoder;
                              var map; 
                              var marker;
                              var infoWindow = new google.maps.InfoWindow();
                              var lat;
                              var lng;
                              
                                function initialize() {
                                geocoder = new google.maps.Geocoder();
          
                                var latlng = new google.maps.LatLng(24.154820, 120.633423);
                            
                                var myOptions = {
                                  zoom: 15,
                                  center: latlng,
                                  mapTypeId: google.maps.MapTypeId.ROADMAP
                                }
                                map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                                
          
                                geocoder.geocode( { 'address': address}, function(results, status) 
                                {
                                  if (status == google.maps.GeocoderStatus.OK) {
                                  map.setZoom(15);
                                  map.setCenter(results[0].geometry.location);
                                  
                                  lat = results[0].geometry.location.lat();
                                  lng = results[0].geometry.location.lng();											
                                  if(marker) marker.setMap(null);
                                  marker = new google.maps.Marker({
                                    map: map, 
                                    position: results[0].geometry.location,
                                    title:address
                                  });
          
                                  } else {
                                  //alert("Geocode was not successful for the following reason: " + status);
                                  }
                                });
          
                                }
          
                                initialize();
                                
                                function doViewLargeMap()
                                {
                                  var url = "mapView.asp?locationCode=B210101&title="+address;
                                  url += "&lat="+lat+"&lng="+lng+"&ev_title=台江週末電影院-玩具總動員4&ev_place=台江文化中心";
                                  
                                  window.open(url, 'new', config='resizable=yes,height=600,width=900')
                                }		
                            </script>
                          </div>
                        </div>                      
                  <!-- </div> -->
              </div>
  
          </div>
          
            <div class="col-md-8 ml-auto block4 t1 ">
              <table summary="活動基本資料" style="border:5px #cccccc solid;" cellpadding="10" border='1' class="mr-3">
              <tr><th><div style="word-break: keep-all">活動名稱</th>
              <td><?php echo $a_title;?></td>
              </tr>

              <tr><th><div style="word-break: keep-all">活動開始時間</th>
                <td><?php echo $a_date_start;?></td>
              </tr>
              <tr><th><div style="word-break: keep-all">活動結束時間</th>
                <td><?php echo $a_date_end;?></td>
              </tr>

              <tr><th><div style="word-break: keep-all">場地地址</th>
              <td><?php echo $a_address;?></td>
              </tr>
              
              <tr><th><div style="word-break: keep-all">活動票價</th>
              <td><?php echo $a_price;?></td>
              </tr>
              
              <tr><th><div style="word-break: keep-all">活動型態</th>
              <td><?php echo $a_type;?></td>
              </tr>

              <!-- <tr><th>主辦人員</th>
              <td><?php echo $u_name;?></td>
              </tr>

              <tr><th>主辦電話</th>
              <td><?php echo $u_phone;?></td>
              </tr>

              <tr><th>活動信箱</th>
              <td><?php echo $u_email;?></td>
              </tr> -->
              

              <tr><th><div style="word-break: keep-all">主辦單位</th>
              <td><?php echo $a_organizer;?>
              </td>
              </tr>
              
              <tr>
                <th><div style="word-break: keep-all">活動網站</th>
                <td><a href="<?php echo $a_url;?>" target="_event_" title="連結到活動網址, 另開新視窗."><?php echo $a_url;?></a></td>
              </tr>
              
              <tr>
                <th><div style="word-break: keep-all">活動內容</th>
                <td><div style="word-break: break-all"><?php echo $a_text;?>
                    <br /><br /><br />
                    <div title="Add to Calendar" class="addeventatc">
                      加到行事曆
                      <span class="start"><?php echo $a_date_start;?></span>
                      <span class="end"><?php echo $a_date_end;?></span>
                      <span class="timezone">Asia/Taipei</span>
                      <span class="title"><?php echo $a_title;?></span>
                      <span class="description"><?php echo $a_text;?></span>
                      <span class="location"><?php echo $a_address;?></span>
                  </div>
                </td>
              </tr>
              </div>

              </table>
      </div>        
    </div>

<?php
include "footer.php";
include "jsAndBs4.php";
?>
    </body>
</html>
<?php 
	$stmt=null;
    $db_link=null;
?>