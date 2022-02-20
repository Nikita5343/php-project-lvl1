<?php

namespace Brain\Calc;

use function Brain\general\engine;
use function Brain\Games\Cli\welcome;
use function cli\line;
use function cli\prompt;

const COUNT = 3;

/*function plus($summa, $rand1, $rand2)
{
    for ($i = 0; $i < COUNT; $i++) {
        if ($i === 0 && $summa === $rand1 + $rand2) {
            return $rand1 + $rand2;
        }
        if ($i = 1 && $summa === $rand1 * $rand2) {
            return $rand1 * $rand2;
        }
        if ($i = 2 && $summa === $rand1 - $rand2) {
            return $rand1 - $rand2;
        }
    }
}
*/

function game()
{
    $name = welcome();
    $result = '';
    line("What is the result of the expression?");
    for ($i = 0; $i < COUNT; $i++) {
        if ($i === 0) {
            $rand1 = rand(0, 50);
            $rand2 = rand(0, 50);
            line("Question: $rand1 + $rand2");
            $question = prompt("Your answer");
            $summa = $rand1 + $rand2;
            $correctAnswer = $summa;
            $engine = engine($question, (string) $correctAnswer);
            if ($engine) {
                $result = "Congratulations, $name!";
            } else {
                $result = "Let's try again, $name!";
                    break;
            }
        }
        if ($i === 1) {
            $rand1 = rand(50, 100);
            $rand2 = rand(0, 50);
            line("Question: $rand1 - $rand2");
            $question = prompt("Your answer");
            $summa = $rand1 - $rand2;
            $correctAnswer = $summa;
            $engine = engine($question, (string) $correctAnswer);
            if ($engine) {
                $result = "Congratulations, $name!";
            } else {
                $result = "Let's try again, $name!";
                break;
            }
        }
        if ($i === 2) {
            $rand1 = rand(1, 10);
            $rand2 = rand(1, 10);
            line("Question: $rand1 * $rand2");
            $question = prompt("Your answer");
            $summa = $rand1 * $rand2;
            $correctAnswer = $summa;
            $engine = engine($question, (string) $correctAnswer);
            if ($engine) {
                $result = "Congratulations, $name!";
            } else {
                $result = "Let's try again, $name!";
                break;
            }
        }
    }
    line($result);
}
