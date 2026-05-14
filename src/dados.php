<?php
$bolos = [
    [
        "nome" => "Bolo de Chocolate",
        "descricao" => "Chocolate belga com cobertura de ganache cremosa.",
        "preco" => 45.00,
        "imagem" => "bolochocolate.jfif",
        
    ],
    [
        "nome" => "Bolo de Morango",
        "descricao" => "Massa de pão de lo delicada com recheio de morango fresco.",
        "preco" => 48.00,
        "imagem" => "bolodemorango.webp",
        "tag" => "Novo"
    ],
    [
        "nome" => "Bolo de Cenoura",
        "descricao" => "Clássico com cobertura de chocolate crocante.",
        "preco" => 40.00,
        "imagem" => "bolodecenoura.jpg",
        
    ],
    [
        "nome" => "Bolo de Limão",
        "descricao" => "Bolo cítrico e refrescante com calda de limão caseira.",
        "preco" => 42.00,
        "imagem" => "bolodelimao.jfif",
        "tag" => ""
    ],
    [
        "nome" => "Bolo de Red Velvet",
        "descricao" => "O clássico veludo vermelho com cobertura de cream cheese.",
        "preco" => 50.00,
        "imagem" => "boloredvelvet.jfif",
        "tag" => "Premium"
    ],
    [
        "nome" => "Floresta Negra",
        "descricao" => "Combinação perfeita de chocolate e cereja com calda especial.",
        "preco" => 55.00,
        "imagem" => "boloflorestanegra.png",
        "tag" => ""
    ]
];
?>

<section id="bolos" class="ofertas-section py-5">
    <div class="container">
        <div class="row mb-5 text-center">
            <div class="col-12">
                <h2 class="section-title mb-3">Nossos Bolos Especiais</h2>
                <p class="text-muted">Conheça nossa linha completa de bolos caseiros</p>
            </div>
        </div>

        <div class="row g-4">
            <?php foreach($bolos as $bolo): ?>
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card card-bolo h-100 shadow-sm">
                        <div class="card-img-container" style="position: relative; height: 220px; overflow: hidden;">
                            <img src="<?php echo $bolo['imagem']; ?>" class="card-img-top" alt="<?php echo $bolo['nome']; ?>" style="object-fit: cover; height: 100%; width: 100%;">
                            
                            <?php if(!empty($bolo['tag'])): ?>
                                <span class="badge bg-primary" style="position: absolute; top: 10px; left: 10px; padding: 8px 15px; border-radius: 20px;">
                                    <?php echo $bolo['tag']; ?>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold"><?php echo $bolo['nome']; ?></h5>
                            <p class="card-text text-muted small"><?php echo $bolo['descricao']; ?></p>
                            
                            <p class="preco mt-auto mb-3 fw-bold fs-4 text-dark">
                                R$ <?php echo number_format($bolo['preco'], 2, ',', '.'); ?>
                            </p>

                            <a href="detalhes.php?nome=<?php echo urlencode($bolo['nome']); ?>" class="btn btn-outline-dark w-100">
                                Ver Detalhes
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

                          