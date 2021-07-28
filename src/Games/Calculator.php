<?php

namespace Brain\Games;

use function cli\line;
use function Brain\generate_random;

function calculator(): callable
{
    $operations = ['+', '-', '*'];
    $fnGetRandomOperator = static function () use ($operations) {
        return $operations[random_int(0, count($operations) - 1)];
    };

    return static function () use ($fnGetRandomOperator) {
        $greeting = 'What is the result of the expression?';

        $operator = $fnGetRandomOperator();
        $first = generate_random(100);
        $second = generate_random(100);
        $question = sprintf('Question: %d %s %d', $first, $operator, $second);
        $correctAnswer = calculate($first, $second, $operator);

        return [$greeting, $question, (string)$correctAnswer];
    };
}

function calculate(int $first, int $second, string $operator): int
{
    return match ($operator) {
        '+' => $first + $second,
        '-' => $first - $second,
        '*' => $first * $second,
        default => throw new \Exception('unsupported operator ' . $operator),
    };
}
