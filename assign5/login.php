<?php
session_start();


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
        <title>Login Page</title>
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
            
            h1, h3{
                text-align:center;
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
             input[type="submit"]{
                 font-family: 'Raleway', sans-serif;
             }
        </style>
    </head>
    <body>
        <div id="container">
            
        <h1>Login Form</h1>
        <hr>
        <?php
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (!empty($_POST['username']) && !empty($_POST['password'])) {
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    
                    $query = $db->prepare(
                            'SELECT * FROM people_users '.
                            'WHERE username = :username'
                        );
                    $query->execute([
                        'username' => $username
                        ]);
                        
                        $result = $query->fetch(PDO::FETCH_ASSOC);
                        if (isset($result['password'])) {
                            if (password_verify($password, $result['password'])) {
                                $_SESSION['valid'] = true;
                                $_SESSION['name'] = $result['name'];
                                $_SESSION['id'] = $result['id'];
                                header('Location: /members.php');
                            }
                        }
                        echo "<h3><strong>Sorry, credentials do not match.</strong></h3>";
                } else {
                    echo "<h3><strong>Must enter a username and password.</strong></h3>";
                }
            }
        ?>
        <main>
        
                <form method="post" action="">
            
            <p>
                <label for="username">
                    Username: 
                </label>
                <input type="text" name="username"/>
            </p>
            <p>
                <label for="password">
                    Password:
                </label>
                <input type="password" name="password"/>
            </p>
            
            <input type="submit" value="Login"/>
        </form>
        <br><br>
        <!-- <a  href="./adduser.php" >Register</a> -->
            </main>
        </div>
        
        
        
    </body>
</html>
