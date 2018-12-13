<!DOCTYPE html>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <title>Guestbook</title>
        <style type="text/css">
            main {
                font-family: 'Raleway', sans-serif;
                width:350px;
                margin:30px auto;
                
            }
            p {
                padding:1%;
            }
            h1, h3 {
                color:dodgerblue;
                text-align:center;
            }
            form {
                padding-left:15px;
            }
            button {
                font-family: 'Raleway', sans-serif;
                font-size:1.2em;
                margin:10px auto;
                padding:2%;
                border-radius:5px;
                display:block;
            }
            
            label {
                margin:1%;
                padding:1%;
            }
            
            input {
                padding:2%;
                width:90%;
            }
        </style>
    </head>
    <body>
        <main>
        <h1>
            My Guestbook
        </h1>
        <hr>
        <?php 
            // Track fields with errors
            $errors = [];
            
            //Only process on Submit.
            $guest_name = $guest_email = $phone = '';
            
            if($_SERVER['REQUEST_METHOD']=='POST') {
                if (empty($_POST['guest_name'])) {
                    
                      $errors[] = 'guest_name';
                      
                 } else {
                     
                       $guest_name = $_POST['guest_name'];
              }
            
            if (isset($_POST['guest_email'])) {
                
                $guest_email = $_POST['guest_email'];
                
                if(!filter_var($guest_email, FILTER_VALIDATE_EMAIL)){
                    $errors[] = 'guest_email';
                   
                } 
            } else {
                    
                    $errors[] = 'guest_email';
                }
            
            if (isset($_POST['phone'])) {
                
                $phone = $_POST['phone'];
                
                if(!filter_var($phone, FILTER_SANITIZE_NUMBER_INT)) {
                    $errors[] = 'phone';
                }
                if(preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phone)) {
                $phone = $_POST['phone'];
            }
                if(strlen($phone == 10)) {
                    $phone = $_POST['phone'];
                }
                
            } else {
                $errors[] = $_POST['phone'];
            }
            
            
            
            
            if (count($errors) > 0) {
                echo "<strong style='color: dodgerblue'>Fix the errors!</strong>";
                echo "<ul>";
                foreach ($errors as $error) {
                    echo "<li>Required Field: $error</li>";
                }
                echo "</ul>";
            } else {
                
                $guestFile = fopen('guest.txt', 'a');
            
            fwrite($guestFile, "Guest:  $guest_name\n Email: $guest_email\n Phone: $phone\n\n"
            );
            
            fclose($guestFile);
            
            echo "<strong>Thank you, $guest_name, for the message!</strong>";
            $guest_name = $guest_email = $phone = '';
            
            }
            
            
            
            }
         ?>
         
       
        <h3>
            Sign the Guestbook!
        </h3>
        <em>* fields are required</em>
        <Form method="post" action="guests.php">
            <p>
                <label name="guest_name">
                    Enter your name:*
                </label><br>
                <input type="text" name="guest_name" value="<?php echo $guest_name; ?>"/>
                <?php if (in_array('guest_name', $errors)): ?> 
                   
                <span style="color:dodgerblue;">Field is required.</span>
                <?php endif ?>
            </p>
            <p>
                <label for="email">
                    Enter a valid Email:*
                </label><br>
                <input type="text" name="guest_email" value="<?php echo $guest_email; ?>"/>
                <?php if (in_array('guest_email', $errors)): ?>
                <span style="color:dodgerblue;">Field is required.</span>
                <?php endif ?>
            </p>
            <p>
                <label for="phone">
                    Enter a 10 digit Phone Number:*
                </label>
                <br>
                <input type="text" name="phone" value="<?php echo $phone; ?>"/><Br>
                     <?php if (in_array('phone', $errors)): ?>
                <span style="color:dodgerblue;">Field is required.</span>
                <?php endif ?>
                
                <button type="submit">Submit Entry</button>
            </p>
            
            
        </Form>
        
        <a href="/login.php">
            Admin Login
        </a>
        </main>
    </body>
</html>

