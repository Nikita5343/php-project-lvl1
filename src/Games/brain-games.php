<?php

namespace Brain\Games;

use function cli\line;
use function cli\prompt;

function welcome(): string
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?');
    line("Hello %s!", $name);
    return $name;
}
