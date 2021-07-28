<?php

namespace Brain\Games;

use function Brain\generate_random;

function prime(): callable
{
    return static function () {
        $greeting = 'Answer "yes" if given number is prime. Otherwise answer "no".';
        $number = generate_random(100);
        $question = "Question: $number";
        $correctAnswer = is_prime($number) ? 'yes' : 'no';

        return [$greeting, $question, $correctAnswer];
    };
}

function is_prime(int $number): bool
{
    $max = ceil($number / 2);
    for ($i = 2; $i <= $max; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }
    return true;
}
