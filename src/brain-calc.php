<?php

namespace Brain\Calc;

use function Brain\general\engine;
use function Brain\Games\welcome;
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
    line("Что является результатом выражения?");
    for ($i = 0; $i < COUNT; $i++) {
        if ($i === 0) {
            $rand1 = rand(0, 50);
            $rand2 = rand(0, 50);
            $question = prompt("Question: $rand1 + $rand2");
            $summa = $rand1 + $rand2;
            $correctAnswer = $summa;
            $engine = engine($question, $correctAnswer);
            if ($engine) {
                $result = "Правильно! Поздравляем вас $name , Вы прошли игру";
            } else {
                $result = "Давай попробуем еще раз, $name";
                    break;
            }
        }
        if ($i === 1) {
            $rand1 = rand(50, 100);
            $rand2 = rand(0, 50);
            $question = prompt("Question: $rand1 - $rand2");
            $summa = $rand1 - $rand2;
            $correctAnswer = $summa;
            $engine = engine($question, $correctAnswer);
            if ($engine) {
                $result = "Правильно! Поздравляем вас $name , Вы прошли игру";
            } else {
                $result = "Давай попробуем еще раз, $name";
                break;
            }
        }
        if ($i === 2) {
            $rand1 = rand(1, 10);
            $rand2 = rand(1, 10);
            $question = prompt("Question: $rand1 * $rand2");
            $summa = $rand1 * $rand2;
            $correctAnswer = $summa;
            $engine = engine($question, $correctAnswer);
            if ($engine) {
                $result = "Правильно! Поздравляем вас $name , Вы прошли игру";
            } else {
                $result = "Давай попробуем еще раз, $name";
                break;
            }
        }
    }
    line($result);
}
