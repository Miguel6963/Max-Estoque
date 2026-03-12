<?php
/*
 * Interface de processamento para cadastro de produtos.
 * Este arquivo recebe os dados via POST, instancia a classe Produto 
 * e executa a persistência no banco de dados.
 */

//Verifica se a requisição veio de um formulário(POST)
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once 'produto.php';

    // Captura os dados usando o operador null coalesce para evitar erros de índice indefinido
    $nomeProduto = $_POST['nomeProduto'] ?? null;
    $descricaoProduto = $_POST['descricaoProduto'] ?? null;
    $precoProduto = $_POST['precoProduto'] ?? null;
    $quantidade = $_POST['quantidade'] ?? null;

    if ($nomeProduto && $precoProduto !== null && $quantidade !== null){
        // Instancia o objeto da camada de modelo(Model)
        $produto = new Produto($nomeProduto, $descricaoProduto, $precoProduto, $quantidade);
        // Chama o método da classe e trata o retorno(sucesso ou falha)
        if($produto->cadastrar($nomeProduto, $descricaoProduto, $precoProduto, $quantidade)){
            echo "<p>Produto cadastrado com sucesso!</p>";
        }else{
            echo "<p>Cadastro falhou</p>";
        }
    } else {
        echo "<p>Preencha todos os campos</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max Estoque</title>
    <style>
        body{ background-color: black; color: white; font-family: Cambria, serif; text-align: center; }
        h1, h2{color: white; font-family: Cambria, serif; text-align: center;}
        form{ display: inline-block; text-align: left; background: #111; padding: 20px; border: 1px solid #333; border-radius: 8px; }
        input{ padding: 8px; width: 250px; margin-bottom: 10px; }
        button{ background-color: #444; color: white; margin-top: 20px; }
    </style>
</head>
<body>

    <h1>Max Estoque</h1>
    <h2>Cadastrar Produto</h2>

    <form action="cadastrarProduto.php" method="POST">
        <p>Nome do produto:</p>
<!--Sanitização de dados: protege a aplicação contra ataques de XSS (Cross-Site Scripting). Convertendo caracteres especiais em entidades HTML seguras para exibição.-->
        <input type="text" name="nomeProduto" value="<?php echo isset($_POST['nomeProduto']) ? htmlspecialchars($_POST['nomeProduto']) : ''; ?>">
        
        <p>Descrição do produto:</p>
        <input type="text" name="descricaoProduto" value="<?php echo isset($_POST['descricaoProduto']) ? htmlspecialchars($_POST['descricaoProduto']) : ''; ?>">
        
        <p>Preço do produto:</p>
        <input type="number" step="0.01" name="precoProduto" value="<?php echo isset($_POST['precoProduto']) ? htmlspecialchars($_POST['precoProduto']) : ''; ?>">
        
        <p>Quantidade:</p>
        <input type="number" name="quantidade" value="<?php echo isset($_POST['quantidade']) ? htmlspecialchars($_POST['quantidade']) : ''; ?>">
        
        <br><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
