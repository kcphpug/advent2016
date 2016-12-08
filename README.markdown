# Kansas City PHP User Group - Advent of Code 2016

[Advent of Code](http://adventofcode.com/) is a holiday-themed coding
challenge where a new coding problem is posted daily. Solve the problem
with any technique or language you want.

The KC PHP User Group did Day 1, Problem 1 as a group. The solution was
written in PHP and uses PHPUnit for tests.

See `Puzzle1.md` for Puzzle 1, Part 1 and 2. Sign up on
<http://adventofcode.com> to continue working the problems.

## Installation

1. This project manages its dependencies with [Composer](http://getcomposer.org/).
Start by installing Composer following instructions here:
<https://getcomposer.org/download/>

2. Install dependencies

        php composer.phar install

## Running tests

To run the PHPUnit test suite:

1. Optionally copy and configure `phpunit.xml.dist` for your project's
environment:

        cp phpunit.xml.dist phpunit.xml
        vi phpunit.xml

2. Run the test suite:

        ./vendor/bin/phpunit
