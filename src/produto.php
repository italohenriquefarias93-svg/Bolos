<?php
// CONEXÃO COM O BANCO
$conn = new mysqli("localhost", "root", "", "sistema_bolos");

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega os dados do formulário
    $nome = trim($_POST['nome']);
    $preco = trim($_POST['preco']);
    $categoria = trim($_POST['categoria']); // corrigido

    // Validação dos campos
    if (!empty($nome) && !empty($preco) && !empty($categoria)) {

        // INSERIR NO BANCO
        $sql = "INSERT INTO produtos (nome, preco, categoria) 
                VALUES ('$nome', '$preco', '$categoria')";

        if ($conn->query($sql) === TRUE) {
            echo "Produto cadastrado com sucesso!<br>";
        } else {
            echo "Erro: " . $conn->error;
        }

    } else {
        echo "Por favor, preencha todos os campos!";
    }
}
?>

<!-- FORMULÁRIO -->
<form method="POST">
    Nome: <input type="text" name="nome"><br><br>
    Preço: <input type="text" name="preco"><br><br>
    Categoria: <input type="text" name="categoria"><br><br>

    <button type="submit">Cadastrar</button>
</form>