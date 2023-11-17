<?php

namespace BrainGames\Games\gcd;

require_once(__DIR__ . '/../engine.php');

use function BrainGames\engine\compareAnswer;
use function BrainGames\engine\engineGame;

function generate()
{
    $num1 = rand(1, 100);
    $num2 = rand(1, 100);
    return [$num1, $num2];
}
function calculate(array $array)
{
    $num1 = (int) $array[0];
    $num2 = (int) $array[1];
    for ($i = min($num1, $num2); $i >= 1; $i--) {
        if (is_int($num1 / $i) and is_int($num2 / $i)) {
            return $i;
        }
    }
}
function collect()
{
    $examples = [];
    for ($i = 0; $i < 3; $i++) {
        $examples[$i][0] = generate();
        $examples[$i][1] = implode(' ', $examples[$i][0]);
        $examples[$i][2] = (string) calculate($examples[$i][0]);
    }
    return $examples;
}
function calc()
{
    $examples = collect();
    $question = 'Find the greatest common divisor of given numbers.';
    engineGame($question, $examples);
}