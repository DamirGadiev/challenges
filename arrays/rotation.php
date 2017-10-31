<?php

/**
 * @file
 * Rotation of arrays left.
 * Conditions:
 * 1 < $steps < count($input)
 */

/**
 * Rotation using temporary array.
 */
function leftRotationTempArray($input, $steps) {
    $start = array_slice($input, 0, $steps);
    $end = array_slice($input, $steps);
    return array_merge($end, $start);
}

/**
 * Iterative rotation.
 */
function leftRotationIterations($input, $steps) {
    $length = count($input);
    for ($i = 0; $i < $steps; $i++) {
        $temp = $input[0];
        for ($j = 0; $j < $length - 1; $j++) {
            $input[$j] = $input[$j+1];
        }
        $input[$j] = $temp;
    }
    return $input;
}


$input = [1, 2, 3, 4, 5];
$input_print = "[" . implode(", ", $input) . "]";
$steps = 2;
echo "\nInput: $input_print\n";
echo "Steps: $steps\n";
echo "=====================================================\n";
$start = microtime(TRUE);
$result = leftRotationTempArray($input, $steps);
$end = microtime(TRUE) - $start;
$output = "[" . implode(", ", $result) . "]";
echo "Left rotation using temporary arrays: $output. Time: $end sec.\n";

$start = microtime(TRUE);
$result = leftRotationIterations($input, $steps);
$end = microtime(TRUE) - $start;
$output = "[" . implode(", ", $result) . "]";
echo "Left rotation using iteration: $output. Time: $end sec.\n";
