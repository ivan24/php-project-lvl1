<?php

namespace Brain\Games;

use function Brain\generate_random;

function create_odd_or_even(): array
{
    $greeting = 'Answer "yes" if the number is even, otherwise answer "no".';

    $odd_or_even =  static function () {
        $number = generate_random(120);
        $question = "Question: $number";
        $correctAnswer = is_oven($number) ? 'yes' : 'no';

        return [$question, $correctAnswer];
    };

    return [$greeting, $odd_or_even];
}

function is_oven(int $number): bool
{
    return $number % 2 === 0;
}
