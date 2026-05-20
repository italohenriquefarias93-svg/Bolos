<?php
require_once 'conexao.php';

$bolos = $pdo->query("SELECT * FROM bolos ORDER BY nome")->fetchAll();

// Sistema de Mensagens
$status = $_GET['msg'] ?? '';

$mensagens = [
    'sucesso' => 'Ação realizada com sucesso!',
    'excluido' => 'Bolo removido do sistema.',
    'erro' => 'Erro ao processar solicitação.',
    'tabela_pronta' => 'Banco de dados configurado!'
];

include_once 'header.php';
?>

<h1>Relatório de Bolos</h1>

<?php if ($status && isset($mensagens[$status])): ?>
    <div class="alert <?= $status === 'erro' ? 'error' : 'success' ?>">
        <?= $mensagens[$status] ?>
    </div>
<?php endif; ?>

<table border="1" width="100%" cellpadding="10" style="border-collapse: collapse;">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Descrição</th>
        <th>Preço</th>
        <th>Destaque</th>
        <th>Imagem</th>
        <th>Ações</th>
    </tr>

    <?php foreach($bolos as $b): ?>
    <tr>
        <td><?= $b['id'] ?></td>

        <td><?= htmlspecialchars($b['nome']) ?></td>

        <td><?= htmlspecialchars($b['descricao']) ?></td>

        <td>
            R$ <?= number_format($b['preco'], 2, ',', '.') ?>
        </td>

        <td><?= htmlspecialchars($b['destaque']) ?></td>

        <td>
            <img 
                src="imagens/<?= $b['imagem_url'] ?>" 
                width="80"
                alt="<?= htmlspecialchars($b['nome']) ?>"
            >
        </td>

        <td>
            <a href="altera.php?id=<?= $b['id'] ?>">
                Editar
            </a>

            |

            <form 
                action="exclui.php" 
                method="POST" 
                style="display:inline"
                onsubmit="return confirm('Excluir bolo?')"
            >

                <input 
                    type="hidden"
                    name="id"
                    value="<?= $b['id'] ?>"
                >

                <button type="submit">
                    Excluir
                </button>

            </form>
        </td>
    </tr>
    <?php endforeach; ?>

</table>

<?php include_once 'footer.php'; ?>