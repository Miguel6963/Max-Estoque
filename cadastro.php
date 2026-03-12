<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max Estoque</title>
    <style>
        body { background-color: black; color: white; font-family: Cambria, serif; text-align: center; }
        h1, h2, p{color: white; font-family: Cambria, serif; text-align: center;}
        form { display: inline-block; text-align: left; background: #111; padding: 20px; border: 1px solid #333; border-radius: 8px; }
        input { padding: 8px; width: 250px; margin-bottom: 10px; }
        button { background-color: #444; color: white; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Max Estoque</h1>
    <h2>Cadastro</h2>
    <form action="cadastro.php" method="post">
        <p>Digite seu email:</p>
        <input type="text" name="email" placeholder="email">
        <p>Digite sua senha:</p>
        <input type="password" name="senha" placeholder="senha"><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>

<?php
session_start();

$email = $_POST['email'] ?? null;
$senha = $_POST['senha'] ?? null;

if($email && $senha){
    $pdo = new PDO("mysql:host=localhost;dbname=distribuidora", "root", "");
    //Criptografia de Senha: Gerando um hash seguro (bcrypt por padrão) para que a senha real nunca seja armazenada no banco de dados, seguindo normas de segurança.
    $hash = password_hash($senha, PASSWORD_DEFAULT);
    
    $stmt = $pdo->prepare("INSERT INTO funcionarios (email, senha) VALUES (?, ?)");
    $stmt->execute([$email, $hash]);
    
    // Inicia a sessão do usuário recém-cadastrado para permitir o acesso às áreas restritas sem a necessidade de novo login imediato.
    $_SESSION['usuario_id'] = $pdo->lastInsertId();
    
    header("Location: interfacePrincipal.html");
    exit();
}else{
    echo "Preencha todos os campos!";
}
?>
