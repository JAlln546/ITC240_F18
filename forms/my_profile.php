<!DOCTYPE html>
<html>
    <head>
        <title>My Profile</title>
    </head>
    <body>
        <h1>My Profile</h1>
        <?php if (isset($_GET['name'])): ?>
        <p>
            My Name is:
            <strong>
                <?php echo $_GET['name']; ?>
            </strong>
        </p>
        <?php endif ?>
        <?php if (isset($_GET['photo'])): ?>
         <?php endif ?>
        <p>
            <img src="<?php echo $_GET['photo']; ?>"></img>
        </p>
       
        
        
    </body>
</html>
