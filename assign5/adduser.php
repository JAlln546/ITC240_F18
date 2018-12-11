<?php

define('BASEPATH', dirname(__FILE__));

require_once BASEPATH . '/connect.php';

echo "Add new member to the People Users table.\n" .
     "========================================\n\n";

$db = connectDB();

if ($db == null) {
    echo "ERROR: Unable to connect to DB.\n" .
         "===============================\n\n";
    die();
}

     
echo "First, type the user's real name and hit [ENTER]:\n";
$name = trim(fgets(STDIN));

echo "Enter the user's username: \n";
$username = trim(fgets(STDIN));

echo "Enter the user's password: \n";
$password = trim(fgets(STDIN));

$query = $db->prepare(
    'INSERT INTO people_users (username, password, name)' .
    'VALUES (:username, :password, :name)'
);

$success = $query->execute([
    'username' => $username,
    'password' => password_hash($password, PASSWORD_DEFAULT),
    'name' => $name
    ]);
    
if ($success) {
    echo "Successfully added: $name\n";
} else {
    echo "Failed to add user.\n\n";
}
