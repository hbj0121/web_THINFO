<!-- 검색일 정보 가져와서 테이블로 표시 -->
<meta charset="utf-8">

<table class = "info_table">
  <!-- 테이블 제목 -->
  <tr>
    <th>저장시간</th><th>온도</th><th>습도</th>
  </tr>
  <!-- 검색일의 정보를 읽어오는 sql구문  -->
  <?php
    $conn = mysqli_connect('localhost',
    'root',
    'qwerty123456',
    'th_db');
    $sql = "SELECT * from th_db where
     Timestamp LIKE '{$_POST['date']}%' ORDER BY id asc limit 300";
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($result)){
        $list = array(
          'Timestamp'=>htmlspecialchars($row['Timestamp']),
          'temperature'=>htmlspecialchars($row['temperature']),
          'humid'=>htmlspecialchars($row['humid'])
        );
    ?>
    <!--내용-->
      <tr>
        <td><?=$list['Timestamp']?></td>
        <td><?=$list['temperature']?></td>
        <td><?=$list['humid']?></td>
      </tr>
    <?php
    }
   ?>
 </tr>
</table>
