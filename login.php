<?php
require 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if($email && $password){
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password, $user['password'])){
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            echo json_encode(['status'=>'success', 'name'=>$user['name']]);
        } else {
            echo json_encode(['status'=>'error', 'message'=>'Invalid credentials']);
        }
    } else {
        echo json_encode(['status'=>'error', 'message'=>'Email & password required']);
    }
}
?>
