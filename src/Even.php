<?php
namespace Braingames\even;

use function cli\line;
use function cli\prompt;

$autoloadPath1 = __DIR__ .  '/../../../autoload.php';
$autoloadPath2 = __DIR__ . '/../vendor/autoload.php';
if (file_exists($autoloadPath1)) {
    require_once $autoloadPath1;
} else {
    require_once $autoloadPath2;
}
function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function gameEven()
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');
    $count = 0;
    while ($count < 3) {
        $randomNumber = rand(1, 100);
        line("Question: $randomNumber");
        $answer = prompt('Your answer: ');
        if (iseven($randomNumber) === true) {
            if ($answer === 'yes') {
                $count = $count + 1;
                line('Correct!');
            } else {
                line("'$answer' is wrong answer ;(. Correct answer was 'yes'.");
                line("Let's try again, %s!", $name);
                return;
            }
        }
        if (iseven($randomNumber) === false) {
            if ($answer === 'no') {
                $count++;
                line('Correct!');
            } else {
                line("'$answer' is wrong answer ;(. Correct answer was 'no'.");
                line("Let's try again, %s!", $name);
                return;
            }
        }
    }
    line("Congratulations, %s!", $name);
}