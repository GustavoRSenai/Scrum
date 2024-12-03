<?php
session_start();
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = $_POST['usuario'];
    $senha = md5($_POST['senha']);

    $sql = "SELECT * FROM funcionarios WHERE nome='$usuario' AND senha='$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        $_SESSION['usuario'] = $usuario;
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
    <main>
        <div class="login">
            <div class="logoLogin"><img class="logo2" src="assets/logo2.png" alt="logo"></div>
            <div class="containercenter">
                <h2>Login</h2>
                <form method="post" action="">
                    <label for="nome"><p>Nome:</p></label>
                    <input type="text" name="usuario" required>
                    <label for="senha"><p>Senha:</p></label>
                    <input type="password" name="senha" required>
                    <button type="submit" style="margin-bottom: 30px;">Entrar</button>
                    <?php if (isset($error)) echo "<p class='message error'>$error</p>"; ?>
                </form>
            </div>
        </div>
    </main>
</body>
</html>