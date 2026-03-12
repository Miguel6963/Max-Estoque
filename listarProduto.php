<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max Estoque - Listar</title>
    <style>
        body{
            background-color: black;
            color: white;
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }
        h1{
            color: white;
            text-align: center;
        }
        table{
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse; /* Cleaner table borders */
            color: white;
        }
        th, td{
            border: 1px solid white;
            padding: 10px;
            text-align: left;
        }
        th{
            background-color: #333;
        }
    </style>
</head>
<body>
    <table border="1">
    <tr>
        <!--Estrutura de tabela para exibição organizada dos dados do estoque.-->
        <th>ID</th>
        <th>Nome</th>
        <th>descrição</th>
        <th>Preço</th>
        <th>Quantidade</th>
    </tr>

<?php
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING); // mostra erros graves, mas esconde notices/warnings
?>

<?php
//Chama o método listar da classe Produto para recuperar todos os registros do banco.
    require_once "produto.php";

    $produto = new Produto();
    $produtos = $produto->listar();
?>
<?php 
//Itera sobre o array de resultados, criando uma nova linha (TR) para cada produto encontrado.
foreach($produtos as $p): 
?>
<tr>
    <td><?= $p['id'] ?></td>
    <td><?= $p['nomeProduto'] ?></td>
    <td><?= $p['descricaoProduto'] ?></td>
    <td><?= $p['precoProduto'] ?></td>
    <td><?= $p['quantidade'] ?></td>
</tr>
<?php endforeach; ?>

</table>
</body>
</html>

