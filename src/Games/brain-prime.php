<?php

namespace Brain\Prime;

use function Brain\Games\Cli\welcome;
use function Brain\general\engine;
use function cli\line;
use function cli\prompt;

const COUNT = 3;

function prostoe(int $num): bool
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

function danet($num): string
{
    $text = prostoe($num) ? 'yes' : 'no';
    return $text;
}

function game(): void
{
    $name = welcome();
    $result = '';
    line('Answer "yes" if given number is prime. Otherwise answer "no".');
    for ($i = 0; $i < COUNT; $i++) {
        $num = rand(7, 21);
        line("Question: $num");
        $question = prompt("Your answer");
        $correctAnswer = danet($num);
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
