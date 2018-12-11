<?php 

define('BASEPATH', dirname(__FILE__));

require BASEPATH . '/secret.php';

function connectDB() {
    try {
        $pdo = new PDO(
           'mysql:host=' .DBHOST.';dbname='.DBNAME, DBUSER, DBPASSWORD
           );
           
           //pdo stands for php data objects
           //class handles connections on variety of different databases
           $pdo->setAttribute(
               PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
            );
            
           // $pdo->exec("SET NAMES 'utf8");
            return $pdo;
    } catch (PDOException $e) {
        echo "DB Connection error: " . $e->getCode() . 
             " - " . $e->getMessage();
             
    }
    return null;
}


$db = connectDB();

if ($db == null) {
    echo "UH OH!"; 
    die();
}

$query = $db->prepare('SELECT * FROM People');
$query->execute();
$results = $query->fetch(PDO::FETCH_ASSOC);
//var_dump($results);

$query2 = $db->prepare("SELECT * FROM People WHERE id = :id");
$query2 = $query->execute();

?>
