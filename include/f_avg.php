<?php
  /*평균 산출 sql구문*/
  $sql = "SELECT * from th_db where
   Timestamp LIKE '{$_POST['date']}%' ORDER BY id asc limit 300";
  $result = mysqli_query($conn, $sql);
  while($row = mysqli_fetch_array($result)){
      $list = array(
        'Timestamp'=>htmlspecialchars($row['Timestamp']),
        'temperature'=>htmlspecialchars($row['temperature']),
        'humid'=>htmlspecialchars($row['humid'])
    );
    $avgT = $avgT + (int)$list['temperature'];
    $avgH = $avgH + (int)$list['humid'];
    $count = $count + 1;
  }
$dateVal = substr($list['Timestamp'],0,10);
  ?>
  <?php
    /*값이 없을경우 되돌아가기*/
    if( empty($count) ){
      echo "<script>alert(\"정보가 없는 날입니다.\");
            history.go(-1);
      </script>";
    }
  ?>
