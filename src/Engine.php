<?php

namespace Brain\general;

use function cli\line;

function engine(string $question, string $correctAnswer): bool
{
    if ($question === $correctAnswer) {
        line('Correct!');
        return true;
    } else {
        line("'$question' is wrong answer ;(. Correct answer was '$correctAnswer'.");
        return false;
    }
}
