<?php

/**
 * @file
 * This file contains Fibonacci sequence implementations.
 */

 /**
  * Iterative solution.
  */
function fibonacciIterative($order) {
    $output = [];
    if ($order < 0) {
        return NULL;
    }
    if ($order === 0) {
        $output = array(0);
    }
    elseif ($order === 1) {
        $output = array(0, 1);
    }
    else {
        $output = array(0, 1);
        for ($i = 2; $i < $order; $i++) {
            array_push($output, $output[$i - 1] + $output[$i - 2]);
        }
    }
    return $output;
}

/**
 * Recursive solution.
 */
function fibonacciRecursive($order, $output = array()) {
    // @TODO add static caching.
    if ($order < 0) {
        return NULL;
    }
    if ($order == 0) {
        return [0];
    }
    elseif ($order == 1) {
        return [0, 1];
    }
    else {
        if (!isset($output[0]) || $output[0] != 0) {
            $output[0] = 0;
        }
        if (!isset($output[1]) || $output[1] != 1) {
            $output[1] = 1;
        }
        $count = count($output);
        $output[] = $output[$count-1] + $output[$count-2];
        if ($order > count($output)) {
            return fibonacciRecursive($order, $output);
        }
    }

    return $output;
}

/**
 * Rounding solution.
 * @see https://en.wikipedia.org/wiki/Fibonacci_number#Computation_by_rounding.
 */
function fibonacciRounding($order) {
    $output = [];
    for ($i = 1; $i <= $order; $i++) {
        $num = round(((5 ** .5 + 1) / 2) ** $i / 5 ** .5);
        array_push($output, $num);
    }
    return $output;
}

$order = 5;
echo "\nOrder: $order\n";
echo "===========================\n";
$start = microtime(TRUE);
$sequence = fibonacciIterative($order);
$end = microtime(TRUE) - $start;
$result = implode(" ", $sequence);
echo "Fibonacci Sequence iteration result: $result. Time: $end sec.\n";

$start = microtime(TRUE);
$sequence = fibonacciRecursive($order);
$end = microtime(TRUE) - $start;
$result = implode(" ", $sequence);
echo "Fibonacci Sequence recursive result: $result. Time: $end sec.\n";

$start = microtime(TRUE);
$sequence = fibonacciRounding($order);
$end = microtime(TRUE) - $start;
$result = implode(" ", $sequence);
echo "Fibonacci Sequence rounding result: $result. Time: $end sec.\n";
