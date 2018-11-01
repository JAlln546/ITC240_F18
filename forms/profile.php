<!DOCTYPE html>
<html>
    <head>
        <title>
            My Profile
        </title>
    </head>
    <body>
        <h1>
            New Profile
        </h1>
        <form action="/process_profile.php" method="post" enctype="multipart/form-data">
            <p>
                <label for="name">
                    Your name:
                </label>
                <input type="text" name="name"/>
            </p>   
            <p>
                <label for="profile_photo">
                    Profile Photo:
                </label>
                <input type="hidden" name="MAX_FILE_SIZE" value="10000"/><br>
                <input type="file" name="profile_photo"/><br>
                <button type="submit">Upload Deets!</button>
                
            </p>
        </form>
    </body>
</html>
