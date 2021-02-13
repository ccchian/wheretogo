<?php
require_once '../session_start.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>音樂戲劇行事曆</title>

    <?php
        include("../cdn.php");
    ?>
        <link rel="stylesheet" href="../header_area.css">
        <link rel="stylesheet" href="../index/style.css">
        <link rel="stylesheet" href="../css/responsive.css">
    <style>
        .con_mt{
          /* margin-top:110px; */
        }

        html,
        body {
        margin: 0;
        padding: 0;
        font-family: 'source-han-sans-traditional', sans-serif;
        font-size: 20px;
        font-weight: 700;
        }
      

        .jumbotron {
            background: url("https://images.unsplash.com/photo-1594043572837-2749cef2b55a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1500&q=80");
            color: white;
            background-repeat:no-repeat;
            background-size: cover;
          }


    </style>
</head>
<body>
    <!--================Header Area =================-->
    <?php
      include("header_area.php");
    ?>

    <!--================Header Area =================-->
    <div class="jumbotron add_jum_size">
      <div class="container text-center mt-5">
      <P class="display-4 text-light font-weight-bold">音樂戲劇行事曆</P>
      <hr class="my-3 hr_sty text-light">
      <!-- <p class="h4 text-light">一段話</p> -->
      </div>
    </div>



    
  <div class="container con_mt">
  <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center">
 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <!-- ***justify-content-center*** -->
  <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
    <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="calendar1.php">音樂戲劇</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="calendar2.php">藝文展覽</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="calendar3.php">旅遊美食</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="calendar4.php">課程講座</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="calendar5.php">市集</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="calendar6.php">運動</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="calendar7.php">公益</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="calendar8.php">其它</a>
        </li>

      </ul>
    </div>
  </nav>
  </div>
    <div class="container">
        <div class="tab-pane parent if_mb">
        <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FTaipei&amp;src=azVzMzVrZWduZXFqMGh2MWpyYmxycDNwZm9AZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%23D81B60&amp;showTz=0&amp;showTitle=0&amp;showPrint=0" style="border-width:0"frameborder="0" scrolling="no"></iframe>
        </div> 
    </div>

    <?php
      include("footer.php");
      include("../jsAndBs4.php");
    ?>

</body>
</html>