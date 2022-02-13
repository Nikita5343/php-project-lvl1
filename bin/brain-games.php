#!/usr/bin/env php
<?php

use function Brain\Games\Cli\welcome;

$part1 = __DIR__ . '/../vendor/autoload.php';
$part2 = __DIR__ . '/../../../autoload.php';

if (file_exists($part1)) {
    require_once $part1;
} else {
    require_once $part2;
}
welcome();