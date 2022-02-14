<?php

namespace Brain\general;

use function cli\line;

function engine(string $question, string $correctAnswer): bool
{
    if ($question === $correctAnswer) {
        line('Правильно!');
        return true;
    } else {
        line(" '$question' Неправильный ответ, правильный ответ => $correctAnswer");
        return false;
    }
}
