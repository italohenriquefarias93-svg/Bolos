<?php

// CONEXÃO COM O BANCO
$conn = new mysqli("db", "app_user", "", "app_db");

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Pega os dados do formulário
    $nome = trim($_POST['nome']);
    $preco = trim($_POST['preco']);
    $descricao = trim($_POST['descricao']);

    // Validação
    if (!empty($nome) && !empty($preco) && !empty($descricao)) {

        // INSERIR NO BANCO
        $sql = "INSERT INTO bolos (nome, descricao, preco)
                VALUES ('$nome', '$descricao', '$preco')";

        if ($conn->query($sql) === TRUE) {
            echo "Bolo cadastrado com sucesso!<br>";
        } else {
            echo "Erro: " . $conn->error;
        }

    } else {
        echo "Preencha todos os campos!";
    }
}

?>

<!-- FORMULÁRIO -->
<form method="POST">

    Nome:
    <input type="text" name="nome"><br><br>

    Preço:
    <input type="text" name="preco"><br><br>

    Descrição:
    <input type="text" name="descricao"><br><br>

    <button type="submit">Cadastrar</button>

</form>