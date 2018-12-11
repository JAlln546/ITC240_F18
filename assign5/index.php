<?php

session_start();

if ($_SESSION['valid'] != true) {
    header('Location: /login.php');
    die();
}

define('BASEPATH', dirname(__FILE__));

require_once BASEPATH . '/connect.php';

$db = connectDB();

if ($db == null) {
    echo "UH OH!";
    die();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>My People</title>
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <style type="text/css">
            body {
                font-family: 'Raleway', sans-serif;
            }
            #container {
                width:540px;
                margin:30px auto;
            }
            
            h1, h2, h3{
                text-align:center;
                /* font-size:2em; */
                font-family: 'Oswald', sans-serif;
            }
            p {
                font-size:1.2em;
            }
            form {
                padding:3%;
                padding-left:10%;
            }
            input {
                padding:2%;
                border-radius:5px;
            }
            input[type="submit"] {
                font-family: 'Raleway', sans-serif;
            }
            ul {
                text-align:center;
                
            }
            li {
                list-style-type: none;
                
            }
            
            a {
                display:block;
                text-align:center;
            }
        </style>
    </head>
    <body>
        
        
        <h1>User Comments</h1>
        
        <ul>
            <?php 
                $commentQuery = $db->prepare(
                    "SELECT * FROM comments"
                );
                $commentQuery->execute();
                $userComments = $commentQuery->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach ($userComment as $comment) {
                        echo "<li>" . $comment['text'] . "</li>";
                    }
                ?>
        </ul>
        
        <a href="./members.php">
            Go to Members Page.
        </a>
       
    </body>
</html>
