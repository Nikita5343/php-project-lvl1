<?php

namespace Brain\Progression;

use function brain\General\engine;
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
    line("What number is missing in the progression?");
    for ($i = 0; $i < COUNT; $i++) {
        $randprogress = rand(1, 4);
        $progress = range(1, 50, $randprogress);
        $randsecret = rand(0, count($progress));
        $secret = $progress[$randsecret];
        $progress[$randsecret] = "..";
        $implode = implode(" ", $progress);
        line("Question: $implode");
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
