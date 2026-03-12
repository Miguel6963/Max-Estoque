<?php
//Para reportar erros
error_reporting(E_ALL);
ini_set('display_errors', 1);

$resultado = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "produto.php";
    $nomeProduto = $_POST['nomeProduto'] ?? null;
    // Recupera o termo de busca e aciona o método especializado da classe Produto. O resultado esperado é um array associativo com os dados do registro ou nulo.
    if ($nomeProduto) {
        $produto = new Produto();
        $resultado = $produto->buscar($nomeProduto);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Max Estoque - Busca</title>
    <style>
        body { background-color: black; color: white; font-family: Cambria, serif; text-align: center; }
        form { display: inline-block; background: #111; padding: 20px; border: 1px solid #333; border-radius: 8px; }
        input { padding: 8px; width: 250px; }
        .resultado-box { margin-top: 20px; padding: 15px; border: 1px white; display: inline-block; }
    </style>
</head>
<body>
    <h1>Max Estoque</h1>
    <form action="" method="POST"> <p>Buscar produto:</p>
        <input type="text" name="nomeProduto" placeholder="Digite o nome" required>
        <button type="submit" style="background:#444; color:white; cursor:pointer;">Buscar</button>
    </form>

    <br>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <?php 
            // Condicional que verifica se houve retorno do banco antes de renderizar os detalhes do produto.
            if ($resultado): 
            ?>
            <div class="resultado-box">
                <h3>Produto Encontrado:</h3>
                <p>ID: <?= $resultado['id'] ?></p>
                <p>Nome: <?= htmlspecialchars($resultado['nomeProduto']) ?></p>
                <p>Preço: R$ <?= number_format($resultado['precoProduto'], 2, ',', '.') ?></p>
                <!--// Uso de htmlspecialchars para garantir que o nome buscado seja exibido com segurança no HTML.-->
            </div>
        <?php else: ?>
            <p style="color: red;">Produto não encontrado.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
