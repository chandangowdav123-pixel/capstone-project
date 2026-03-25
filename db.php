<?php
$host = "localhost";
$dbname = "health_monitor"; // Change to your database name
$username = "root";   // Change if using different MySQL user
$password = "Chandan@5090";       // Change if you have a MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Set PDO error mode
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
