<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$str = preg_replace('#\s+#',',',trim(file_get_contents('input.txt')));

$input_array = explode(',', $str);

for($i = 0; $i < count($input_array); $i++){
    foreach($input_array as $input){
//        echo $input_array[$i] . " + ". $input . " = " . ((int)$input_array[$i] + (int)$input) . '<br>';
        if($input_array[$i] + $input == 2020){
            $answer = $input_array[$i] * $input;
            echo "GEVONDEN! " . $input_array[$i] . " + " . $input . " = 2020; multiplied = " . $answer . "<br>";
        }
    }
}