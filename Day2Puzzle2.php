<?php

$file = file_get_contents('input/Day2.txt');

$inputArray = explode(PHP_EOL, $file);

$replacedInputArray = preg_replace('#\s+#', ',', $inputArray);

$finalArray = array();

foreach ($replacedInputArray as $key => $value) {
    $exploded_value = explode(',', $value);
    $finalArray[$key] = array_filter($exploded_value);
}

$valid = 0;
foreach ($finalArray as $value) {
    $needle = preg_replace('/(:)/', '', $value[1]);
    $position = preg_split('/(-)/', $value[0]);
    $charArray = str_split($value[2]);
    $keyArray = array();
    $i = 0;
    foreach ($charArray as $key => $item) {
        if ($item == $needle) {
            $keyArray[$i] .= $key;
            $i++;
        }
    }
    foreach ($keyArray as $item) {
        $test1 = $item == ($position[0] - 1);
        $test2 = $item == ($position[1] - 1);
        if ($test1 xor $test2) {
            echo "valid<br>";
            $valid++;
            break;
        }
    }
}

echo "Total valid passwords: " . $valid;