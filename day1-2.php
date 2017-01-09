<?php
/**
 * Usage:
 *
 *      $ php day1-2.php
 *
 * Output:
 *
 *      Easter Bunny HQ: [16,-97]
 */
require __DIR__ . '/src/autoload.php';

$puzzle = new \Advent2016\Day1();

$input = file_get_contents(__DIR__ . '/instructions/Day1-1Input.txt');

$history = $puzzle->part2($input);

$found = false;
do {
    $search = $history[0];
    $history = array_slice($history, 1);
} while (false === in_array($search, $history));

echo sprintf("Easter Bunny HQ: [%s,%s]\n", $search[0], $search[1]);
