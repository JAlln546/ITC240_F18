<?php

echo "\n".
    "Welcome to FIFA Women's World Cup!\n".
    "============================================\n\n".
    "Watch as your US Women's National Team play the field!\n";

    echo "To start the tournament press [ENTER]\n";
    $answer = fgets(STDIN);
    pass1($answer);
   

function pass1($answer){
    switch ($answer){
        case 1:
            echo "Rapinoe gets the ball and heads down the left flank.\n";
            rapinoe();
            break;
        case 2:
            echo "Alex Morgan streaks through the back line!\n".
            "Beats the goal keeper and scores!";
            goal();
            break;
        default:
            echo "Kick off!  Who do you pass to first?\n".
                "Do you [1] play Rapinoe, or [2] play Morgan?\n\n";
                pass1(fgets(STDIN));
    }
}

function rapinoe($answer=null){
    switch ($answer) {
        case 1:
            echo "Morgan gets the ball and shoots and scores!";
            goal();
            break;
        case 2:
            echo "JJ heads the ball of rapinoe's cross, and she scores!";
            goal();
            break;
        default:
            echo "Rapinoe lifts her head and who does she see?!\n".
                "[1] Morgan giving the perfect angled run or \n". 
                "[2] Julie edging her defender in the 6!\n";
                rapinoe(fgets(STDIN));
    }
}


function goal() {
    echo "\n".
    "============================================\n".
    "|            GOOOOOAAAAALLLLLL!            |\n".
    "============================================\n\n".
    "USA wins the game!!\n\n";
}
