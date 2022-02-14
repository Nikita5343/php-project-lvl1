<?php

namespace Brain\Progression;

use function Brain\general\engine;
use function Brain\Games\welcome;
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
    line("Какое число пропущено в прогрессии?");
    for ($i = 0; $i < COUNT; $i++) {
        $randprogress = rand(2, 7);
        $progress = range(1, 100, $randprogress);
        $randsecret = rand(0, count($progress));
        $secret = $progress[$randsecret];
        $progress[$randsecret] = "..secret";
        $implode = implode(" ", $progress);
        $question = prompt("$implode");
        $engine = engine($question, $secret);
        if ($engine) {
            $result = "Правильно! Поздравляем вас $name , Вы прошли игру)";
        } else {
            $result = "Давайте попробуем ещё раз, $name";
            break;
        }
    }
    line($result);
}
