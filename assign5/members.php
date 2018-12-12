<?php
session_start();

if ($_SESSION['valid'] != true) {
    header("Location: /login.php");   
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
        <title>Members: My People</title>
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
        </style>
    </head>
    <body>
        <?php 
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (isset($_POST['user_comment'])) {
                    $comment = $_POST['user_comment'];
                    $member_id = $_SESSION['id'];
                    $addComment = $db->prepare(
                        'INSERT INTO comments (member_id, user_comment) '.
            'VALUES (:member_id, :user_comment)'
        );
        $addComment->execute([
                'member_id' => $member_id,
                'user_comment' => $comment
            ]);
                    
                }
            }
        ?>
        <div id="container">
        <h1>
            Members Only: Comment List</h1>
            <h3>
                Currently logged in as <?php echo $_SESSION['name']; ?>
                |
                <a href="/logout.php">Logout</a>
            </h3>
        
        <main>
        <ul>
            <?php 
                $commentQuery = $db->prepare(
                    'SELECT * FROM comments'
                );
                $commentQuery->execute();
                $userComments = $commentQuery->fetchAll(PDO::FETCH_ASSOC);
                    
                    foreach ($userComments as $commentPost) {
                        echo "<li>" . $commentPost['user_comment'] . "</li>";
                    }
                ?>
        </ul>
        
        <hr>
        
        <h2>
        Add New Comment
        </h2>
        <form method="post" action="">
            <p>
                <label>What you wan:</label>
                <Br>
                <textarea name="user_comment"></textarea>
            </p>
            <p>
                <input type="submit" value="Comment"/>
            </p>
        </form>
        </main>
        </div>
    </body>
</html>
