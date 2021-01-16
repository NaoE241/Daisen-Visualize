<?php

//Access to DB
$dsn = 'mysql:host=[host];dbname=[dbname];charset=utf8mb4';
$db_user = '[usrname]';
$db_pass = '[password]';

try {
   $db = new PDO($dsn, $db_user, $db_pass);
   echo "Success";
 } catch (PDOException $e) {
   echo 'Error: ' . $e->getMessage();
 }

//Get all data 
$result_data = $db -> query('SELECT * FROM jsontable');

//Access to each data
foreach($result_data as $data){
    //Get each data
    $sensor_id = "sensor_id　".$data['sensor_id']."\n"."<br>".PHP_EOL;
    $point     = "point　　".$data['point']."\n"."<br>".PHP_EOL;
    $timestamp = "timestamp　　　".$data['timestamp']."\n"."<br>".PHP_EOL;
    $count1    = "count1　　".$data['count1']."\n"."<br>".PHP_EOL;
    $count2    = "count2　　".$data['count2']."\n"."<br>".PHP_EOL;
   $real_array= array(
      $sensor_id,$point,$timestamp,$count1,$count2,
   );

   //Output
   echo implode('',$real_array);
}

?>