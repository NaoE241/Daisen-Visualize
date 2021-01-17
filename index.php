<?php
 header('Expires: Tue, 1 Jan 2019 00:00:00 GMT');
 header('Last-Modified:' . gmdate( 'D, d M Y H:i:s' ) . 'GMT');
 header('Cache-Control:no-cache,no-store,must-revalidate,max-age=0');
 header('Cache-Control:pre-check=0,post-check=0',false);
 header('Pragma:no-cache');
?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>大仙公園 見える化</title>
 </head>
 <body>
      <table border="1">
        <tr>
          <th>sensor_id</th>
          <th>point</th>
          <th>timestamp</th>
          <th>count1</th>
          <th>count2</th>
        </tr>

<?php

//Access to DB
$dsn = 'mysql:host=[hostname];dbname=[dbname];charset=utf8mb4';   
$db_user = '[usrname]';
$db_pass = '[password]';

try {
   $db = new PDO($dsn, $db_user, $db_pass);
   echo "接続OK！";
 } catch (PDOException $e) {
   echo 'DB接続エラー！: ' . $e->getMessage();
 }

//Get all data 
$result_data = $db -> query('SELECT * FROM jsontable');

//Get now date
$today = date("Y-m-d");
$time1 = new DateTime($today);

//Access to each data
foreach($result_data as $data){
  
  //Compare date
  $day = substr($data['timestamp'],0,10);
  $time2 = new DateTime($day);
  $diff = $time1->diff($time2);

  //If in a week
  if($diff->days <= 7){
    //Get each data
    $row = "<tr><td>".$data['sensor_id'].
           "</td><td>".$data['point'].
           "</td><td>".$data['timestamp'].
           "</td><td>".$data['count1'].
           "</td><td>".$data['count2']."</td></tr>";
    //Output
    //$("#wrap").append($row);
    echo($row);
  }
}

?>

  </table>

 </body>
</html>