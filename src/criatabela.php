<?php
require_once 'conexão.php';
$sql = "CREATE TABLE IF  produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    preco DECIMAL(10,2) NOT NULL,
    categoria varchar(50) not null
)";
$pdo->exec($sql);
echo "<h1>Tabela criada com sucesso!</h1>";
//header("Location: relatorio.php?msg=tabela_pronta"); 