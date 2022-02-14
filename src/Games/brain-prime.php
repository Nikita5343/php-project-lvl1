<?php

namespace Brain\Prime;

use function Brain\Games\welcome;
use function Brain\general\engine;
use function cli\line;
use function cli\prompt;

const COUNT = 3;

function prostoe($num): bool
{
    if ($num < 2) {
        return false;
    }
    for ($i = 2; $i <= $num / 2; $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }
    return true;
}

function danet($num)
{
    $text = prostoe($num) ? 'да' : 'нет';
    return $text;
}

function game(): void
{
    $name = welcome();
    $result = '';
    line("Ответьте «да», если данное число простое. В противном случае ответьте «нет».");
    for ($i = 0; $i < COUNT; $i++) {
        $num = rand(7, 21);
        $question = prompt("$num");
        $correctAnswer = danet($num);
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
