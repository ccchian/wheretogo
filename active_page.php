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


    <script type="text/javascript" src="https://addevent.com/libs/atc/1.6.1/atc.min.js" async defer></script>

</head>
<body>
    <style>
        .con_mt{
          margin-top:110px;
        }

        .div_a {
          word-break: break-all;
          min-width: 75%;
          max-width: 75%;
        }
    </style>

</head>
<body>
<?php
include "header_area_page.php";
?>

<div class="container con_mt mb-4">
<img src="upload_test/<?php echo $a_preview;?>" class="img-fluid rounded mx-auto d-block">
</div>

<div class="container border-top">
  <p class='mt-2 mb-1 px-2 textellipsis h3 card-title'><?php echo $a_title;?></p>

  <div class='mt-2 mb-1 px-2'>
  <i class='fas fa-user-tag '></i>
  <span class='mt-2 mb-1 px-2'><?php echo $a_organizer;?></span>
  </div>
  
  <div class='mt-2 mb-1 px-2'>
  <i class='fas fa-map-marker-alt'></i>
  <span class='mt-2 mb-1 px-2'><?php echo $a_address;?></span></span>
  </div>  

  <div class='mt-2 mb-1 px-2'>
  <i class='far fa-clock '></i>
  <span class='mt-2 mb-1 px-2 '>開始時間：<?php echo $a_date_start;?></span>
  </div>

  <div class='mt-2 mb-1 px-2'>
  <i class='far fa-clock '></i>
  <span class='mt-2 mb-1 px-2 '>結束時間：<?php echo $a_date_end;?></span>
  </div>
  
  <div class='mt-2 mb-1 px-2'>
  <i class='fas fa-globe'></i>
  <?php echo "<a class='mt-2 mb-1 px-2' href=".$a_url.">".$a_url."</a>"?>
  </div>

  <div class='mt-2 mb-1 px-2'>
  <i class='fas fa-dollar-sign'></i>
  <span class='mt-2 mb-1 px-2'><?php echo $a_price;?></span>
  </div>
  
  <div class='mt-2 mb-1 px-2'>
  <i class='fas fa-tags '></i>
  <span class='mt-2 mb-1 px-2'><?php echo $a_type;?></span>
  </div>


  <div title="Add to Calendar" class="addeventatc">
      加入行事曆
      <span class="start"><?php echo $a_date_start;?></span>
      <span class="end"><?php echo $a_date_end;?></span>
      <span class="timezone">Asia/Taipei</span>
      <span class="title"><?php echo $a_title;?></span>
      <span class="description"><?php echo $a_text;?></span>
      <span class="location"><?php echo $a_address;?></span>
  </div>

</div>

<div class="container border-top my-3 div_a">
  <p class="mb-2 text-left"><?php echo $a_text;?></p>
</div>

<div class="container px-auto">
<div style="font-size: 15px;font-weight: 300;border-width: 0px;margin: 0px;cursor: url("https://maps.gstatic.com/mapfiles/openhand_8_8.cur"), default; touch-action: pan-x pan-y;">
                          <div class="google_map">
                            <div id="map_canvas" style="width: 72.5vw; height: 62vh; min-width:80%"></div><br/>
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