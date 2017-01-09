<?php

namespace Advent2016;

class Day2
{
    /**
     * Defines keypad numbers and their coordinates.
     * @var array
     */
    static $keypad = [
        1 => [-1,1],
        2 => [0,1],
        3 => [1,1],
        4 => [-1,0],
        5 => [0,0],
        6 => [1,0],
        7 => [-1,-1],
        8 => [0,-1],
        9 => [1,-1],
    ];

    /**
     * Convert U/L/R/D's into [X,Y] steps to get there.
     *
     * @param string $input ULRD's
     * @return array(X,Y)[]
     */
    public function getNavigation($input)
    {
        $instructions = str_split($input);

        $navigation = [];
        foreach ($instructions as $i) {
            switch ($i) {
                case 'U':
                    $navigation[] = [0,1];
                    break;
                case 'L':
                    $navigation[] = [-1,0];
                    break;
                case 'R':
                    $navigation[] = [1,0];
                    break;
                case 'D':
                    $navigation[] = [0,-1];
                    break;
            }
        }

        return $navigation;
    }

    /**
     * Given list of +/- [X,Y] coordinates, and a starting coordinate, derive a
     * list of visited [X,Y] coordinates. Output includes origin.
     *
     * Input: [ [0,1], [0,1], [1,0], [1,0], [-1,0] ]
     * Output: [ [0,0], [0,1], [0,2], [1,2], [2,2], [1,2] ]
     *
     * @param array $navigation
     * @param array(X,Y) $origin X,Y coordinate to start from
     * @return array(X,Y)[]
     */
    public function compactHistory(array $navigation, array $origin)
    {
        $history = [
            $origin,
        ];

        $visited = array_reduce($navigation, function (array $allHistory, array $step) {
            list($x, $y) = $step;
            $last = end($allHistory);

            $newX = $last[0] + $x;
            $newY = $last[1] + $y;

            // Only include if movement within bounds of keypad [-1,0,1] by [-1,0,1]
            // MIN/MAX of keypad are currently hardcoded
            if (abs($newX) < 2 && abs($newY) < 2) {
                $allHistory[] = [$newX, $newY];
            }

            return $allHistory;
        }, $history);

        return $visited;
    }

    /**
     * Given list of visited X,Y coordinates within the keypad, return the
     * X,Y coordinates of the last visited coordinate.
     *
     * @param array(X,Y)[] $filteredHistory
     * @return array(X,Y) Coordinate of keypad where last visited
     */
    public function getLastKeypadCoordinate(array $filteredHistory)
    {
        return array_pop($filteredHistory);
    }

    /**
     * Given an X,Y coordinate, find the cooresponding keypad number.
     *
     * @param array(X,Y) $coordinate
     * @return int
     */
    public function getKeypadNumber(array $coordinate)
    {
        return array_search($coordinate, self::$keypad);
    }

    /**
     * Given a keypad number, find its [X,Y] coordinate.
     *
     * @param int $number
     * @return int
     */
    public function getKeypadCoordinate($number)
    {
        return self::$keypad[$number];
    }

    /**
     * Given list of Up-Right-Down-Left directions, find the resulting keypad.
     * Optionally accepts an origin [X,Y] coordinate to start navigating from.
     *
     * @param string[]   $sequence URDL's
     * @param array(X,Y) $origin
     * @return int
     */
    public function getNumberBySequence($sequence, array $origin = [0,0])
    {
        $navigation = $this->getNavigation($sequence);
        $history = $this->compactHistory($navigation, $origin);
        $coordinate = $this->getLastKeypadCoordinate($history);

        return $this->getKeypadNumber($coordinate);
    }
}
