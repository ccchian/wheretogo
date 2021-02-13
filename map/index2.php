<?php
require 'db_conn.php';
require 'convert.php'; // 全部DB內的
require_once '../session_start.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="../image/new/littleonegotaquestion.jpg" type="image/jpg">
  <title>地圖搜尋</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <link rel="stylesheet" href="../header_area.css">
  <link rel="stylesheet" href="../index/style.css">
  <link rel="stylesheet" href="../css/responsive.css">

  <!-- Bootstrap CSS same as index2.php-->
  <link rel="stylesheet" href="../css/bootstrap.css">
  <link rel="stylesheet" href="../vendors/linericon/style.css">
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <link rel="stylesheet" href="../vendors/owl-carousel/owl.carousel.min.css">
  <link rel="stylesheet" href="../vendors/bootstrap-datepicker/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" href="../vendors/nice-select/css/nice-select.css">
  <link rel="stylesheet" href="../vendors/owl-carousel/owl.carousel.min.css">

  <!-- main css -->
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/responsive.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <!-- <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet"> -->

  <!-- Template Main CSS File -->
  <!-- <link href="assets/css/style.css" rel="stylesheet"> -->

  <!--Leaflet CSS-->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
  <!--Leaflet Marker Cluster CSS-->
  <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.css" />
  <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.4.1/dist/MarkerCluster.Default.css" />
  <!-- Leaflet JavaScript Make sure you put this AFTER Leaflet's CSS -->
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
  <!-- Leaflet Marker Cluster JS -->
  <script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>
  <!--jQuery-->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/fcea51171e.js" crossorigin="anonymous"></script>
  <!--自訂 CSS-->
  <link rel="stylesheet" href="css/style.css">
  <!--Date Picker-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/css/tempusdominus-bootstrap-4.min.css" integrity="sha512-PMjWzHVtwxdq7m7GIxBot5vdxUY+5aKP9wpKtvnNBZrVv1srI8tU6xvFMzG8crLNcMj/8Xl/WWmo/oAP/40p1g==" crossorigin="anonymous" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js" integrity="sha512-LGXaggshOkD/at6PFNcp2V2unf9LzFq6LE+sChH7ceMTDP0g2kn6Vxwgg7wkPP7AAtX+lmPqPdxB47A0Nz0cMQ==" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/locale/zh-tw.min.js" integrity="sha512-teZ6dd0iHPCs4aUqFGC1OSUiT+pY6eqk5Jaa2sE7wqExKu3Tscsn1RYbEJWPWsqKYroeJ6jlkR2YdY3Em8eVRQ==" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.1.2/js/tempusdominus-bootstrap-4.min.js" integrity="sha512-2JBCbWoMJPH+Uj7Wq5OLub8E5edWHlTM4ar/YJkZh3plwB2INhhOC3eDoqHm1Za/ZOSksrLlURLoyXVdfQXqwg==" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/paginationjs/2.1.5/pagination.min.js" integrity="sha512-1zzZ0ynR2KXnFskJ1C2s+7TIEewmkB2y+5o/+ahF7mwNj9n3PnzARpqalvtjSbUETwx6yuxP5AJXZCpnjEJkQw==" crossorigin="anonymous"></script>
</head>

<body>
  <!--================Header Area =================-->
  <?php
  include("header_area.php");
  ?>
  <!--================Header Area =================-->

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section class="sample-text-area pb-5">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <a href="index.php" class="text-secondary pt-3">依區域搜尋<span class="lnr lnr-arrow-right"></span></a>
        </div>
      </div>
    </section> <!-- End Breadcrumbs -->


    <!-- ======= Breadcrumbs ======= -->
    <section class="sample-text-area pt-0">
      <div class="container">
        <div class="row">
          <!-- =====Aside Left===== -->
          <div class="col-lg-4">
            <!-- ======= 日期選單 ======= -->
            <div id="areaList" class="d-flex mb-2">
              <form action="" id="dateForm" method="POST">
                <div class="input-group date mb-2" id="from_date" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" style="width:80%" data-target="from_date" name="from_date" id="from_date2" placeholder="開始" />
                  <div class="input-group-append" data-target="#from_date" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>

                <div class="input-group date mb-2" id="to_date" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input" style="width:80%" data-target="#to_date" name="to_date" id="to_date2" placeholder="結束" />
                  <div class="input-group-append" data-target="#to_date" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                  </div>
                </div>

                <input type="button" name="filter" id="filter" value="確認日期" class="btn btn-dark" />
              </form>
            </div>
            <!-- ======= 附近有什麼 ======= -->
            <div class="menu-selection-row d-flex mb-2">
              <select id="actType" class="btn btn-dark mr-2">
                <option selected>活動類型</option>
                <option value="1">音樂戲劇</option>
                <option value="2">藝文展覽</option>
                <option value="3">旅遊美食</option>
                <option value="4">課程講座</option>
                <option value="5">市集</option>
                <option value="6">運動</option>
                <option value="7">公益</option>
                <option value="8">其它</option>
              </select>
              <button id="loved-btn" class="btn btn-sm btn-outline-danger mb-2">收藏</button>
            </div>

            <div class="d-flex">
              <div id="activity-list" class="overflow-auto" style="height: 50vh; width: 100%">activity-list</div>
            </div>

          </div>


          <!-- END Left -->
          <!-- ======= 地圖放這 ======= -->
          <div class="col-lg-8">
            <div id="mapid" style="height: 60vh;"></div>
            <div id="map"></div>
            <input type="button" class="btn btn-dark" id="jsGeoBtn" value="我在哪">
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <?php
      include("footer.php");
    ?>

  <!-- ======= JAVA SCRIPT ======= -->
  <!-- <script type="text/javascript">
    $("#filter").click(function() {
      $.ajax({
        url: "vendor\date-filter\filter.php",
        method: "POST",

        error: function() {
          alert("失敗");
        },
        success: function() {
          alert("成功");
        }
      });
    });
  </script> -->
  <script src="js/all2.js"></script>
  <script type="text/javascript">
    $(function() {
      $('#from_date').datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
        locale: 'zh-tw'
      });
      //});

      // $(function() {
      $('#to_date').datetimepicker({
        formatDate: 'YYYY-MM-DD HH:mm',
        locale: 'zh-tw'
      });
    });
  </script>



  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>