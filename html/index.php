<?php

echo '<h1>WE ARE IN DOCKER BUSINESS</h1>';

// Deze gegevens zijn afkomstig uit docker-compose.yml
$servername = "db";
$username = "devuser";
$password = "devpass";
$dbname = "test_db";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p>And we have PDO connection!</p>";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>