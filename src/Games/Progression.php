<?php

namespace Brain\Games;

use function cli\line;
use function Brain\generate_random;

function progression(): callable
{
    return static function () {
        
        $greeting = 'What number is missing in the progression?';

        $progression = generate_progression();
        $hideItemKey = array_rand($progression);
        $correctAnswer = $progression[$hideItemKey];
        $progression[$hideItemKey] = '..';

        $question = sprintf('Question: %s', implode(' ', $progression));

        return [$greeting, $question, (string)$correctAnswer];
    };
}

function generate_progression(): array
{
    $d = random_int(1, 100);
    $length = random_int(5, 10);
    $start = random_int(0, 100);
    $progression = [$start];
    
    for ($i = 0; $i < $length; $i++) {
        $start += $d;
        $progression[] = $start;
    }
    return $progression;
}
