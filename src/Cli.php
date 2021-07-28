<?php

namespace Brain;

use function cli\line;
use function cli\prompt;

function start_game(): string
{
    line('Welcome to the Brain Game!');
    $name = get_name();
    line("Hello, %s!", $name);
    return $name;
}

function get_name(): string
{
    return prompt('May I have your name?');
}

function generate_random(int $to = 1000): int
{
    return random_int(0, $to);
}
