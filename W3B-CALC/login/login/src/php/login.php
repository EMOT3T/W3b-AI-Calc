<?php

session_start();

require_once('../../../include/connection/connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['email']) || !empty($_POST['password'])) {

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $email = sanitizeInput($email);

        $sql = "SELECT * FROM users WHERE user_email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user) {
            $password = sanitizeInput($_POST['password']);
            $password = $password . $user['user_salt'];
            if (password_verify($password, $user['user_password_hash'])) {
                $_SESSION['user_id'] = $user['user_id'];
                header("Location: ../../../../main/pages/home/index.php");
                exit();
            } else {
                header("Location: ../index.html?Error=Invalid_password_or_email");
                exit();
            }
        } else {
            header("Location: ../index.html?Error=User_not_found");
            exit();
        }
    }
}

function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

?>