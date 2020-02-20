    <!-- 날짜검색 후 그래프에 사용할 값가져옴-->
  <?php
      date_default_timezone_set('Asia/Seoul');
      $today = date("Y-m-d");
      $sql2 = "SELECT DATE_FORMAT(Timestamp, '%H') time, round(avg(temperature),1) , round(avg(humid),1)  from
              th_db WHERE Timestamp LIKE '{$_POST['date']}%' GROUP BY time";
      $result2 = mysqli_query($conn, $sql2);
      $time_list = [];
      $temp_list = [];
      $hum_list = [];
      while($row2 = mysqli_fetch_array($result2)){
        array_push( $time_list, (int)$row2['time'] );
        array_push( $temp_list, $row2['round(avg(temperature),1)']);
        array_push( $hum_list, $row2['round(avg(humid),1)']);
    }
  ?>

    <?php
        for($i = 0; $i < 24; $i++){
          if(in_array($i, $time_list)){

          }
          else{
            array_splice($time_list, $i, 0, $i);
            array_splice($temp_list, $i, 0, 'null');
            array_splice($hum_list, $i, 0, 'null');
          }
        }
     ?>
