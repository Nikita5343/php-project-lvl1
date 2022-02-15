<?php

namespace Brain\Even;

use function Brain\general\engine;
use function Brain\Games\Cli\welcome;
use function cli\line;
use function cli\prompt;

const COUNT = 3;

function isEven($randnumber)
{
    if ($randnumber % 2 === 0) {
        return 'yes';
    } else {
        return 'no';
    }
}

function game()
{
    $result = '';
    $name = welcome();
    line('Answer "yes" if the number is even, otherwise answer "no".');
    for ($i = 0; $i < COUNT; $i++) {
        $randnumber = rand(1, 100);
        $question = prompt("Question $randnumber");
        $correctAnswer = isEven($randnumber);
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
