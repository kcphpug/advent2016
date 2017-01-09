# Kansas City PHP User Group - Advent of Code 2016

[Advent of Code](http://adventofcode.com/) is a holiday-themed coding
challenge where a new coding problem is posted daily. Solve the problem
with any technique or language you want.

The KC PHP User Group attempted Day 1 and Day 2 as a group. The solution was
written in PHP and uses PHPUnit for tests.

See `instructions` directory for each day's instructions and input. Sign up on
<http://adventofcode.com> to continue working the problems.

## Installation

1. This project manages its dependencies with [Composer](http://getcomposer.org/).
Start by installing Composer following instructions here:
<https://getcomposer.org/download/>

2. Install dependencies

        php composer.phar install

## Running puzzle solvers

        php day1-1.php
        php day1-2.php
        php day2-1.php

## Running tests

To run the PHPUnit test suite:

1. Optionally copy and configure `phpunit.xml.dist` for your project's
environment:

        cp phpunit.xml.dist phpunit.xml
        vi phpunit.xml

2. Run the test suite:

        ./vendor/bin/phpunit

3. Run test suite for individual days:

        vendor/bin/phpunit --filter=Day1
