<?php

namespace BrainGames\Games\prime;

require_once(__DIR__ . '/../engine.php');

use function BrainGames\engine\compareAnswer;
use function BrainGames\engine\engineGame;

function is_prime(int $num)
{
    if ($num === 1) {
        return false;
    }
    $count = 0;
    for ($i = 2; $i < $num; $i++) {
        if ($num % $i === 0) {
            $count++;
        }
    }
    if ($count > 0) {
        return false;
    } else {
        return true;
    }
}
function generate()
{
    $num = rand(1, 20);
    return $num;
}
function calculate(int $num)
{
    if (is_prime($num)) {
        return 'yes';
    } else {
        return 'no';
    }
}
function collect()
{
    $examples = [];
    for ($i = 0; $i < 3; $i++) {
        $examples[$i][0] = generate();
        $examples[$i][1] = (string) $examples[$i][0];
        $examples[$i][2] = (string) calculate($examples[$i][0]);
    }
    return $examples;
}
function calc()
{
    $examples = collect();
    $question = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    engineGame($question, $examples);
}