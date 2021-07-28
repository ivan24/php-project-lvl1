<?php

namespace Brain\Games;

use function cli\line;
use function Brain\generate_random;

function gcd(): callable
{
    return static function () {
        $greeting = 'Find the greatest common divisor of given numbers.';

        $first = generate_random(100);
        $second = generate_random(100);
        $question = sprintf('Question: %d %d', $first, $second);
        $correctAnswer = calculate_gcd($first, $second);

        return [$greeting, $question, (string)$correctAnswer];
    };
}

function calculate_gcd(int $a, int $b): int
{
    return ($a % $b) ? calculate_gcd($b, $a % $b) : $b;
}
