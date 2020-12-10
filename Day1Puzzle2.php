<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$str = preg_replace('#\s+#',',',trim(file_get_contents('input.txt')));

$input_array = explode(',', $str);

for($i = 0; $i < count($input_array); $i++){
    foreach($input_array as $input){
        foreach($input_array as $input2){
            if($input_array[$i] + $input + $input2 == 2020){
                $answer = $input_array[$i] * $input * $input2;
                echo "GEVONDEN! " . $input_array[$i] . " + " . $input . " + " . $input2 . " = 2020; multiplied = " . $answer . "<br>";
            }
        }
    }
}