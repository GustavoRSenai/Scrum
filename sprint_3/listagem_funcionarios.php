<?php include('valida_sessao.php'); ?>
<?php include('conexao.php'); ?>

<?php
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET ['delete_id'];
    $sql = "DELETE FROM funcionarios WHERE id='$delete_id'";
if ($conn->query($sql) === TRUE) {
    $mensagem = "Funcionário excluido com sucesso!";
 } else {
    $mensagem = "Erro ao excluir Funcionário: " . $conn->error;
 }
}

    $funcionarios = $conn->query("SELECT * FROM funcionarios");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Painel Principal</title>
    <!-- Link para o arquivo CSS para estilização da página -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include('header.html'); ?>
    <div class="container">
        <h2>Listagem de Funcionários</h2>
        <?php if (isset($mensagem)) echo "<p class='message'" .($conn->error ? "error" : "success"). "'> $mensagem</p>"; 
        ?>
        
        <table>
            <tr>
                <!-- ALTERADO OS TÍTULOS -->
                 
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Senha</th>
                <th>Ações</th>
            </tr>
            <?php while ($row = $funcionarios->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['senha']; ?></td>
            <td>
                <a href="cadastro_funcionario.php?edit_id=<?php echo $row['id']; ?>">Editar</a>
             <a href="?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
            </td>
            </tr>
            <?php endwhile; ?>
            </table>
            <div class="botoes">
                <a href="index.php" class="back-button">Voltar</a>
                <a href="cadastro_funcionario.php" class="back-button">Cadastrar</a>
            </div>
            
    </div>
</body>
</body>
</html>
