<?php

namespace Brain\Games;

use function cli\line;
use function cli\prompt;

function start_game(): string
{
    line('Welcome to the Brain Game!');
    $name = get_name();
    say($name, "Hello, %s!");
    return $name;
}

function greeting()
{
    line('Welcome to the Brain Game!');
}

function get_name(): string
{
    return prompt('May I have your name?');
}

function say(string $name, string $msg): void
{
    line($msg, $name);
}
