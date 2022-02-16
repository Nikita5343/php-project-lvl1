<?php

namespace Brain\Games\Cli;

use function Cli\line;
use function Cli\prompt;

function welcome()
{
    line("Welcome to the Brain Games!");
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    return $name;
}
