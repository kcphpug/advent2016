<?php

namespace Advent2016\Day1;

class Puzzle1
{

    public function getBlocksAway($input)
    {
        $directions = ['N', 'E', 'S', 'W'];

        $currentDir = 0;
        $coordinatesNorth = 0;
        $coordinatesEast = 0;

        foreach (explode(', ', $input) as $coordinate) {
            $dir = substr($coordinate, 0, 1);
            $length = intval(substr($coordinate, 1));

            if ($dir == 'R') {
                $currentDir++;
                $currentDir = $currentDir % 4;
            } else {
                if ($currentDir == 0)
                    $currentDir = 3;
                else
                    $currentDir--;
            }

            switch ($directions[$currentDir]) {
                case 'N':
                    $coordinatesNorth += $length;
                    break;
                case 'E':
                    $coordinatesEast += $length;
                    break;
                case 'S':
                    $coordinatesNorth -= $length;
                    break;
                case 'W':
                    $coordinatesEast -= $length;
                    break;
            }
        }

        return abs($coordinatesNorth) + abs($coordinatesEast);
    }
}
