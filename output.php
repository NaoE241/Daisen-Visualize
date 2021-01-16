<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="utf-8">
    <title>大仙公園 見える化</title>
 </head>
 <body>
 <table border="1" id="wrap">
        <tr>
          <th>sensor_id</th>
          <th>point</th>
          <th>timestamp</th>
          <th>count1</th>
          <th>count2</th>
        </tr>

<?php
//Add data to table

//Access to DB
$dsn = 'mysql:host=[hostname];dbname=[dbname];charset=utf8mb4';   
$db_user = '[usrname]';
$db_pass = '[password]';

try {
   $db = new PDO($dsn, $db_user, $db_pass);
   echo "Success\n";
 } catch (PDOException $e) {
   echo 'Error: ' . $e->getMessage();
 }

//Get all data 
$result_data = $db -> query('SELECT * FROM jsontable');

//Access to each data
foreach($result_data as $data){
    //Add tag
    $row = "<tr><td>".$data['sensor_id'].
           "</td><td>".$data['point'].
           "</td><td>".$data['timestamp'].
           "</td><td>".$data['count1'].
           "</td><td>".$data['count2']."</td></tr>";
    //Output
    echo($row);
}
?>

</table>

 </body>
</html>