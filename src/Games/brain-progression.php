<?php

namespace Brain\Progression;

use function Brain\general\engine;
use function Brain\Games\Cli\welcome;
use function cli\line;
use function cli\prompt;

const COUNT = 3;

/*function progress()
{
    if ()
}
*/

function game()
{
    $result = '';
    $name = welcome();
    line("What number is missing in this progression?");
    for ($i = 0; $i < COUNT; $i++) {
        $randprogress = rand(2, 5);
        $progress = range(1, 30, $randprogress);
        $randsecret = rand(0, count($progress));
        $secret = $progress[$randsecret];
        $progress[$randsecret] = "..";
        $implode = implode(" ", $progress);
        line("Question $implode");
        $question = prompt("Your answer");
        $engine = engine($question, $secret);
        if ($engine) {
            $result = "Congratulations, $name!";
        } else {
            $result = "Let's try again, $name!";
            break;
        }
    }
    line($result);
}
