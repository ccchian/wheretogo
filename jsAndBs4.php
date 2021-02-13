<script type="text/javascript">

var urLat;
var urLng;
const getCityDatas = 'CityCountyData.json';
    //縣市選單選項
async function crateCityOption() {
    const citySelect = document.getElementById('a_city');
    const response = await fetch(getCityDatas);
    const data = await response.json();
    console.log(data);
    let cityOptionHTML = "";

    cityOptionHTML = `<option value="" selected disabled>選縣市</option><option value="臺南市">臺南市</option><option value="高雄市">高雄市</option>`
    //輸出在選單中
    citySelect.innerHTML = cityOptionHTML;
    document.getElementById('a_city').addEventListener('change', function () {
    const citySelected = document.getElementById('a_city').value; // 取得台南市string
    createAreaOption(citySelected);
    })
    }

    // 輸出鄉鎮選單選項
    async function createAreaOption(citySelected) {
    const areaSelect = document.getElementById('a_area');
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
        document.getElementById('a_area').addEventListener('change', function () {
        var areaSelected = document.getElementById('a_area').value; // 取得東區string
    })
    }

    crateCityOption();

    function checkfile(sender) {
    // 可接受的附檔名
    var validExts = new Array(".jpg", ".png", ".jpeg", ".JPG", "JPEG", ".PNG");
    var fileExt = sender.value;
    fileExt = fileExt.substring(fileExt.lastIndexOf('.'));
    if (validExts.indexOf(fileExt) < 0) {
    alert("檔案類型錯誤，可接受的副檔名有：" + validExts.toString());
    sender.value = null;
    return false;
    }
    else return true;
    }

    $(function () {
        $('#datetimepicker1').datetimepicker({
           format: 'YYYY-MM-DD HH:mm',
           locale:'zh-tw'
        });
    });

    $(function () {
        $('#datetimepicker2').datetimepicker({
           format: 'YYYY-MM-DD HH:mm',
           locale:'zh-tw'
        });
    });
</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="js/custom.js"></script>

