<?php
// Configurações de conexão (ajuste com seus dados)
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "bolos_caseiros";

$conn = mysqli_connect($host, $user, $pass, $dbname);

if (!$conn) {
    die("Erro na conexão: " . mysqli_connect_error());
}

// Busca os bolos no banco de dados
$query = "SELECT * FROM bolos ORDER BY id DESC";
$resultado = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bolos Caseiros - Dinâmico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">
                <i class="bi bi-cake2"></i> Bolos Caseiros
            </a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#bolos">Sabores</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contato">Contato</a></li>
                </ul>
                <a href="login.html" class="btn btn-outline-primary ms-3">Admin</a>
            </div>
        </div>
    </nav>

    <section class="hero-section mt-5 py-5 bg-light text-center">
        <div class="container py-5">
            <h1 class="display-3 fw-bold">Bolos Caseiros</h1>
            <p class="lead">Feito com amor, sabor de casa</p>
        </div>
    </section>

    <section id="bolos" class="py-5">
        <div class="container">
            <div class="row mb-5 text-center">
                <div class="col-12">
                    <h2 class="fw-bold">Nossos Bolos Especiais</h2>
                    <p class="text-muted">Buscados diretamente do nosso banco de dados</p>
                </div>
            </div>

            <div class="row g-4">
                <?php 
                // Início do Loop PHP
                if (mysqli_num_rows($resultado) > 0) {
                    while($bolo = mysqli_fetch_assoc($resultado)) { 
                ?>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card h-100 shadow-sm">
                        <div class="position-relative">
                            <img src="img/<?php echo $bolo['imagem_url']; ?>" class="card-img-top" alt="<?php echo $bolo['nome']; ?>" style="height: 250px; object-fit: cover;">
                            
                            <?php if($bolo['destaque'] != 'Nenhum'): ?>
                                <span class="badge bg-danger position-absolute top-0 start-0 m-3">
                                    <?php echo $bolo['destaque']; ?>
                                </span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold"><?php echo $bolo['nome']; ?></h5>
                            <p class="card-text text-muted small"><?php echo $bolo['descricao']; ?></p>
                            <p class="h5 text-primary mt-auto">R$ <?php echo number_format($bolo['preco'], 2, ',', '.'); ?></p>
                            <a href="#" class="btn btn-sm btn-dark mt-2">Encomendar</a>
                        </div>
                    </div>
                </div>
                <?php 
                    } 
                } else {
                    echo "<p class='text-center'>Nenhum bolo cadastrado no momento.</p>";
                }
                ?>
            </div>
        </div>
    </section>

    <footer id="contato" class="bg-dark text-white py-4 mt-5">
        <div class="container text-center">
            <p>&copy; 2026 Bolos Caseiros - Todos os direitos reservados.</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
