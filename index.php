<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max Estoque</title>
    <style>
        body{ background-color: black; color: white; font-family: Cambria, serif; text-align: center; }
        h1{color: white; font-family: Cambria, serif; text-align: center;}
        button{ background-color: #444; color: white; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Max Estoque</h1>
        <button onclick="irParaLogin()">Login</button><br>
        <button onclick="irParaCadastro()">Cadastro</button>
</body>
</html>

<script>
//Funções de redirecionamento: Utilizam o objeto window.location para alterar a URL atual e navegar entre os módulos do sistema.
function irParaLogin() {
    window.location.href="login.php";
}
function irParaCadastro(){
    window.location.href="cadastro.php";
}
</script>
