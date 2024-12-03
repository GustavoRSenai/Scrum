<?php include('valida_sessao.php'); ?>
<?php include('conexao.php'); ?>

<?php
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET ['delete_id'];
    $sql = "DELETE FROM produtos WHERE id='$delete_id'";
if ($conn->query($sql) === TRUE) {
    $mensagem = "Produto excluido com sucesso!";
 } else {
    $mensagem = "Erro ao excluir produto: " . $conn->error;
 }
}
    $produtos = $conn->query("SELECT p.id, p.nome, p.descricao, p.preco, p.estado, p.quantidade, p.imagem, f.nome AS fornecedor_nome FROM produtos p JOIN fornecedores f ON p.fornecedor_id = f.id");

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
        <h2>Listagem de Produtos</h2>
        <?php if (isset($mensagem)) echo "<p class='message'" .($conn->error ? "error" : "success"). "'> $mensagem</p>"; 
        ?>
        
        <table>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Fornecedor</th>
                <th>Estado</th>
                <th>Quantidade em estoque</th>
                <th>Imagem</th>
                <th>Ações</th>
            </tr>
            <?php while ($row = $produtos->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nome']; ?></td>
                <td><?php echo $row['descricao'];?></td>
                <td><?php echo $row['preco']; ?></td>
                <td><?php echo $row['fornecedor_nome']; ?></td>
                <td><?php echo $row['estado'];?></td>
                <td><?php echo $row['quantidade'];?></td>
                <td>
                    <?php if ($row['imagem']): ?>
                        <img src="<?php echo $row['imagem']; ?>" alt="Imagem do produto" style="max-width: 100px;">
                <?php else: ?>
                    Sem imagem
                <?php endif; ?>
            </td>
            <td>
                <a href="cadastro_produto.php?edit_id=<?php echo $row['id']; ?>">Editar</a>
             <a href="?delete_id=<?php echo $row['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
            </td>
            </tr>
            <?php endwhile; ?>
            </table>
            <div class="botoes">
                <a href="index.php" class="back-button">Voltar</a>
                <a href="cadastro_produto.php" class="back-button">Cadastrar</a>
            </div>
            
    </div>
</body>
</body>
</html>
