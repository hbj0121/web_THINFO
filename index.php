
<?php include "./include/sql_conn.php"; ?>
<?php include "./include/index_sql.php"; ?>
<!-- header -->
<!DOCTYPE html>
<html lang="kor" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/style.css">
<title>작업실 온도 습도 측정</title>
</head>
<body class="body">
<!-- 제목 -->
<?php include "./include/all_top_info.php"; ?>

<!-- 현재 정보 표시 -->
  <div class="view">
    <div class="temp"><i class="fas fa-thermometer-full"></i> <span style='color:<?= ((int)$article['temperature'] >= 20) ? '#D44646':'white'; ?>'><?=$article['temperature']?></span><span class="small">ºC</span></div>
    <div class="hum"><i class="fas fa-tint"></i> <span style='color:<?= ((int)$article['humid'] >= 35) ? '#A6D5D3':'white'; ?>'><?=$article['humid']?></span><span class="small">%</span></div>
</div>
  <div class="time">
    <div><?=$article['Timestamp']?> 기준 정보　</div>
</div>

<?php include "./include/index_avg.php"; ?>
<!-- 그래프 표시 -->
  <div id="container" class="graph"></div>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
          var myChart = Highcharts.chart('container', {
              colors: ['#ff2424', '#4dd5ff'],
              chart: {
                  type: 'line'
              },
              title: {
                  text: 'Temperature, Humid'
              },
              xAxis: {
                  categories: [<?php foreach($time_list as $key){echo $key.", ";}?>]
              },
              yAxis: {
                  title: {
                      text: 'VALUE'
                  }
              },
              series: [{
                  name: 'Temperature',
                  data: [<?php foreach($temp_list as $key){echo $key.", ";}?>]
              }, {
                  name: 'Humid',
                  data: [<?php foreach($hum_list as $key){echo $key.", ";}?>]
              }]
          });
      });
   </script>
   <!-- 문자로 현재 정보 표시와 검색기능 -->
    <div id="grid">
      <div class="section">
      <p>날짜별 정보검색</p>
      <form autocomplete="off" action="find_data.php" method="POST" >
       Date: <input type="text" readonly="readonly" name="date" id="datepicker"><input type="submit" value="검색">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <title>jQuery UI Datepicker - Default functionality</title>
       <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
       <link rel="stylesheet" href="/resources/demos/style.css">
       <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
       <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
       <script>
          $( function() {
           $( "#datepicker" ).datepicker( {
             dateFormat: 'yy-mm-dd',
             monthNamesShort: ['1월','2월','3월','4월','5월','6월','7월','8월','9월','10월','11월','12월'],
             dayNamesMin: ['일','월','화','수','목','금','토'],
             maxDate: 0
           });
         } );
      </script>
      </form>
    </div>
  </div>

  <?php include "./include/all_footer.php"; ?>
  <script src="https://code.highcharts.com/highcharts.js"></script>
  <script src="https://kit.fontawesome.com/d1ea42ed63.js" crossorigin="anonymous"></script>
  </body>
</html>
