<?php include('valida_sessao.php'); ?>
<!-- Inclui o arquivo 'valida_sessao.php' para garantir que o usuário esteja autenticado -->

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel Principal</title>
    <!-- Link para o arquivo CSS para estilização da página -->
    <link rel="stylesheet" href="style.css">
</head>
<body style="background: url(assets/Fundo.jpg); background-repeat: repeat; background-size: cover;">
    
    <header>
        <div class="header">
            <ul class="menu">
                <li><a href="index.php"><img class="logo" src="assets/logo.png" alt="logo"></a></li>
                <li><a href="listagem_produtos.php">Produtos</a></li>
                <li><a href="listagem_fornecedores.php">Fornecedores</a></li>
                <li><a href="listagem_funcionarios.php">Funcionários</a></li>
            </ul>
            <ul class="sair">
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </div>
    </header>
    <main>
        <h1><spam>BRECHÓ</spam> TEM MUITA CLASSE E É PRA QUEM SABE QUE O BOM GOSTO SE ENCONTRA AQUI</h1>
    </main>
</body>
</html>
