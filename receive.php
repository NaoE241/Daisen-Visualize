<?php

//Input
$input_str = file_get_contents('php://input');
$input_str = mb_convert_encoding($input_str, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');

//Get array
$arr = json_decode($input_str,true);

//Get each data
$sensor_id = $arr['sensor_id'];
$point     = $arr['point'];
$timestamp = $arr['timestamp'];
$count1    = $arr['count1'];
$count2    = $arr['count2'];

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
 
 //Insert new JSON data
 //jsontable has (sensor_id, point, timestamp, count1, count2) columns
 $sql = "INSERT INTO jsontable (sensor_id, point, timestamp, count1, count2) VALUES (:sensor_id, :point, :timestamp, :count1, :count2)";
 $stmt = $db->prepare($sql);
 $params = array(':sensor_id' => $sensor_id, ':point' => $point, ':timestamp' => $timestamp, ':count1' => $count1, ':count2' => $count2);
 
 //Activate Insert
 $stmt->execute($params);

?>