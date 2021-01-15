<?php
//Input
$input_str = file_get_contents('php://input');
$input_str = mb_convert_encoding($input_str, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');

//Get array
$arr = json_decode($input_str,true);

//Access to each data
foreach($arr as $data){
    //Get each data
    $sensor_id= "sensor_id　".$data['sensor_id']."\n"."<br>".PHP_EOL;
    $point= "point　　".$data['point']."\n"."<br>".PHP_EOL;
    $timestamp= "timestamp　　　".$data['timestamp']."\n"."<br>".PHP_EOL;
    $count1= "count1　　".$data['count1']."\n"."<br>".PHP_EOL;
    $count2= "count2　　".$data['count2']."\n"."<br>".PHP_EOL;
   $real_array= array(
      $sensor_id,$point,$timestamp,$count1,$count2,
   );

   //Output
   echo implode('',$real_array);
}

?>