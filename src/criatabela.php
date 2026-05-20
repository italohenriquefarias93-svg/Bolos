<?php

require_once 'conexão.php';

try {

    // TABELA BOLOS
    $sqlBolos = "
    CREATE TABLE IF NOT EXISTS bolos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        descricao TEXT NOT NULL,
        preco DECIMAL(10,2) NOT NULL,
        imagem_url VARCHAR(255),
        destaque VARCHAR(50)
    )";

    $pdo->exec($sqlBolos);


    // TABELA ADMINISTRADORES
    $sqlAdmin = "
    CREATE TABLE IF NOT EXISTS administradores (
        id INT AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        email VARCHAR(150) NOT NULL UNIQUE,
        senha VARCHAR(255) NOT NULL,
        lembrar_me BOOLEAN DEFAULT FALSE,
        criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    $pdo->exec($sqlAdmin);


    // INSERIR ADMINISTRADOR
    $sqlInsertAdmin = "
    INSERT INTO administradores (nome, email, senha, lembrar_me)
    VALUES (
        'Administrador',
        'admin@bolos.com',
        '123456',
        TRUE
    )";

    $pdo->exec($sqlInsertAdmin);


    // INSERIR BOLOS
    $sqlInsertBolos = "
    INSERT INTO bolos (nome, descricao, preco, imagem_url, destaque) 
    VALUES
    (
        'Bolo de Chocolate', 
        'Chocolate belga com cobertura de ganache cremosa e calda suave.', 
        45.00, 
        'bolochocolate.jfif', 
        'Destaque'
    ),
    (
        'Bolo de Morango', 
        'Massa de pão de ló delicada com recheio de morango fresco e chantilly.', 
        48.00, 
        'bolodemorango.webp', 
        'Novo'
    ),
    (
        'Bolo de Cenoura', 
        'Leveza e sabor em um bolo clássico com cobertura de chocolate.', 
        40.00, 
        'bolodecenoura.jpg', 
        'Nenhum'
    ),
    (
        'Bolo de Limão', 
        'Bolo cítrico e refrescante com calda de limão caseira.', 
        42.00, 
        'bolodelimao.jfif', 
        'Nenhum'
    ),
    (
        'Bolo Red Velvet', 
        'O bolo Red Velvet é macio e com sabor leve de chocolate, coberto com cream cheese.', 
        50.00, 
        'boloredvelvet.jfif', 
        'Nenhum'
    ),
    (
        'Floresta Negra', 
        'Combinação perfeita de chocolate e cereja com calda especial.', 
        55.00, 
        'boloflorestanegra.png', 
        'Nenhum'
    )";

    $pdo->exec($sqlInsertBolos);


    echo "<h1>Banco configurado com sucesso!</h1>";

} catch (PDOException $e) {

    echo "Erro: " . $e->getMessage();

} 