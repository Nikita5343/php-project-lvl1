<?php

namespace BrainGames\Games\calc;

require_once (__DIR__ . "/../engine.php");

use function BrainGames\engine\compareAnswer;
use function BrainGames\engine\engineGame;

function generate()
{
    $num1 = rand(0, 100);
    $num2 = rand(0, 100);
    $operation = ["*", "+", "-"];
    return [$num1, $operation[rand(0, 2)], $num2];
}

function calculate(array $array)
{
    $num1 = (int) $array[0];
    $num2 = (int) $array[2];
    if ($array[1] === "*") {
        return $num1 * $num2;
    } elseif ($array[1] === "-") {
        return $num1 - $num2;
    } elseif ($array[1] === "+") {
        return $num1 + $num2;
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
    $question = 'What is the result of the expression?';
    engineGame($question, $examples);
}