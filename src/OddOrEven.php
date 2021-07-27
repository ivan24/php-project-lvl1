<?php
namespace Brain\Games;

use function cli\line;
use function cli\prompt;

function odd_or_even(): void
{
    $name = start_game();
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $attempt = 0;
    $successAttemptLimit = 3;
    
    while (true) {
        $number = generate_random(60);
        $answer = prompt("Question: $number");
        $correctAnswer = is_oven($number) ? 'yes' : 'no';
        $result = $correctAnswer === $answer;

        if (!$result) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            say($name, 'Let\'s try again, %s!');
            return;
        }
        
        ++$attempt;
        
        if ($attempt >= $successAttemptLimit) {
            say($name, 'Congratulations, %s!');
            return;
        }
        line('Correct!');
    }
}


function generate_random($to = 1000): int
{
    return random_int(0, $to);
}

function is_oven(int $number): bool
{
    return $number % 2 === 0;
}
