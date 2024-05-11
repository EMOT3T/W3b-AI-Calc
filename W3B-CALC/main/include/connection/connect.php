<?php

$localhost = "localhost";
$user = "root";
$password = "YOUR PASSWORD ( use all characters possible please )";
$bank = "YOUR DB NAME";

global $pdo;

try {
    $pdo = new PDO("mysql:host=$localhost;dbname=$bank", $user, $password);
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
    exit();
}

?>