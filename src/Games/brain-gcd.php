<?php

namespace Brain\Games\GCD;

use function Brain\Games\Cli\welcome;
use function Brain\general\engine;
use function cli\line;
use function cli\prompt;

const COUNT = 3;

function gcd($rand1, $rand2)
{
    for ($i = $rand1, $j = 0; $j < $i; $i--) {
        if ($rand2 % $i === 0 && $rand1 % $i === 0) {
            return $i;
        }
    }
}


function game()
{
    $result = '';
    $name = welcome();
    line("Find the greatest common divisor of given numbers.");
    for ($i = 0; $i < COUNT; $i++) {
        $rand1 = rand(1, 50);
        $rand2 = rand(50, 200);
        line("Question: $rand1 $rand2");
        $question = prompt("Your answer");
        $correctAnswer = gcd($rand1, $rand2);
        $engine = engine($question, $correctAnswer);
        if ($engine) {
            $result = "Congratulations, $name!";
        } else {
            $result = "Let's try again, $name!";
            break;
        }
    }
    line($result);
}
