<?php

require_once 'conexão.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Pega os dados
    $nome = trim($_POST['nome'] ?? '');
    $preco = trim($_POST['preco'] ?? '');
    $descricao = trim($_POST['descricao'] ?? '');

    // Validar
    if (
        !empty($nome) &&
        !empty($preco) &&
        !empty($descricao)
    ) {

        // SQL
        $sql = "
            INSERT INTO bolos
            (nome, descricao, preco)
            VALUES (?, ?, ?)
        ";

        // PREPARA
        $stmt = $pdo->prepare($sql);

        // EXECUTA
        $sucesso = $stmt->execute([
            $nome,
            $descricao,
            $preco
        ]);

        if ($sucesso) {

            echo "Bolo cadastrado com sucesso!<br>";

        } else {

            echo "Erro ao cadastrar.";
        }

    } else {

        echo "Preencha todos os campos!";
    }
}
?>

<!-- FORMULÁRIO -->

<form method="POST">

    Nome:
    <input type="text" name="nome">
    <br><br>

    Preço:
    <input type="text" name="preco">
    <br><br>

    Descrição:
    <textarea name="descricao"></textarea>
    <br><br>

    <button type="submit">
        Cadastrar
    </button>

</form>