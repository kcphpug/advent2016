<?php

namespace Advent2016;

class Day1
{
    public function getBlocksAway($input)
    {
        // This function written as a group, mostly inspired by Garrett Rathbone's solution
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

    public function part2($input)
    {
        $RsLs = array_map(function ($full) {
            return [substr($full, 0, 1), substr($full, 1)];
        }, explode(', ', $input));
        // output ['R', 100]

        // input ['R', 100]
        $cardinalWithSteps = [];
        $curr = 'N';
        foreach ($RsLs as $turnWithStep) {
            list($turn, $steps) = $turnWithStep;
            $curr = $this->findNextDirection($curr, $turn);

            $cardinalWithSteps[] = [$curr, $steps];
        }
        // output ['N', 100]

        // This is where Part 1 and Part 2 behavior branches

        // This solves part 2
        // Convert ['N',100] --> [[0, 1], ...]
        // Convert ['E',100] --> [[1, 0], ...]
        // Convert ['S',100] --> [[0, -1], ...]
        // Convert ['W',100] --> [[-1, 0], ...]
        $steps = array_map(function (array $cardinalWithStep) {
            list($direction, $steps) = $cardinalWithStep;

            if ('N' === $direction) return array_fill(0, $steps, [0, 1]);
            if ('S' === $direction) return array_fill(0, $steps, [0, -1]);
            if ('E' === $direction) return array_fill(0, $steps, [1, 0]);
            if ('W' === $direction) return array_fill(0, $steps, [-1, 0]);
        }, $cardinalWithSteps);

        // Flatten arrays
        $allSteps = array_reduce($steps, function (array $acc, array $stepsPerInput) {
            return array_merge($acc, array_values($stepsPerInput));
        }, []);

        $history = [
            [0,0], // Grid starts at 0,0 facing North
        ];
        $visited = array_reduce($allSteps, function (array $allHistory, array $step) {
            list($x, $y) = $step;
            $last = end($allHistory);

            $allHistory[] = [$last[0]+$x, $last[1]+$y];

            return $allHistory;
        }, $history);

        return $visited;
    }

    private function findNextDirection($curr, $turn)
    {
        $directions = ['N', 'E', 'S', 'W'];
        $index = array_keys($directions, $curr);
        if (empty($index)) {
            throw new \InvalidArgumentException(sprintf('Cannot find value %s in array %s', $curr, implode(',',$directions)));
        }

        // array_keys returns array of found keys
        list($index) = $index;

        // Increment index according to turn
        if ($turn === 'R') {
            $index++;
        } else if ($turn === 'L') {
            $index--;
        }

        // Wrap around array indexing
        if ($index < 0) {
            $index = count($directions)-1;
        }
        if ($index > count($directions)-1) {
            $index = 0;
        }

        return $directions[$index];
    }
}
