<?php
/**
 * Usage:
 *
 *      $ php day2-1.php
 *
 * Output:
 *
 *      Passcode: 78985
 */
require __DIR__ . '/src/autoload.php';

$puzzle = new \Advent2016\Day2();

$lines = explode("\n", file_get_contents(__DIR__ . '/instructions/Day2Input.txt'));

$origin = [0,0];
$code = [];
foreach ($lines as $line) {
    $navigation = $puzzle->getNavigation($line);
    $history = $puzzle->compactHistory($navigation, $origin);
    $last = $puzzle->getLastKeypadCoordinate($history);

    $code[] = $puzzle->getKeypadNumber($last);

    $origin = $last; // Next sequence must start from last number coordinate
}

echo sprintf("Passcode: %s\n", implode('', $code));
