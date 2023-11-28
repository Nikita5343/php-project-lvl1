<?php

namespace BrainGames\Games\progression;

require_once(__DIR__ . '/../engine.php');

use function BrainGames\engine\compareAnswer;
use function BrainGames\engine\engineGame;

function generate()
{
    $list = [];
    $a1 = rand(0, 20);
    $dif = rand(1, 10);
    $n = rand(5, 10);
    for ($i = 0; $i <= $n; $i++) {
        $list[] = $a1;
        $a1 += $dif;
    }
    return $list;
}
function calculate(array $array)
{
    $list = [];
    $list[0] = $array;
    $len = count($array);
    $n = rand(0, $len - 1);
    $a = (string) $array[$n];
    $array[$n] = '..';
    $list[1] = implode(' ', $array);
    $list[2] = $a;
    return $list;
}
function collect()
{
    $examples = [];
    for ($i = 0; $i < 3; $i++) {
        $examples[$i] = calculate(generate());
    }
    return $examples;
}
function calc()
{
    $examples = collect();
    $question = 'What number is missing in the progression?';
    engineGame($question, $examples);
}