<?php

require_once 'conexão.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];

    $sql = "DELETE FROM produtos WHERE id = ?";

    $stmt = $conn->prepare($sql);

    $stmt->bind_param("i", $id);

    $stmt->execute();

    header("Location: relatorio.php?msg=excluido");

    exit;
}
?>