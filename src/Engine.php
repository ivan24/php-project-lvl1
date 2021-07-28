<?php

namespace Brain;

use function cli\line;
use function cli\prompt;

function run_game(callable $game)
{
    $name = start_game();
    $successAttemptLimit = 3;
    $attempt = 0;

    while (true) {
        [$greeting, $question, $correctAnswer] = $game();
        line($greeting);
        
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
