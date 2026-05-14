<?php
session_start();

$usuario = trim($_POST['usuario']);
$senha = $_POST['senha'];

// Validar
if (empty($usuario) || empty($senha)) {
    echo "Preencha todos os campos!";
    exit;
}

// Controle de tentativas
if (!isset($_SESSION['tentativas'])) {
    $_SESSION['tentativas'] = 0;
}

$_SESSION['tentativas']++;

if ($_SESSION['tentativas'] > 5) {
    echo "Muitas tentativas. Tente mais tarde.";
    exit;
}

?>