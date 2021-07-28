<?php

namespace Brain\Games;

use function cli\line;
use function Brain\generate_random;

function odd_or_even(): callable
{
    return static function () {
        $greeting = 'Answer "yes" if the number is even, otherwise answer "no".';
        $number = generate_random(120);
        $question = "Question: $number";
        $correctAnswer = is_oven($number) ? 'yes' : 'no';

        return [$greeting, $question, $correctAnswer];
    };
}

function is_oven(int $number): bool
{
    return $number % 2 === 0;
}
