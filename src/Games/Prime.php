<?php

namespace Brain\Games;

use function Brain\generate_random;

function create_prime(): array
{
    $greeting = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    $gcd = static function () {
        $number = generate_random(100);
        $question = "Question: $number";
        $correctAnswer = is_prime($number) ? 'yes' : 'no';

        return [$question, $correctAnswer];
    };
    return [$greeting, $gcd];
}

function is_prime(int $number): bool
{
    if ($number < 2) {
        return false;
    }
    $max = ceil($number / 2);
    for ($i = 2; $i <= $max; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
