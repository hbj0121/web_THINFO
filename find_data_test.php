<?php include "./include/sql_conn.php"; ?>
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
<?php include "./include/top_info.php"; ?>
<?php include "./include/make_avg2.php"; ?>
<!-- 메인으로 -->
   <h3><a href="index.php" class="section">돌아가기</a></h3>
<!-- 검색일의 그래프 표시 -->
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
<!-- 검색일의 정보 표시 접기/펼치기 기능버튼 -->
    <span id="more" style="CURSOR: pointer" onclick="if(story.style.display=='none') {story.style.display='';more.innerText='>접기'} else {story.style.display='none';more.innerText='>모든 온도 값 보기'}">>모든 온도 값 보기</span>
      <div id="story" style="display: none"><HR>
      <?php include "./include/make_table.php"; ?>
    <HR></div>
  <br>
  <br>
  <?php include "./include/footer.php"; ?>
   <script src="https://kit.fontawesome.com/d1ea42ed63.js" crossorigin="anonymous"></script>
   <script src="https://code.highcharts.com/highcharts.js"></script>
  </body>
</html>
