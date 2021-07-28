<?php

namespace Brain\Games;

function create_progression(): array
{
    $greeting = 'What number is missing in the progression?';

    $progression = static function () {

        $progression = generate_progression();
        $hideItemKey = array_rand($progression);
        $correctAnswer = $progression[$hideItemKey];
        $progression[$hideItemKey] = '..';

        $question = sprintf('Question %s', implode(' ', $progression));

        return [$question, (string)$correctAnswer];
    };

    return [$greeting, $progression];
}

function generate_progression(): array
{
    $d = random_int(1, 40);
    $length = random_int(5, 10);
    $start = random_int(0, 20);
    $progression = [$start];

    for ($i = 0; $i < $length; $i++) {
        $start += $d;
        $progression[] = $start;
    }
    return $progression;
}
