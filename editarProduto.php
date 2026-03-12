<?php
// Lógica PHP no topo para processar a edição
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "produto.php";

    $id = $_POST['id'] ?? null;
    $nomeProduto = $_POST['nomeProduto'] ?? null;
    $precoProduto = $_POST['precoProduto'] ?? null;

    // Verificamos se os campos foram preenchidos
    if ($id && $nomeProduto && $precoProduto){
        $produto = new Produto();

        //Aciona o método de edição da classe, passando os novos valores capturados pelo formulário.
        //Apenas campos mercadológicos são editáveis para preservar a integridade do saldo de estoque.
        if ($produto->editar($nomeProduto, $precoProduto, $id)) {
            $mensagem = "Produto ID $id editado com sucesso!";
        } else {
            $mensagem = "Erro ao tentar editar o produto.";
        }
    } else {
        $mensagem = "Preencha todos os campos para editar.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max Estoque - Editar</title>
    <style>
        body { background-color: black; color: white; font-family: Cambria, serif; text-align: center; }
        form { display: inline-block; text-align: left; background: #111; padding: 20px; border: 1px solid #333; border-radius: 8px; }
        input { padding: 8px; width: 250px; margin-bottom: 10px; }
        .btn { padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; font-weight: bold; text-decoration: none; display: inline-block; }
        .btn-editar { background-color: #444; color: black; } /* Laranja para edição */
        .btn-voltar { background-color: #444; color: white; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Max Estoque</h1>
    <h2>Editar Produto</h2>

    <?php if(isset($mensagem)) echo "<p style='color: yellow;'>$mensagem</p>"; ?>

    <form action="" method="POST">
        <p>ID do produto que deseja editar:</p>
        <input type="number" name="id" required placeholder="Ex: 4">
        
        <p>Novo nome do produto:</p>
        <input type="text" name="nomeProduto" required>
        
        <p>Novo preço do produto:</p>
        <input type="number" step="0.01" name="precoProduto" required>
        
        <br><br>
        <button type="submit" class="btn btn-editar">Salvar Alterações</button>
    </form>

    <br>
    <button type="button" onclick="window.location.href='listarProduto.php'" class="btn btn-voltar">
        Voltar para a Lista
    </button>
</body>
</html>
