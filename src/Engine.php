<?php

namespace Brain;

use function cli\line;
use function cli\prompt;

function run_game(array $gameFabric): void
{
    $name = start_game();
    $successAttemptLimit = 3;
    $attempt = 0;
    [$greeting, $game] = $gameFabric;
    line($greeting);

    while (true) {
        [$question, $correctAnswer] = $game();

        $answer = prompt($question);

        line('Your answer: %s', $answer);
        if ($correctAnswer !== $answer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line('Let\'s try again, %s!', $name);
            return;
        }

        ++$attempt;

        if ($attempt >= $successAttemptLimit) {
            line('Congratulations, %s!', $name);
            return;
        }
        line('Correct!');
    }
}
