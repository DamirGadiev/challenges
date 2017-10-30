<?php

/**
 * @file
 * Factorial calculations examples.
 *
 */

/**
 * Iteration: Iterate in for loop.
 */
function factorialIteration($num) {
    $fact = $num;
    for ($i = $num - 1; $i > 0; $i--) {
        if ($i !== 1) {
            $fact = $i * $fact;
        }
    }
    return $fact;
}

/**
 * Recursion: Simple recursion calculation.
 */
function factorialRecursion($num) {
    if ($num < 2) {
        return 1;
    }
    else {
        return ($num * factorialRecursion($num - 1));
    }
}

/**
 * Recursion: Tail optimization.
 */
function factorialRecursionTail($num, $total = 1) {
    if ($num < 2) {
        return $total;
    }
    else {
        return factorialRecursionTail($num - 1, $total * $num);
    }
}

// =================== Run ==================== //

$number = 5;
echo "\nNumber: $number\n";
$start = microtime(TRUE);
$fact = factorialIteration($number);
$end = microtime(TRUE) - $start;
echo "Factorial Iteration result: $fact. Time: $end.\n";

$start = microtime(TRUE);
$fact = factorialRecursion($number);
$end = microtime(TRUE) - $start;
echo "Factorial Recursion result: $fact. Time: $end.\n";

$start = microtime(TRUE);
$fact = factorialRecursionTail($number);
$end = microtime(TRUE) - $start;
echo "Factorial Recursion tail-end optimization result: $fact. Time: $end.\n";
