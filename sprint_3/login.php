<?php
session_start();
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $senha = md5($_POST['senha']);

    $sql = "SELECT * FROM funcionarios WHERE nome='$nome' AND senha='$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        $_SESSION['nome'] = $nome;
        header('location: index.php');
    } else {
        $error = "Usuário ou senha inválidos";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body >
    <header>
        <div class="header">
            <ul class="menu">
                <li><a href="login.php?id=259"><img class="logo" src="assets/logo.png" alt="logo"></a></li>
                <li><a href="login.php?id=259">Produtos</a></li>
                <li><a href="login.php?id=259">Fornecedores</a></li>
                <li><a href="login.php?id=259">Funcionários</a></li>
            </ul>
            <ul class="sair">
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
    </header>
    <main>
        <?php 
            if (isset($_GET['id'])){
                echo "<p class='loginmsg'> Entre para acessar as proximas página </p>";
            }
        ?>

        <div class="container" style="width: 500px;">
            <h2>Login</h2>
            <form method="post" action="">
                <label for="nome"><p>Nome:</p></label>
                <input type="text" name="nome" required>
                <label for="senha"><p>Senha:</p></label>
                <input type="password" name="senha" required>
                <button type="submit" style="margin-bottom: 30px;">Entrar</button>
                <?php if (isset($error)) echo "<p class='message error'>$error</p>"; ?>
            </form>
        </div>
    </main>
</body>
</html>