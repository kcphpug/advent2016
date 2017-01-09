<?php

namespace Advent2016\Tests;

use Advent2016\Day1;

class Day1Test extends \PHPUnit_Framework_TestCase
{
    public function testCanCreate()
    {
        $this->assertInstanceOf('\\Advent2016\\Day1', new Day1());
    }

    public function testFirstPart()
    {
        $input = 'R2, L3';

        $puzzle = new Day1();

        $this->assertSame(5, $puzzle->getBlocksAway($input));
    }

    public function testSecondPart()
    {
        $input = 'R2, R2, R2';

        $puzzle = new Day1();

        $this->assertSame(2, $puzzle->getBlocksAway($input));
    }

    public function testThirdPart()
    {
        $input = 'R5, L5, R5, R3';

        $puzzle = new Day1();

        $this->assertSame(12, $puzzle->getBlocksAway($input));
    }
}
