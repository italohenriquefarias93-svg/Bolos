<?php

$host = "db";
$db   = "app_db";
$user = "app_user";
$pass = "_";

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {

    $pdo = new PDO($dsn, $user, $pass, [

        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,

        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC

    ]);

} catch (PDOException $e) {

    die("Erro de conexão: " . $e->getMessage());
}
?>


<?php
session_start();

require_once 'conexão.php';
$usuario = trim($_POST['usuario'] ?? '');
$senha   = trim($_POST['senha'] ?? '');
if (empty($usuario) || empty($senha)) {

    echo "Preencha todos os campos!";
    exit;
}


if (!isset($_SESSION['tentativas'])) {
    $_SESSION['tentativas'] = 0;
}

$_SESSION['tentativas']++;

if ($_SESSION['tentativas'] > 5) {

    echo "Muitas tentativas. Tente mais tarde.";
    exit;
}


$sql = "SELECT * FROM administradores WHERE email = ?";

$stmt = $pdo->prepare($sql);

$stmt->execute([$usuario]);

$admin = $stmt->fetch();


if ($admin && $senha === $admin['senha']) {

    // Login OK
    $_SESSION['admin_id'] = $admin['id'];
    $_SESSION['admin_nome'] = $admin['nome'];

    // Zera tentativas
    $_SESSION['tentativas'] = 0;

    header("Location: admin.php?msg=sucesso");
    exit;

} else {

    echo "Usuário ou senha inválidos!";
}
?>