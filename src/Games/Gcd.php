<?php

namespace Brain\Games;

use function Brain\generate_random;

function create_gcd(): array
{
    $greeting = 'Find the greatest common divisor of given numbers.';

    $gcd = static function () {
        $first = generate_random(100);
        $second = generate_random(100);
        $question = sprintf('Question: %d %d', $first, $second);
        $correctAnswer = calculate_gcd($first, $second);

        return [$question, (string)$correctAnswer];
    };
    return [$greeting, $gcd];
}

function calculate_gcd(int $a, int $b): int
{
    return ($a % $b) ? calculate_gcd($b, $a % $b) : $b;
}
