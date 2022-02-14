<?php

namespace Brain\Games\Cli\Name;

use function cli\line;
use function cli\prompt;

function welcome(): string
{
    line('Добро пожаловать в интеллектуальную игру!');
    $name = prompt('Позвольте узнать ваше имя?');
    line("Здравствуйте %s!", $name);
    return $name;
}
