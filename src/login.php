<?php
session_start();

require_once 'conexao.php';

// =========================
// RECEBER DADOS
// =========================
$usuario = trim($_POST['usuario'] ?? '');
$senha   = trim($_POST['senha'] ?? '');

// =========================
// VALIDAR CAMPOS
// =========================
if (empty($usuario) || empty($senha)) {

    echo "Preencha todos os campos!";
    exit;
}

// =========================
// CONTROLE DE TENTATIVAS
// =========================
if (!isset($_SESSION['tentativas'])) {
    $_SESSION['tentativas'] = 0;
}

$_SESSION['tentativas']++;

if ($_SESSION['tentativas'] > 5) {

    echo "Muitas tentativas. Tente mais tarde.";
    exit;
}

// =========================
// BUSCAR ADMINISTRADOR
// =========================
$sql = "SELECT * FROM administradores WHERE email = ?";

$stmt = $pdo->prepare($sql);

$stmt->execute([$usuario]);

$admin = $stmt->fetch();

// =========================
// VERIFICAR LOGIN
// =========================
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