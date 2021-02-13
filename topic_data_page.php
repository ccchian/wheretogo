<?php
//udd1119
include("topic_pdo.php");
require_once 'session_start.php';
 //欄位排序
 if(@$_GET['sltsort']==NULL){    //有沒有設置 $_GET['sltsort'] 變數;沒有就設初始值
    $order = 'DESC';
    $sortname = 'a_id';
    $_GET['sltsort']='0';
}else{
    //將要做排序的欄位做成陣列,因同欄位有升降之分,所以設二個
    $sortarray = array('a_id','a_id','a_date_start','a_date_start','a_price','a_price');
    //$GET回傳變數是設數字，所以依數字來取得陣列內要做排序的欄位名。陣列第1個值以是由0開始
    $sortname = $sortarray[$_GET['sltsort']]; 

    if(($_GET['sltsort']) % 2 ==0){  //判斷奇偶數
        $order = 'DESC';  
    }else{
        $order = 'ASC';   			 
        }
    } 

 //把要排序的參數加入sql內
// $sql_query = "SELECT * FROM activityform ORDER BY ".$sortname." ".$order ;

if(!isset($_GET['i_search'])){  //!isset 判斷有沒有$_GET['i_search']這個變數
    $_GET['i_search'] = null;
    $sql_query = "SELECT * FROM activityform ORDER BY ".$sortname." ".$order ;
}else{
    $sql_query = "SELECT * FROM activityform WHERE a_organizer LIKE '%".$_GET['i_search']."%' OR a_title LIKE '%".$_GET['i_search']."%' OR a_address LIKE '%".$_GET['i_search']."%' OR a_type LIKE '%".$_GET['i_search']."%' OR a_text LIKE '%".$_GET['i_search']."%' ORDER BY ".$sortname." ".$order ;
}

$result = $db_link->query($sql_query);

//分頁設定
$total_records = $result -> rowCount();  //計算總筆數
$pageRow_records = 12;  //每頁筆數
$pages = ceil($total_records/$pageRow_records);  //計算總頁數;ceil(x)取>=x的整數,也就是小數無條件進1法

if(!isset($_GET['page'])){  //!isset 判斷有沒有$_GET['page']這個變數
      $page = 1;	  
}else{
    $page = $_GET['page'];
}

$startRow_records = ($page-1)*$pageRow_records;  //每一頁開始的資料序號(資料庫序號是從0開始)
$result = $db_link -> query($sql_query.' LIMIT '.$startRow_records.', '.$pageRow_records); //讀取選取頁的資料

$page_start = $startRow_records +1;  //選取頁的起始筆數
$page_end = $startRow_records + $pageRow_records;  //選取頁的最後筆數
if($page_end>$total_records){  //最後頁的最後筆數=總筆數
   $page_end = $total_records;
}

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>活動一覽</title>
<?php
        include("cdn.php");
?>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="header_area.css">
    <link rel="stylesheet" href="css/responsive.css">

<style>
    body{
        font-family: 'Noto Sans TC', sans-serif;
        font-weight: 300;
        background-color: #FFF3EE;
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
        /* background: rgba(243, 195, 0, 0.6); */
    }

    .cardbgc{
        background-color: 	#FFFAF4;
        /* border:1px solid #003399; */
    }

    .cardimg{
        height: 220px;
        object-fit: cover;
    }

    .textellipsis {
        overflow:hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .create {
            position: fixed;
            bottom: 50px;
            right: 50px;
            width: 55px;
            height: 55px;
            border: 2px solid #888;
            background-color: #9e9e9e;
            border-radius: 50%;
        }

        .plus {
            position: fixed;
            bottom: 55px;
            right: 55px;
        }

        .dialog {
            /* position: absolute; */
            position: fixed;
            top: 3%;
            left: 50%; 
            margin-left: auto;
            margin-right: auto;
            transform: translate(-50%, 0px);
            width: 90%;
            /* height: 650px; */
            border: 1px solid #888;
            border-radius: 2%;
            border-color: #000;
            box-shadow: 5px 5px 10px #5e5e5e;
            display: none;
            background-color: #FFF3EE;
            z-index:25;
        }

        .dialog>.close {
            position: absolute;
            top: 5px;
            right: 5px;
            cursor: pointer;
            width: 22px;
            height: 22px;
            border: 2px solid #f00;
            background-color: #ff0000;
            border-radius: 50%;

        }

        .close2 {
            position: absolute;
            top: 3px;
            right: 2px;
        }

        .btn-danger{
            background-color: #AE0000;
        }

        .btn-primary{
            background-color: #005AB5;
        }

        .breadcrumb{
            background-color: #FFF3EE;
        }

        .breadcrumb-item+.breadcrumb-item::before{
            content: " ";        
        }

        .bgc-1{
            background-color: #f3c300;
        }

        a:hover {
            color: #627585;
            text-decoration: none;
        }
    </style>

    <script>
        var dialog;
        window.onload = function () {
            dialog = document.getElementById("dialog");
        };

        function showDialog() {
            dialog.style.display = "block";
        }

        function closeDialog() {
            dialog.style.display = "none";
        }
    </script>

</head>

<body>

<?php
        include("header_area_page.php");
?>

<div class="container-fluid px-0">
    <div class="jumbotron jumbotronbg jumbotron-fluid mb-3">
        <div class="card opacity-1 text-center mt-5">
            <h1 class="display-3">活動一覽</h1>
            <hr class="my-3 hr_sty">
            <p class="h4">目前活動筆數：<?php echo $total_records;?></p>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">

    <div class="m-auto col-md-4 d-flex justify-content-start">
        <form action="topic_data_page.php" method="get">
            <select name="sltsort" id="sltsort" onChange="submit()">
                <!-- <option></option> -->
                <option value="0" <?php if($_GET['sltsort']=='0'){ echo 'selected';} ?>>依建立日期排序 由新至舊</option>
                <option value="1" <?php if($_GET['sltsort']=='1'){ echo 'selected';} ?>>依建立日期排序 由舊至新</option>
                <option value="2" <?php if($_GET['sltsort']=='2'){ echo 'selected';} ?>>依活動日期排序 由遠至近</option>
                <option value="3" <?php if($_GET['sltsort']=='3'){ echo 'selected';} ?>>依活動日期排序 由近至遠</option>
                <option value="4" <?php if($_GET['sltsort']=='4'){ echo 'selected';} ?>>依活動費用排序 由高至低</option>
                <option value="5" <?php if($_GET['sltsort']=='5'){ echo 'selected';} ?>>依活動費用排序 由低至高</option>
            </select>
        <input name="i_search" type="hidden" value="<?=$_GET['i_search'] ?>">
        </form>
    </div>

    <div class="m-auto col-md-8 d-flex justify-content-end">
        <form method="get" class="form-inline">
            <input class="form-control" type="text" placeholder="請輸入搜尋關鍵字" name="i_search" id="i_search" value="<?php if($_GET['i_search']!=NULL){echo $_GET['i_search']; } ?>">
            <button class="btn btn-warning text-white " type="submit">搜尋</button>
            <!-- 隱藏欄位記錄欄位排序設定,如此搜尋後才會原排序方式-->
            <input name="sltsort" type="hidden" value="<?=$_GET['sltsort'] ?>">
        </form>
    </div>

    </div>
</div>




<div class="container my-0">
<div class="row" id="allBlocks">

<?php 
if(!$total_records==0){
    while($row_result = $result -> fetch(PDO::FETCH_ASSOC)){ 
        //讀取資料到表格內
        echo "<div class='col-md-4 col-sm-6 mb-3 mt-md-0'>";          
        echo "<div class='card cardbgc border-secondary p-0'>";          
        echo "<img src='upload_test/".$row_result['a_preview']."' class='card-img-top cardimg border-bottom  border-secondary' alt='...'>";

        echo "<div class='card-body p-0 '>";

        echo "<p class='mt-2 mb-1 px-2 textellipsis h5 card-title'>".$row_result['a_title']."</p>";

            echo "<div class='mt-2 mb-1 px-2'>"; 
            echo "<i class='far fa-clock text-dark'></i>";
            echo "<span class='px-2 h6 text-dark'><small>".$row_result['a_date_start']."-".$row_result['a_date_end']."</small></span>";
            echo "</div>";  

            // echo "<p class='mt-2 mb-1 px-2'>開始日期:".$row_result['a_date_start']."</p>";
            // echo "<p class='mt-2 mb-1 px-2'>結束日期:".$row_result['a_date_end']."</p>";

            
            echo "<div class='mt-2 mb-1 px-2'>"; 
            echo "<i class='fas fa-map-marker-alt'></i>";
            echo "<span class='mt-2 mb-1 px-2'><small>".$row_result['a_address']."</small></span>";
            echo "</div>";  

            echo "<div class='mt-2 mb-1 px-2'>"; 
            echo "<i class='fas fa-dollar-sign'></i>";
            echo "<span class='mt-2 mb-1 px-2'><small>".$row_result['a_price']."</small></span>";
            echo "</div>";  

            echo "<div class='mt-2 mb-1 px-2'>"; 
            echo "<i class='fas fa-tags text-muted'></i>";
            echo "<span class='mt-2 mb-1 px-2 text-muted'><small>".$row_result['a_type']."</small></span>";
            echo "</div>";  

        echo "</div>";  

        echo "<div class='d-flex justify-content-center card-footer p-0'>";  
        // echo "<a href='topic_update.php?a_id=".$row_result['a_id']."' class='btn btn-primary mx-2 text-decoration-none text-white  border-0 font-weight-bold'>編輯</a>";
        // echo "<a href='topic_delete.php?a_id=".$row_result['a_id']."' class='btn btn-danger mx-2 text-decoration-none text-white  border-0 font-weight-bold'>刪除</a>";
        // echo "<a href='active_page.php?a_id=".$row_result['a_id']."' class='btn btn-secondary mx-2 text-decoration-none text-white  border-0 font-weight-bold'>詳細活動內容</a>";
        echo "<a href='active_page.php?a_id=".$row_result['a_id']."' class='btn btn-warning mx-0 text-decoration-none text-white btn-block btn-lg font-weight-bold'>詳細活動內容</a>";
        echo "</div>";  
        echo "</div>";  
        // echo "</div>";  
        echo "</div>";  
    } 
}
else{
    echo '<tr><td colspan="4" align="center"><code>Sorry！無您要搜尋的資枓！</code></td></tr>';
}

?>

</div>
</div>




    <!-- <div class="create" onclick="showDialog()" >
        <div class="plus">
            <img src="https://image.flaticon.com/icons/png/512/24/24115.png" width="45" height="45">
        </div>
    </div> -->
    
    <div class="dialog container" id="dialog" style="height:94%;overflow-y:auto;">
        <div class="close" onclick="closeDialog()">
            <div class="close2">
                <img src="https://www.flaticon.com/svg/static/icons/svg/2089/2089733.svg" width="13" height="13">
            </div>
        </div>
        <p class="text-center p-1 h2">建立新活動</p>
        <form action="topic_insert.php" method="post" enctype="multipart/form-data">

            <div class="form-row col-md-12 mb-1 px-0 mx-0">
                <label for="a_organizer" class="mb-1">主辦單位</label>
                <input type="text" name="a_organizer" id="a_organizer" class="form-control" placeholder="" required="required">
            </div>

            <div class="form-row col-md-12 mb-1 px-0 mx-0">
                <label for="a_title" class="mb-1">活動名稱</label>
                <input type="text" name="a_title" id="a_title" class="form-control" placeholder="" required="required">
            </div>

            <div class="form-row">
            <div class="form-row col-md-6 mb-1 mx-0">
                    <label for="a_city" class="mb-1">縣市</label>
                    <select class="form-control" id="a_city" name="a_city">
                        <option value="" selected disabled>選縣市</option>
                    </select>
                </div>
                <div class="form-row col-md-6 mb-1 mx-0">
                    <label for="a_area" class="mb-1">區</label>
                    <select class="form-control" id="a_area" name="a_area">
                        <option value="" selected disabled>選區域</option>
                    </select>
                </div>
            </div>

            <div class="form-row col-md-12 mb-1 px-0 mx-0">
                <label for="a_road" class="mb-1">地址</label>
                <input type="text" name="a_road" id="a_road" class="form-control" placeholder="" required="required">
            </div>   

            <div class="form-row">
                <div class="col-md-6 mb-1 mx-0">
                    <label for="a_date_start" class="mb-1">活動開始時間</label>
                    <div class="input-group date"  id="datetimepicker1" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker1" name="a_date_start"/>
                        <div class="input-group-append" data-target="#datetimepicker1" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>            
                <div class="col-md-6 mb-1 mx-0">
                    <label for="a_date_end" class="mb-1">活動結束時間</label>
                    <div class="input-group date"  id="datetimepicker2" data-target-input="nearest">
                        <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker2" name="a_date_end"/>
                        <div class="input-group-append" data-target="#datetimepicker2" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="form-row col-md-6 mb-1 mx-0">
                    <label for="a_price" class="mb-1">活動費用</label>
                    <input type="text" name="a_price" id="a_price" class="form-control" placeholder="" required="required">
                </div>
                <div class="form-row col-md-6 mb-1 mx-0">
                    <label for="a_type" class="mb-1">活動類型</label>
                    <select class="form-control" name="a_type">
                        <option selected value="k5s35kegneqj0hv1jrblrp3pfo@group.calendar.google.com">音樂戲劇</option>
                        <option value="3oo9e88mf64gspfmer5q7psa6s@group.calendar.google.com">藝文展覽</option>
                        <option value="nqbbsh8klugv0s9runjbl1tscs@group.calendar.google.com">課程講座</option>
                        <option value="peao0cj5r50j45jc7ncf8bos7g@group.calendar.google.com">旅遊美食</option>
                        <option value="090jpt3biktimd6e7pv45ctlg4@group.calendar.google.com">市集</option>
                        <option value="2fokd3n4e0i0dijokm4svp5r5s@group.calendar.google.com">運動</option>
                        <option value="sm04tudqvm0qsst7ah3s5bi0r0@group.calendar.google.com">公益</option>
                        <option value="iinlgr3s9qqasu0k81d6ihs2i8@group.calendar.google.com">其他</option>
                    </select>
                </div>
            </div>

            <div class="form-row col-md-12 mb-1 px-0 mx-0">
                <label for="a_url" class="mb-1">活動連結</label>
                <input type="text" name="a_url" id="a_url" class="form-control" placeholder="">
            </div>

            <div class="form-row col-md-12 mb-1 px-0 mx-0">
            <input name="file" type="file" id="file" class="form-control-file" accept="image/*" onchange="checkfile(this);">
            </div>         

            <div class="form-row col-md-12 mb-1 px-0 mx-0">
                <label for="a_text" class="mb-1">活動文章</label>
                <textarea rows="8" name="a_text" id="a_text" class="form-control" placeholder="" required="required">
                </textarea>
            </div>

            <input type="submit" name="submit" id="submit" value="送出表單" class="btn btn-primary btn-block my-3">

        </form>


    </div>
    <!-- </div> -->

<!-- <div class="row"> -->


<div class="col-md-12 my-3" align="center">
<nav aria-label="Page navigation example">
<ul class="pagination pagination-sm justify-content-center">
  <?php
  if($pages>1){  //總頁數>1才顯示分頁選單

	//分頁頁碼；在第一頁時,該頁就不超連結,可連結就送出$_GET['page']
	if($page=='1'){
		echo '<li class="page-item"><a class="page-link">首頁</a></li>';
		echo '<li class="page-item"><a class="page-link">上一頁</a></li>';		
	}else{
		echo '<li class="page-item"><a class="page-link" href=?page=1&i_search='.$_GET['i_search'].'&sltsort='.$_GET['sltsort'].'>首頁</a></li>';
		echo '<li class="page-item"><a class="page-link" href=?page='.($page-1).'&i_search='.$_GET['i_search'].'&sltsort='.$_GET['sltsort'].'>上一頁</a></li>';		
	}

	//中央分頁部份,處於該頁就不超連結,可連結就送出$_GET['page]
    for( $i=1 ; $i<=$pages ; $i++ ) {
		if ( $page-3 < $i && $i < $page+3 ) {
			if($i==$page){
              echo '<li class="page-item active"><a class="page-link">'.$i.'</a></li>';
			}else{
              echo '<li class="page-item"><a class="page-link" href=?page='.$i.'&i_search='.$_GET['i_search'].'&sltsort='.$_GET['sltsort'].'>'.$i.'</a></li>';
			}
		}
	}

	//在最後頁時,該頁就不超連結,可連結就送出$_GET['page']	
	if($page==$pages){
      echo '<li class="page-item"><a class="page-link">下一頁</a></li>';
      echo '<li class="page-item"><a class="page-link">末頁</a></li>';
	}else{
      echo '<li class="page-item"><a class="page-link" href=?page='.($page+1).'&i_search='.$_GET['i_search'].'&sltsort='.$_GET['sltsort'].'>下一頁</a></li>';
      echo '<li class="page-item"><a class="page-link" href=?page='.$pages.'&i_search='.$_GET['i_search'].'&sltsort='.$_GET['sltsort'].'>末頁</a></li>';
	}
  }
  ?>	
</ul>
</nav>
</div>

<div class="col-md-12 my-3" align="center">	
  <?php
	//每頁顯示筆數明細
	echo '顯示 '.$page_start.' 到 '.$page_end.' 筆 共 '.$total_records.' 筆，目前在第 '.$page.' 頁 共 '.$pages.' 頁'; 
  ?>
</div>



<?php
include("footer.php");
?>


<?php
include("jsAndBs4.php");
?>
</body>
</html>