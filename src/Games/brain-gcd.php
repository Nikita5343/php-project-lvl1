<?php

namespace Brain\Games\GCD;

use function Brain\Games\welcome;
use function Brain\general\engine;
use function cli\line;
use function cli\prompt;

const COUNT = 3;

/*function gcd($summa, $rand1, $rand2)
{
    if ($summa) {
      return  gmp_gcd($rand1, $rand2);
    }
}
*/

function game()
{
    $result = '';
    $name = welcome();
    line("Найдите наибольший общий делитель данных чисел.");
    for ($i = 0; $i < COUNT; $i++) {
        $rand1 = rand(1, 50);
        $rand2 = rand(50, 200);
        $question = prompt("$rand1 $rand2");
        $correctAnswer = gmp_gcd($rand1, $rand2);
        $engine = engine($question, $correctAnswer);
        if ($engine) {
            $result = "Правильно! Поздравляем вас $name , Вы прошли игру)";
        } else {
            $result = "Давайте попробуем ещё раз, $name";
            break;
        }
    }
    line($result);
}
