<?php

/**
 * @file
 * Rotation of arrays left.
 * Conditions:
 * 1 < $steps < count($input)
 */

/**
 * Rotation using temporary array.
 * Slice array and swap parts.
 */
function leftRotationTempArray($input, $steps) {
    $start = array_slice($input, 0, $steps);
    $end = array_slice($input, $steps);
    return array_merge($end, $start);
}

/**
 * Iterative rotation.
 * Idea is in taking each element one by one and move it along the input.
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

/**
 * Helper function to reverse array.
 */
function _leftRotationReverseArray(&$input, $start, $end) {
    $temp = NULL;
    while ($start < $end) {
        $temp = $input[$start];
        $input[$start] = $input[$end];
        $input[$end] = $temp;
        $start++;
        $end--;
    }
}

/**
 * Reverse iteration rotation.
 * Idea is to divide array to sub-arrays and reverse each other and reverse all.
 * generic array_reverse could be used.
 */
function leftRotationReverseIterations($input, $steps) {
    $length = count($input);
    // Reverse first part.
    _leftRotationReverseArray($input, 0, $steps - 1);
    // Reverse second part.
    _leftRotationReverseArray($input, $steps, $length - 1);
    // Reverse whole array.
    _leftRotationReverseArray($input, 0, $length - 1);

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

$start = microtime(TRUE);
$result = leftRotationReverseIterations($input, $steps);
$end = microtime(TRUE) - $start;
$output = "[" . implode(", ", $result) . "]";
echo "Left rotation using reverse: $output. Time: $end sec.\n";
