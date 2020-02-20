<?php
  $recent_val = "SELECT Timestamp, temperature, humid FROM th_db ORDER BY id DESC limit 1";
  $result = mysqli_query($conn, $recent_val);
  $row = mysqli_fetch_array($result);
  $article['Timestamp'] = $row['Timestamp'];
  $article['temperature'] = $row['temperature'];
  $article['humid'] = $row['humid'];
 ?>
