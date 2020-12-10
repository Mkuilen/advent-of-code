<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$file = file_get_contents('input/Day2.txt');

$inputArray = explode(PHP_EOL, $file);

$replacedInputArray = preg_replace('#\s+#', ',', $inputArray);

$finalArray = array();

foreach ($replacedInputArray as $key => $value) {
    $exploded_value = explode(',', $value);
    $finalArray[$key] = array_filter($exploded_value);
}

$valid = 0;

foreach($finalArray as $value){
    $escaped_value = preg_replace('/(:)/', '', $value[1]);
    //0 = min, 1 = max
    $range = preg_split('/(-)/', $value[0]);
    $pattern = "[{$escaped_value}]";
    if(preg_match($pattern, $value[2])){
        $match_count = preg_match_all($pattern, $value[2]);
        if($match_count >= $range[0] && $match_count <= $range[1]){
            $valid++;
        }
    }
}

echo "Total valid passwords: " . $valid;