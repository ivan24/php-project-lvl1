<?php

namespace Brain\Games;

use function Brain\generate_random;

function create_calculator(): array
{
    $operations = ['+', '-', '*'];
    $fnGetRandomOperator = static function () use ($operations) {
        return $operations[random_int(0, count($operations) - 1)];
    };
    $greeting = 'What is the result of the expression?';

    $calculator = static function () use ($fnGetRandomOperator): array {

        $operator = $fnGetRandomOperator();
        $first = generate_random(100);
        $second = generate_random(100);
        $question = sprintf('Question: %d %s %d', $first, $operator, $second);
        $correctAnswer = calculate($first, $second, $operator);

        return [$question, (string)$correctAnswer];
    };
    return [$greeting, $calculator];
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
