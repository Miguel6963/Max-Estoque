<?php
session_start();
// Proteção de Rota: Se não houver sessão ativa, redireciona para o login.
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max Estoque</title>
    <style>
        body{background-color: black;}
        .prompt{display: inline-block; text-align: center; background: #111; padding: 20px; border: 1px solid #333; border-radius: 8px;}
        h1{color: white; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;}
        button{ background-color: #444; color: white; margin-top: 20px; text-align: center;}
    </style>
</head>
<body>
    <h1>Max Estoque</h1>
<div class="prompt">
        <button onclick="irParaCadastrarProduto()">Cadastrar Produto</button><br>
        <button onclick="irParaListarProdutos()">Listar Produto</button><br>
        <button onclick="irParaDeletarProdutos()">Deletar Produto</button><br>
        <button onclick="irParaEditarProdutos()">Editar Produto</button><br>
        <button onclick="irParaBuscarProdutos()">Buscar Produto</button>
</div>
</body>
</html>

<script>
    //Roteamento via Client-side:
    //Funções que gerenciam a navegação entre os arquivos PHP do sistema.
    //Mantém a lógica de cada operação em arquivos separados para facilitar a manutenção.
function irParaCadastrarProduto(){
    window.location.href="cadastrarProduto.php";
}
function irParaListarProdutos(){
    window.location.href="listarProduto.php";
}
function irParaDeletarProdutos(){
    window.location.href="deletarProduto.php";
}
function irParaEditarProdutos(){
    window.location.href="editarProduto.php";
}
function irParaBuscarProdutos(){
    window.location.href="buscarProduto.php";
}
</script>
