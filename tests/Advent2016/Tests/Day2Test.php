<?php

namespace Advent2016\Tests;

use Advent2016\Day2;

class Day2Test extends \PHPUnit_Framework_TestCase
{
    public function testCanCreate()
    {
        $this->assertInstanceOf('\\Advent2016\\Day2', new Day2());
    }

    public function testGetNavigation()
    {
        $input = 'ULL';

        $puzzle = new Day2();

        $expected = [
            [0, 1],
            [-1, 0],
            [-1, 0],
        ];
        $this->assertSame($expected, $puzzle->getNavigation($input));
    }

    public function testCompactHistory()
    {
        $navigation = [
            [1,0], // R
            [1,0], // R
            [0,-1], // D
            [0,-1], // D
            [0,-1], // D
        ];
        $origin = [0,0];

        $puzzle = new Day2();

        $expected = [
            [0, 0],
            [1, 0],
            [1, -1],
        ];
        $this->assertSame($expected, $puzzle->compactHistory($navigation, $origin));
    }

    public function testGetKeypadPosition()
    {
        $visited = [
            [0,0],
            [1,0],
            [1,-1], // Last visited [X,Y]
        ];
        $puzzle = new Day2();

        $expected = [1,-1];
        $this->assertSame($expected, $puzzle->getLastKeypadCoordinate($visited));
    }

    public function testGetLastKeypadCoordinate()
    {
        $visited = [
            [0,0],
            [1,0],
            [1,-1], // Last visited [X,Y]
        ];
        $puzzle = new Day2();

        $expected = [1,-1];
        $this->assertSame($expected, $puzzle->getLastKeypadCoordinate($visited));
    }

    public function testGetKeypadNumber()
    {
        $puzzle = new Day2();

        $this->assertSame(9, $puzzle->getKeypadNumber([1,-1]));
        $this->assertSame(5, $puzzle->getKeypadNumber([0,0]));
    }

    public function testGetKeypadCoordinate()
    {
        $puzzle = new Day2();

        $this->assertSame([1,-1], $puzzle->getKeypadCoordinate(9));
        $this->assertSame([-1,1], $puzzle->getKeypadCoordinate(1));
    }

    public function testGetNumberBySequence()
    {
        $puzzle = new Day2();

        // By sequence
        $this->assertSame(1, $puzzle->getNumberBySequence('ULL'));
        $this->assertSame(9, $puzzle->getNumberBySequence('RRDDD'));
        $this->assertSame(4, $puzzle->getNumberBySequence('LURDL'));
        $this->assertSame(5, $puzzle->getNumberBySequence('UUUUD'));

        // From previous origin
        $this->assertSame(1, $puzzle->getNumberBySequence('ULL'));
        $this->assertSame(9, $puzzle->getNumberBySequence('RRDDD', [-1,1]));
        $this->assertSame(8, $puzzle->getNumberBySequence('LURDL', [1,-1]));
        $this->assertSame(5, $puzzle->getNumberBySequence('UUUUD', [0,-1]));
    }
}
