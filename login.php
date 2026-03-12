<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max Estoque - Login</title>
    <style>
        body { background-color: black; color: white; font-family: Cambria, serif; text-align: center; }
        h1, h2{color: white; font-family: Cambria, serif; text-align: center;}
        form { display: inline-block; text-align: left; background: #111; padding: 20px; border: 1px solid #333; border-radius: 8px; }
        input { padding: 8px; width: 250px; margin-bottom: 10px; }
        button { background-color: #444; color: white; margin-top: 20px; }
    </style>
</head>
<body>
    <h1>Max Estoque</h1>
    <h2>Login</h2>
    <form action="login.php" method="post">
        <p>Digite seu email:</p>
        <input type="name" name="email" placeholder="email">
        <p>Digite sua senha:</p>
        <input type="password" name="senha" placeholder="senha"><br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>

<script>
    //Função para futura implementação de autenticação via AJAX (sem recarregar a página).
    function avancar(){
        fetch("login.php",{
            method: "POST",
            body: new FormData(form)}).then(res => res.text()).then(resposta => {
    if(resposta === "ok") {
        window.location.href = "interfacePrincipal.php";
    }}); "";
    }
</script>

<?php
session_start();

$email=$_POST['email'] ?? null;
$senha=$_POST['senha'] ?? null;

if($email && $senha){
    try{
        // Tratamento de Exceções: Captura erros de conexão com o PDO sem expor detalhes sensíveis da infraestrutura para o usuário final.
        $pdo = new PDO('mysql:host=localhost;dbname=distribuidora', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $pdo->prepare('SELECT id, email, senha FROM Funcionarios WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // password_verify: Compara a senha digitada com o hash criptografado no banco. Isso garante segurança mesmo que o banco de dados seja comprometido.
        if ($user && password_verify($senha, $user['senha'])) {
            echo('Senha valida');
            // session_regenerate_id: Gera um novo ID de sessão após o login. prática essencial para prevenir ataques de Session Fixation.
            session_regenerate_id(true);
            $_SESSION['usuario_id'] = $user['id'];
            header('Location: interfacePrincipal.php');
            exit();
        } else {
            echo('Email ou senha inválida');
        }
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        exit();
    }
} else {
    
}
?>
