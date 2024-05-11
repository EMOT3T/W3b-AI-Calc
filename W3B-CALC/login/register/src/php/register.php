<?php

session_start();

require_once('../../../include/connection/connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['fullname']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        

        $fullname = sanitizeInput($_POST['fullname']);

        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $email = sanitizeInput($email);

        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $result = $stmt->fetch();

        if (!$result) {

            $password = sanitizeInput($_POST['password']);

            while (True) {
                $salt = saltGenerator();

                //We have a query inside a loop, because the chance of creating a new salt and it already existing for a user is very small. That's why the query is inside a loop.
                //We use a library to generate salt

                $sql = "SELECT * FROM users WHERE user_salt = :salt";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':salt', $salt);
                $stmt->execute();
                $result = $stmt->fetch();

                if (!$result) {
                    continue;
                } else {
                    $password = $password . $salt;
                    $password_hash = password_hash($password, PASSWORD_DEFAULT);

                    $sql = "INSERT INTO users (user_fullname, user_email, user_password_hash, user_salt) VALUES (:fullname, :email, :password_hash, :salt)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':fullname', $fullname);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':password_hash', $password_hash);
                    $user->bindParam(':salt', $salt);
                    $stmt->execute();

                    $user_id = $pdo->lastInsertId();

                    $sql = "INSERT INTO PolicyUsers (user_id, policy_id) VALUES (:user_id, 1)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':user_id', $user_id);
                    $stmt->execute();

                    $_SESSION['user_id'] = $user_id;
                    header("Location: ../../../../main/pages/home/index.php");
                    exit;
                }
            }
        } else {
            header("Location: ../index.php?message=Email_already_in_use");
            exit;
        }
    } else {
        header('location: ../index.php?message=All_fields_are_required');
        exit;
    }
}

function saltGenerator(): string {
    $characters = array_merge(
        range('a', 'z'),
        range('A', 'Z'),
        range('0', '9'),
        ['!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '-', '_', '+', '=', '~']
    );

    shuffle($characters);

    $salt = '';
    for ($i = 0; $i < 128; $i++) {
        $value = rand(0, count($characters) - 1);
        $salt .= $characters[$value];
    }

    return $salt;
}

function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}
?>
