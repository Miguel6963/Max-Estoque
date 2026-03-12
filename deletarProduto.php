<?php
//Lógica PHP primeiro(para processar o POST)
// Camada de Controle: Intermedia a requisição de exclusão do usuário com o Banco de Dados.
// A exclusão é baseada no ID (Chave Primária) para evitar a remoção de múltiplos registros por erro.
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once "produto.php";

    $id = $_POST['id'] ?? null;

    if ($id) {
        // Agora que o construtor é opcional, não precisamos passar nada no 'new'
        $produto = new Produto();

        if ($produto->deletar($id)) {
            $mensagem = "Produto ID $id deletado com sucesso!";
        } else {
            $mensagem = "Não foi possível deletar o produto.";
        }
    } else {
        $mensagem = "Por favor, digite um ID válido.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max Estoque - Excluir</title>
    <style>
        body{ background-color: black; color: white; font-family: Cambria, serif; text-align: center; }
        form{ display: inline-block; text-align: left; background: #111; padding: 20px; border: 1px solid #333; border-radius: 8px; }
        input{ padding: 8px; width: 250px; margin-bottom: 10px; }
        button{ background-color: #444; color: white; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Excluir Produto</h1>
    
    <?php if(isset($mensagem)) echo "<p><strong>$mensagem</strong></p>"; ?>

    <!--Recebe o ID via POST e solicita à classe Produto a remoção definitiva do registro no banco de dados.-->
    <form action="" method="POST"> <p>Digite o ID do produto que deseja excluir:</p>
        <input type="number" name="id" required>
        <br>
        <button type="submit">Confirmar Exclusão</button>
    </form>
    
    <br>
    <button type="button" onclick="window.location.href='listarProduto.php'">Voltar para a Lista</button>
</body>
</html>
