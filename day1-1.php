<?php
/**
 * Usage:
 *
 *      $ php day1-1.php
 *
 * Output:
 *
 *      The Easter Bunny HQ is 234 blocks away!
 */
require __DIR__ . '/src/autoload.php';

$puzzle = new \Advent2016\Day1();

$input = file_get_contents(__DIR__ . '/instructions/Day1-1Input.txt');

$blocks = $puzzle->getBlocksAway($input);

echo sprintf("The Easter Bunny HQ is %s blocks away!\n", $blocks);
