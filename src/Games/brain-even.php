<?php

namespace Brain\Even;

use function Brain\general\engine;
use function Brain\Games\welcome;
use function cli\line;
use function cli\prompt;

const COUNT = 3;

function isEven($randnumber)
{
    if ($randnumber % 2 === 0) {
        return 'да';
    } else {
        return 'нет';
    }
}

function game()
{
    $result = '';
    $name = welcome();
    line("Ответьте «да», если число четное, иначе ответьте «нет».");
    for ($i = 0; $i < COUNT; $i++) {
        $randnumber = rand(1, 100);
        $question = prompt("Ваш ответ: $randnumber");
        $correctAnswer = isEven($randnumber);
        $engine = engine($question, $correctAnswer);
        if ($engine) {
            $result = "Правильно! Поздравляем вас $name , Вы прошли игру)";
        } else {
            $result = "Давай попробуем еще раз, $name";
            break;
        }
    }
    line($result);
}
