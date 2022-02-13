<?php

namespace Brain\Games\Cli;

use function Cli\line;
use function Cli\prompt;

function welcome()
{
    line('Добро пожаловать в интеллектуальную игру!');
    $name = prompt('Можно узнать ваше имя?');
    line("Здравствуйте %s!", $name);
}
