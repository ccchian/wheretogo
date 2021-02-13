<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>去哪+1行事曆</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <style>
        .parent {
            height: 0;
            padding-bottom: 56.25%; /* 16:9 */
            position: relative;
        }

        .parent iframe {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 120%; 
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
        }

    </style>
</head>
<body>
    <!--================Header Area =================-->
    <?php
        include("header_area.php");
    ?>
    <!--================Header Area =================-->
  <div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <div class="nav nav-tabs justify-content-start" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"href="#nav-music" role="tab" aria-controls="nav-home" aria-selected="true">音樂表演及電影</a>
          <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-market" role="tab" aria-controls="nav-profile" aria-selected="false">市集</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-exhibition" role="tab" aria-controls="nav-profile" aria-selected="false">藝文展覽</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-travel" role="tab" aria-controls="nav-profile" aria-selected="false">旅遊美食</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-course" role="tab" aria-controls="nav-profile" aria-selected="false">課程講座</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-sport" role="tab" aria-controls="nav-profile" aria-selected="false">運動</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-charity" role="tab" aria-controls="nav-profile" aria-selected="false">公益</a>
          <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-others" role="tab" aria-controls="nav-profile" aria-selected="false">其它</a>
          </div>
    </div>
  </nav>
        <div class="jumbotron ">
          <h1 class="display-4">藝文活動行事曆</h1>
        </div>
      
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active parent" id="nav-music" role="tabpanel" aria-labelledby="nav-home-tab">
            <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FTaipei&amp;src=azVzMzVrZWduZXFqMGh2MWpyYmxycDNwZm9AZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%23D81B60&amp;showTz=0&amp;showTitle=0&amp;showPrint=0" style="border-width:0"frameborder="0" scrolling="no"></iframe>
            </div> 
            <div class="tab-pane fade parent" id="nav-market"  role="tabpanel" aria-labelledby="pills-profile-tab">
              <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FTaipei&amp;src=MDkwanB0M2Jpa3RpbWQ2ZTdwdjQ1Y3RsZzRAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%23795548&amp;showTz=0&amp;showPrint=0&amp;showTitle=0" style="border-width:0" width="1300" height="1000" frameborder="0" scrolling="no"></iframe>
            </div>
            <div class="tab-pane fade parent" id="nav-exhibition"  role="tabpanel" aria-labelledby="pills-profile-tab">
              <iframe src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FTaipei&amp;src=M29vOWU4OG1mNjRnc3BmbWVyNXE3cHNhNnNAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%23C0CA33&amp;showTz=0&amp;showTabs=1&amp;showPrint=0&amp;showTitle=0" style="border-width:0" width="1300" height="1000" frameborder="0" scrolling="no"></iframe>
            </div>
            <div class="tab-pane fade parent" id="nav-travel"  role="tabpanel" aria-labelledby="pills-profile-tab">
              <iframe
              src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FTaipei&amp;showTz=0&amp;showPrint=0&amp;showTitle=0&amp;src=cGVhbzBjajVyNTBqNDVqYzduY2Y4Ym9zN2dAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%23C0CA33" style="border-width:0" width="1300" height="1000" frameborder="0" scrolling="no"></iframe>
            </div>
            <div class="tab-pane fade parent" id="nav-course"  role="tabpanel" aria-labelledby="pills-profile-tab">
              <iframe
              src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FTaipei&amp;showTz=0&amp;showTabs=1&amp;showTitle=0&amp;showPrint=0&amp;src=bnFiYnNoOGtsdWd2MHM5cnVuamJsMXRzY3NAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%23F6BF26" style="border-width:0" width="1300" height="1000" frameborder="0" scrolling="no"></iframe>
            </div>
            <div class="tab-pane fade parent" id="nav-sport"  role="tabpanel" aria-labelledby="pills-profile-tab">
              <iframe
              src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FTaipei&amp;showTitle=0&amp;showDate=1&amp;showTz=0&amp;showPrint=0&amp;src=MmZva2QzbjRlMGkwZGlqb2ttNHN2cDVyNXNAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%23E67C73" style="border-width:0" width="1300" height="1000" frameborder="0" scrolling="no"></iframe>
            </div>
            <div class="tab-pane fade parent" id="nav-charity"  role="tabpanel" aria-labelledby="pills-profile-tab">
              <iframe
              src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FTaipei&amp;src=c20wNHR1ZHF2bTBxc3N0N2FoM3M1YmkwcjBAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%237986CB&amp;showTitle=0&amp;showPrint=0&amp;showTz=0" style="border-width:0" width="1300" height="1000" frameborder="0" scrolling="no"></iframe>
            </div>
            <div class="tab-pane fade parent" id="nav-others"  role="tabpanel" aria-labelledby="pills-profile-tab">
              <iframe
              src="https://calendar.google.com/calendar/embed?height=600&amp;wkst=1&amp;bgcolor=%23ffffff&amp;ctz=Asia%2FTaipei&amp;showTz=0&amp;showPrint=0&amp;showTitle=0&amp;src=aWlubGdyM3M5cXFhc3UwazgxZDZpaHMyaThAZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&amp;color=%23E4C441" style="border-width:0" width="1300" height="1000" frameborder="0" scrolling="no"></iframe>
            </div>

            
          </div>
    </div>
</body>
</html>