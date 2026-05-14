<?php
require_once 'conexão.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $stmt = $pdo->prepare("INSERT INTO produtos (nome, preco, categoria) VALUES (?, ?, ?)");
        $stmt->execute([$_POST['nome'], $_POST['preco'], $_POST['categoria']]);
        header("Location: relatorio.php?msg=sucesso");
        exit;
    } catch (Exception $e) {
        header("Location: relatorio.php?msg=erro");
    }
}
include_once 'header.php';
?>
<h2>Cadastrar Produto</h2>
<form method="POST">
    <input type="text" name="nome" placeholder="Nome" required><br><br>
    <input type="number" step="0.01" name="preco" placeholder="Preço" required><br><br>
    <input type="number" name="categoria" placeholder="categoria" required><br><br>
    <button type="submit">Salvar</button>
</form>
<?php include_once 'footer.php'; ?>