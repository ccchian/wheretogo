//===variables===
var myLocation = [22.997510, 120.212761];   // default location 台南車站[latitude, longitude]
let myMap;
let markers = null;                         // MarkerClusterGroup
let range = 0.8;                            // add to menu list if location is in this range
let activities = null;                      // total activities data
let activityItems = [];                     // save generated activiy info
let activityMarkers = {};                   // save generated activity markers
let isGPSCatched = false;                   // check if gps is catched
let activityObj = {};
const getCityDatas = './assets/CityCountyData.json';
const gerAreaLatLng = 'TainanArea.json';
const getActivityData = "./myjson.json";
const lovedStores = JSON.parse(localStorage.getItem('lovedStores')) || [];


// ===== ===== ===== ===== icons Start ===== ===== ===== =====
// ---> 紫色icon 標示定位
let violetIcon = new L.Icon({
    iconUrl: 'https://cdn.rawgit.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-violet.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
});
//綠色
let greenIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-green.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
});
//金色
let goldIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-gold.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
});
//紅色
let redIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
});
//橘色
let orangeIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-orange.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
});
//黃色
let yellowIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-yellow.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
});
//灰色
let greyIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-grey.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
});
//黑色
let blackIcon = new L.Icon({
    iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-black.png',
    shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
    iconSize: [25, 41],
    iconAnchor: [12, 41],
    popupAnchor: [1, -34],
    shadowSize: [41, 41]
});
//愛心
var heartBtn = document.getElementById("heartBtn");


//=========================== 載入MAP ================================
//initialize the map on the "map" div with a given center and zoom
myMap = L.map('mapid').setView(myLocation, 13);
//即時監控位置 會對更新頁面影響到地圖 待研究 myMap.locate({ setView: true, watch: true });
// Add base map layer into the map
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(myMap);
// 宣告一個圖層
let markersC1 = new L.MarkerClusterGroup().addTo(myMap);
let markersC2 = new L.MarkerClusterGroup().addTo(myMap);
let markersC3 = new L.MarkerClusterGroup().addTo(myMap);
let markersC4 = new L.MarkerClusterGroup().addTo(myMap);
let markersC5 = new L.MarkerClusterGroup().addTo(myMap);
let markersC6 = new L.MarkerClusterGroup().addTo(myMap);
let markersC7 = new L.MarkerClusterGroup().addTo(myMap);
let markersC8 = new L.MarkerClusterGroup().addTo(myMap);
let markersTotal = [];

// ---------- 現在位置 ------------
const myMarker = L.marker(myLocation, { icon: redIcon }).addTo(myMap);

if ('geolocation' in navigator) {
    //alert("Geolocation available");
    navigator.geolocation.getCurrentPosition((position) => {
        const lat = position.coords.latitude;
        const lon = position.coords.longitude;
        //document.getElementById('latitude').textContent = lat;
        //document.getElementById('longitude').textContent = lon;
        myLocation = [lat, lon]

        // 找出你在哪並顯示marker
        myMap.setView([lat, lon], 13);
        myMarker.setLatLng([lat, lon]).bindPopup(`<h6>Here!</h6>`).openPopup();

        //定位按鈕動作
        let geoBtn = document.getElementById('jsGeoBtn');
        geoBtn.addEventListener('click', function () {
            myMap.setView([lat, lon], 17);
            myMarker.setLatLng([lat, lon]).bindPopup(
                `<h6>Here!</h6>`)
                .openPopup();
        }, false);
    });
} else {
    alert("Geolocation is not supported by this browser.");
}
// ---------- 定義現在位置 END ------------

//渲染活動資料列表

//inputActivityData(getActivityData);
activityListPanel(getActivityData);

// ===== ===== ===== ===== Async START ===== ===== ===== =====
async function activityListPanel(InputJSON) {
    console.log('inputActivityData go');
    const response = await fetch(InputJSON);
    const data = await response.json();

    dataIntoType(data); //一開始載入全部進行type marker分類
    //typeListAll(data); //進行全部渲染出列表

    function dataIntoType(data) {
        console.log("Go dataIntoType");
        data.forEach(x => {
            switch (x.a_type) {
                case "音樂戲劇":
                    marker = L.marker([x.latitude, x.longitude], {
                        title: x.a_title,
                        icon: greenIcon,
                        riseOnHover: true
                    }).bindPopup(genPopup(x));
                    // Add each marker to the group
                    markersC1.addLayer(marker);
                    break;
                case "藝文展覽":
                    marker = L.marker([x.latitude, x.longitude], {
                        title: x.a_title,
                        icon: goldIcon,
                        riseOnHover: true
                    }).bindPopup(genPopup(x));
                    markersC2.addLayer(marker);
                    break;
                case "旅遊美食":
                    marker = L.marker([x.latitude, x.longitude], {
                        title: x.a_title,
                        icon: violetIcon,
                        riseOnHover: true
                    }).bindPopup(genPopup(x));
                    markersC3.addLayer(marker);
                    break;
                case "課程講座":
                    marker = L.marker([x.latitude, x.longitude], {
                        title: x.a_title,
                        icon: orangeIcon,
                        riseOnHover: true
                    }).bindPopup(genPopup(x));
                    markersC4.addLayer(marker);
                    break;
                case "市集":
                    marker = L.marker([x.latitude, x.longitude], {
                        title: x.a_title,
                        icon: yellowIcon,
                        riseOnHover: true
                    }).bindPopup(genPopup(x));
                    markersC5.addLayer(marker);
                    break;
                case "運動":
                    marker = L.marker([x.latitude, x.longitude], {
                        title: x.a_title,
                        icon: greyIcon,
                        riseOnHover: true
                    }).bindPopup(genPopup(x));
                    markersC6.addLayer(marker);
                    break;
                case "公益":
                    marker = L.marker([x.latitude, x.longitude], {
                        title: x.a_title,
                        icon: blackIcon,
                        riseOnHover: true
                    }).bindPopup(genPopup(x));
                    markersC7.addLayer(marker);
                    break;

                default:
                    marker = L.marker([x.latitude, x.longitude], {
                        title: x.a_title,
                        riseOnHover: true
                    }).bindPopup(genPopup(x));
                    markersC8.addLayer(marker);
                    break;
            }
        });
    }

    function typeListAll(data) {
        console.log('typeListAll Go');
        let str = ``;
        document.getElementById("activity-list").innerHTML = str;
        data.forEach(x => {
            str = createHTML(x, str);
        });
        document.getElementById("activity-list").innerHTML = str;
        findActivity();
        loveBtnActive();
        getLovedStores(lovedStores, data);
    }

    document.getElementById('city').addEventListener('change', function () {
        const citySelected = document.getElementById('city').value; // 取得台南市string
        createAreaOption(citySelected);
    })

    document.getElementById('area').addEventListener('change', function () {
        var areaSelected = document.getElementById('area').value; // 取得東區string
        reLocationArea(areaSelected);
        passout(data,areaSelected);
        findActivity();
        loveBtnActive();
    })
    
    document.getElementById('loved-btn').addEventListener('click', function () {
        //typeListAll(data);
        getLovedStores(lovedStores, data);
    })
}
// ===== ===== ===== ===== Async END ===== ===== ===== =====



//----- 類型按鈕＆圖層 --------
document.getElementById('actType').addEventListener('change', (actType) => {
    actType = document.getElementById('actType').value;
    typeList(actType);
    typeMap(actType);
});

let typeMap = (actType) => {
    myMap.removeLayer(markersC1);
    myMap.removeLayer(markersC2);
    myMap.removeLayer(markersC3);
    myMap.removeLayer(markersC4);
    myMap.removeLayer(markersC5);
    myMap.removeLayer(markersC6);
    myMap.removeLayer(markersC7);
    myMap.removeLayer(markersC8);
    switch (actType) {
        case "1":
            myMap.addLayer(markersC1);
            break;
        case "2":
            myMap.addLayer(markersC2);
            break;
        case "3":
            myMap.addLayer(markersC3);
            break;
        case "4":
            myMap.addLayer(markersC4);
            break;
        case "5":
            myMap.addLayer(markersC5);
            break;
        case "6":
            myMap.addLayer(markersC6);
            break;
        case "7":
            myMap.addLayer(markersC7);
            break;
        case "8":
            myMap.addLayer(markersC8);
            break;
        default:
            myMap.addLayer(markersC1);
            //myMap.addLayer(markers1);
            myMap.addLayer(markersC2);
            myMap.addLayer(markersC3);
            myMap.addLayer(markersC4);
            myMap.addLayer(markersC5);
            myMap.addLayer(markersC6);
            myMap.addLayer(markersC8);
            break;
    }
}

// --------> 類型按鈕按下去後重新渲染表單 START
async function typeList(actType) {
    const response = await fetch(getActivityData);
    const data = await response.json();
    let str = ``;
    document.getElementById("activity-list").innerHTML = str;
    if (actType == "1") {
        for (let i = 0; i < data.length; i++) {
            if (data[i].a_type == "音樂戲劇") {
                //console.log(createHTML(data[i], str));
                str = createHTML(data[i], str);
            }
        }
    } else if (actType == "2") {
        for (let i = 0; i < data.length; i++) {
            if (data[i].a_type == "藝文展覽") {
                str = createHTML(data[i], str);
            }
        }
    } else if (actType == "3") {
        for (let i = 0; i < data.length; i++) {
            if (data[i].a_type == "旅遊美食") {
                str = createHTML(data[i], str);
            }
        }
    } else if (actType == "4") {
        for (let i = 0; i < data.length; i++) {
            if (data[i].a_type == "課程講座") {
                str = createHTML(data[i], str);
            }
        }
    } else if (actType == "5") {
        for (let i = 0; i < data.length; i++) {
            if (data[i].a_type == "市集") {
                str = createHTML(data[i], str);
            }
        }
    } else if (actType == "6") {
        for (let i = 0; i < data.length; i++) {
            if (data[i].a_type == "運動") {
                str = createHTML(data[i], str);
            }
        }
    } else if (actType == "7") {
        for (let i = 0; i < data.length; i++) {
            if (data[i].a_type == "公益") {
                str = createHTML(data[i], str);
            }
        }
    } else if (actType == "8") {
        for (let i = 0; i < data.length; i++) {
            if (data[i].a_type == "其它") {
                str = createHTML(data[i], str);
            }
        }
    }

    document.getElementById("activity-list").innerHTML = str;
    findActivity();
    loveBtnActive();
    findActivity();
    //getLovedStores(lovedStores, data);

}
// 類型按鈕按下去後重新渲染表單 END <-------

//------------- 連動選單 START -----------------------
//縣市選單選項
crateCityOption();
async function crateCityOption() {
    const citySelect = document.getElementById('city');
    const response = await fetch(getCityDatas);
    const data = await response.json();
    let cityOptionHTML = "";
    cityOptionHTML = `<option value="" selected disabled>選縣市</option><option value="臺南市">臺南市</option><option value="高雄市">高雄市</option>`
    //輸出在選單中
    citySelect.innerHTML = cityOptionHTML;
    // document.getElementById('city').addEventListener('change', function () {
    //     const citySelected = document.getElementById('city').value; // 取得台南市string
    //     createAreaOption(citySelected);
    // })
}

// 輸出鄉鎮選單選項
async function createAreaOption(citySelected) {
    const areaSelect = document.getElementById('area');
    const response = await fetch(getCityDatas);
    const data = await response.json();
    const citySelectedObj = data.find(item => item.CityName === citySelected); // ={ CityName: "桃園市", CityEngName: "Taoyuan City", AreaList: Array }
    const areaArray = citySelectedObj.AreaList;
    let areaOptionHTML = "";
    for (let i = 0; i < areaArray.length; i++) {
        areaOptionHTML += `<option value="${areaArray[i].AreaName}">${areaArray[i].AreaName}</option>`;
    }

    // 輸出在選單中
    areaSelect.innerHTML = areaOptionHTML;
    // document.getElementById('area').addEventListener('change', function () {
    //     var areaSelected = document.getElementById('area').value; // 取得東區string
    //     reLocationArea(areaSelected);
    // })
}
// 地址連動地圖
async function reLocationArea(areaSelected) {
    const response = await fetch(gerAreaLatLng);
    const data = await response.json();
    for (let j = 0; j < data.length; j++) {
        if (data[j][0] === areaSelected) {
            myMap.setView([data[j][1][0], data[j][1][1]], 13);
        }
    }
}

// ---------------> Area checked
function passout(data,areaSelected){
    let str = "";
        document.getElementById("activity-list").innerHTML = str;
        for (let i = 0; i < data.length; i++) {
            //const actAddress = data[i].a_address;
                //const startDate = data[i].a_date_start;
                //const a_title = data[i].a_title;
                const cityName = data[i].a_city;
                const areaName = data[i].a_area;
                if (cityName == "臺南市" && areaName == areaSelected) {
                    str = createHTML(data[i], str);
                    document.getElementById("activity-list").innerHTML = str;
                    //findActivity();
                    //loveBtnActive();
                }
            console.log("outside if");
        }
}
// Area checked <---------------

// 距離按鈕
document.getElementById('nearby').addEventListener('change', function () {
    var distSelected = document.getElementById('nearby').value; //得dist-800
    distanceCal(distSelected);
})

//算活動列表個距離
async function distanceCal(distSelected) {
    const response = await fetch(getActivityData);
    const data = await response.json();
    var d800 = [];
    var d1200 = [];
    var d2000 = [];
    let str = ``;
    let str1 = "";
    let str2 = "";
    document.getElementById("activity-list").innerHTML = str;
    if (distSelected === "dist-800") {
        for (let i = 0; i < data.length; i++) {
            const inputlat = data[i].latitude;
            const inputlon = data[i].longitude;
            const activityName = data[i].a_title;
            let meters = 0;
            meters = myMap.distance(myLocation, [inputlat, inputlon]);
            if (meters < 1500) {
                str = createHTML(data[i], str);
                console.log(activityName);
                console.log(str);
            }
            document.getElementById("activity-list").innerHTML = str;
        }
        myMap.setView(myLocation, 16);
    }
    else if (distSelected === "dist-1200") {
        for (let i = 0; i < data.length; i++) {
            const inputlat = data[i].latitude;
            const inputlon = data[i].longitude;
            let meters = 0;
            meters = myMap.distance(myLocation, [inputlat, inputlon]);       
            if (meters < 1800) {
                console.log(meters);
                str = createHTML(data[i], str);
                document.getElementById("activity-list").innerHTML = str;
            }
        }
        myMap.setView(myLocation, 15);
    }
    else if (distSelected === "dist-2000") {
        data.forEach(data => {
            const inputlat = data.latitude;
            const inputlon = data.longitude;
            let meters = 0;
            meters = myMap.distance(myLocation, [inputlat, inputlon]);       
            if (meters < 2600) {
                console.log(meters);
                str = createHTML(data, str);
                document.getElementById("activity-list").innerHTML = str;
            }
        })
        myMap.setView(myLocation, 14); 
    }
    findActivity();
    loveBtnActive();
}

// ----------> 渲染活動資料列表樣板
function createHTML(activity, html, loved = false) {
    const actAddress = activity.a_address;
    const startDate = activity.a_date_start;
    const aTitle = activity.a_title;
    const actLat = activity.latitude;
    const actLng = activity.longitude;
    const actType = activity.a_type;
    html += `
        <div class="activity-info list-group" data-lat="${actLat}" data-lng="${actLng}" data-type="${actType}" data-date="${startDate}">
            <a href="#" class="list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-between">
                    <h6 class="mb-1">${aTitle}</h6>
                </div>
                <div class=" col-auto love ${loved ? 'hide' : ''}"><i class="far fa-heart" id="heartBtn" ></i></div>
                <div class=" col-auto loved ${loved ? 'show' : ''}"><i class="fas fa-heart" id="heartBtn" ></i></div>
                <p class="mb-1">${actAddress}</p>
                <p class="mb-1">${startDate}</p>
                <input type="hidden" value="${activity.a_id}">
            </a>
        </div>`;
    return [html];

}
// 渲染活動資料列表樣板 <---------- 

// --------> 點選卡片將地圖定為該位置
function findActivity() {
    const actInfoList = document.querySelectorAll(".activity-info");
    actInfoList.forEach(x => {
        x.addEventListener('click', function () {
            const aLink = x.querySelector("a");
            //console.log(aLink);
            aLink.addEventListener('click', e => {
                e.preventDefault();
            });
            //myMap.setView([x.dataset.lat, x.dataset.lng], 18);
            flyTo(x.dataset.lat, x.dataset.lng, 18);
        })
    })
}
// 點選卡片將地圖定為該位置 <--------

// 點愛心可以加入我的最愛。

function loveBtnActive() {
    const love = document.querySelectorAll('.activity-info .love');
    const loved = document.querySelectorAll('.activity-info .loved');
    console.log(loved);

    love.forEach(el => {
        const lovedStoreTel = el.parentNode.children[5].value; //用ID存取
        el.addEventListener('click', function () {
            lovedStores.push(lovedStoreTel);
            el.classList.toggle('hide');
            el.parentNode.children[2].classList.toggle('show');
            localStorage.setItem('lovedStores', JSON.stringify(lovedStores));
            console.log(loved);
        })
    })

    loved.forEach(el => {
        const lovedStoreTel = el.parentNode.children[5].value;
        el.addEventListener('click', function () {
            console.log("???");

            removeByValue(lovedStores, lovedStoreTel);
            el.classList.toggle('show');
            el.parentNode.children[1].classList.toggle('hide');
            localStorage.setItem('lovedStores', JSON.stringify(lovedStores));
        })
    })
}

// 顯示收藏的清單。
function getLovedStores(list, storeDatas) {
    let str = ``;
    let storeCount = 0;
    let lovedStores = [];
    console.log("getLovedStores");

    list.forEach(item => {
        const matchedStore = storeDatas.find(store => store.a_id.includes(item.trim()));
        lovedStores.push(matchedStore);
    })
    lovedStores.forEach(store => {
        [str] = createHTML(store, str, true);
    })
    document.getElementById('activity-list').innerHTML = str;

    loveBtnActive();
}

// 刪除陣列中的特定數值或字串。
function removeByValue(array, value) {
    return array.forEach((item, index) => {
        if (item === value) {
            array.splice(index, 1);
        }
    })
}

// set the map center, zoom
function flyTo(lat, long, zoom) {
    if (myMap) {
        if (zoom) {
            myMap.flyTo([lat, long], zoom);
        }
        else {
            myMap.flyTo([lat, long]);
        }
    }
}

// popup layout
const genPopup = (x) => {
    return `
    <div>
        <div>活動：${x.a_title}</div>
        <div class="d-flex justify-content-between">
        <div>地址：${x.a_address}</div></br>
        </div>
        <div>開始日：${x.a_date_start}</div> 
    </div>
    `;
}