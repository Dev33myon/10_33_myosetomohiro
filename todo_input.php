<?php
session_start();
include("functions.php");
check_session_id();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DB連携型ポイントリスト（入力画面）</title>
</head>

<body>
  <form action="create_file.php" method="POST" enctype="multipart/form-data">
    <fieldset>
      <legend>DB連携型ポイントリスト（入力画面）</legend>
      <a href="todo_read.php">登録ポイント</a>
      <a href="todo_logout.php">logout</a>
      <div>
        緯度: <input type="text" name="lat" id="lat">
      </div>
      <div>
        経度: <input type="text" name="lng" id="lng">
      </div>
      <div>
        image:<input type="file" name="upfile" accept="image/*" capture="camera"> 
      </div>
      <div>
        <button>ポイント登録</button>
      </div>
    </fieldset>
  </form>

  <!-- 地図 -->
  <header>
        <h1>Map</h1>
    </header>

   <main>

      <form onsubmit="return false;">
          <input type="text" value="ジーズ福岡" id="address">
          <button type="button" value="検索" id="map_button">検索</button>
      </form>
     <!-- 地図を表示させる要素 -->
      <div class="map_box01">
        <div  id="map-canvas" style="width: 700px; height: 400px; text-align: center;"></div>
      </div>
 
<!-- 
       <p>検索座標</p> 
       <p>緯度 <input type="text" id="lat" value=""></p>
       <p>経度 <input type="text" id="lng" value=""></p> -->

   </main>

    <footer>
        <small>G's</small>
    </footer>
    <script async defer src="" type="text/javascript"></script>
    <script>

// map

        var getMap = (function() {
  function codeAddress(address) {
    // google.maps.Geocoder()コンストラクタのインスタンス？を生成
    var geocoder = new google.maps.Geocoder();
 
    // 地図表示設定
    var mapOptions = {
      zoom: 16,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };
 
    // 地図を表示させるインスタンスを生成
    var map = new google.maps.Map(document.getElementById("map-canvas"), mapOptions);
     
    //マーカー変数
    var marker;
     
    // geocoder.geocode()メソッドを実行 
    geocoder.geocode( { 'address': address}, function(results, status) {
       
      // ジオコーディングが成功した場合
      if (status == google.maps.GeocoderStatus.OK) {
         
        // 変換した緯度・経度情報を地図の中心に表示
        map.setCenter(results[0].geometry.location);
         
        //表示している地図上の緯度経度
        document.getElementById('lat').value=results[0].geometry.location.lat();
        document.getElementById('lng').value=results[0].geometry.location.lng();
         
        // マーカー設定
        marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location
        });
       
      // ジオコーディングに失敗した場合
      } else {
        console.log('Geocode was not successful for the following reason: ' + status);
      }
    });
     
    // マップをクリックで位置変更
    map.addListener('click', function(e) {
      getClickLatLng(e.latLng, map);
    });

    function getClickLatLng(lat_lng, map) {
       
      //表示している地図上の緯度経度
      document.getElementById('lat').value=lat_lng.lat();
      document.getElementById('lng').value=lat_lng.lng();
         
      // マーカーを設置
      marker.setMap(null);
      marker = new google.maps.Marker({
        position: lat_lng,
        map: map
      });
     
      // 座標の変更
      map.panTo(lat_lng);
    }
   
  }
   
  //inputのvalueで検索して地図を表示
  return {
    getAddress: function() {
      // ボタンに指定したid要素を取得
      var button = document.getElementById("map_button");
       
      // ボタンが押された時の処理
      button.onclick = function() {
        // フォームに入力された住所情報を取得
        var address = document.getElementById("address").value;
        // 取得した住所を引数に指定してcodeAddress()関数を実行
        codeAddress(address);
      }
       
      //読み込まれたときに地図を表示
      window.onload = function(){
        // フォームに入力された住所情報を取得
        var address = document.getElementById("address").value;
        // 取得した住所を引数に指定してcodeAddress()関数を実行
        codeAddress(address);
      }
    }
  };
 
})();
getMap.getAddress();

    </script>
</body>

</html>