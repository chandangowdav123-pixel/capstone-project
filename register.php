<?php
require 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if($name && $email && $password){
        // Hash password
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // Insert user
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        try {
            $stmt->execute([$name, $email, $hash]);
            echo json_encode(['status'=>'success']);
        } catch(PDOException $e){
            echo json_encode(['status'=>'error', 'message'=>'Email already exists']);
        }
    } else {
        echo json_encode(['status'=>'error', 'message'=>'All fields are required']);
    }
}
?>
