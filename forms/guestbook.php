<!DOCTYPE html>
<html>
    <head>
        <title>Guestbook</title>
    </head>
    <body>
        <h1>
            My Guestbook
        </h1>
        <hr>
        <?php 
            // Track fields with errors
            $errors = [];
            
            //Only process on Submit.
            $guest_name = $guest_email = $message = '';
            
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
            
            if (isset($_POST['message'])) {
                
                $message = $_POST['message'];
                
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
            
            fwrite($guestFile, "Guest:  $guest_name\n Email: $guest_email\n Message: $message\n\n"
            );
            
            fclose($guestFile);
            
            echo "<strong>Thank you, $guest_name, for the message!</strong>";
            $guest_name = $guest_email = $message = '';
            
            }
            
            }
         ?>
        <h3>
            Sign the Guestbook!
        </h3>
        <em>* fields are required</em>
        <Form method="post" action="guestbook.php">
            <p>
                <label name="guest_name">
                    Enter your name:*
                </label><br>
                <input type="text" name="guest_name" value="<?php echo $guest_name; ?>"/>
            </p>
            <p>
                <label for="email">
                    Enter a valid Email:*
                </label><br>
                <input type="text" name="guest_email" value="<?php echo $guest_email; ?>"/>
            </p>
            <p>
                <label for="message">
                    Please enter a message:
                </label>
                <br>
                <textarea name="message"><?php echo $message; ?></textarea><Br>
                <button type="submit">Submit Entry</button>
            </p>
            
            
        </Form>
    </body>
</html>
