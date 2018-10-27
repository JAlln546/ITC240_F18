<?php

echo "\n".
    "Welcome to FIFA Women's World Cup!\n".
    "============================================\n\n".
    "Watch as your US Women's National Team play the field!\n";

    echo "To start the tournament press [ENTER]\n";
    $answer = fgets(STDIN);
    
    pass1($answer);
    rapinoe($rapinoe);
    goal();

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
                "Do you [1] play Rapinoe, or [2] play Morgan?";
                pass1(fgets(STDIN));
    }
}


function rapinoe($rapinoe){
    switch ($rapinoe) {
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
                "[1] Morgan or [2] Julie.\n";
                pass2(fgets(STDIN));
    }
}


function goal() {
    echo "\n".
    "============================================\n".
    "|            GOOOOOAAAAALLLLLL!            |\n".
    "============================================\n\n".
    "USA wins the game!!";
}
