<?php

$questions = [
    "What do you call a key:value array in PHP?" => [
         "Associative Array" => true,
         "Simple Array" => false,
         "Dictionary" => false,
         "Lock Type" => false
    ],
    "What is the symbol for past value reference?" => [
        "&" => true,
        "*" => false,
        ";-)" => false,
        "%" => false
        ]
    ];

echo "Welcome to Quiz 01\n";
echo "==================\n\n";

$correct = 0;

foreach($questions as $question => $options) {
    echo $question."\n";
    $isCorrect = askForAnswer($options);
    if ($isCorrect) {
        $correct++;
        echo "Correct! Good Job.\n";
    }
}

echo "\n Your grade is ". $correct / count($questions) * 100 . "%\n\n";


function askForAnswer($options) {
    kshuffle($options);
    $position = 1;
    $optionAnswers = [];
    foreach ($options as $option => $correct) {
        echo "[$position]. $option\n";
        $optionsAnswers[$position] = $correct;
        $position++;
    }
    $userAnswer= (int)fgets(STDIN);
    return $optionsAnswers[$userAnswer];
}

function kshuffle(&$array) {
    $tmp = [];
    foreach($array as $key => $value) {
        $tmp[] = ['k' => $key, 'v' => $value];
    }
    shuffle($tmp);
    $array = [];
    foreach($tmp as $entry) {
        $array[$entry['k']] = $entry['v'];
    }
    return true;
}
