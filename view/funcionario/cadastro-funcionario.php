<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de funcionário</title>

    <link rel="stylesheet" href="public/assets/css/style.css">
</head>
<body>
    <?php include "public/header.php" ?>
    <h1>Cadastro de funcionário</h1>
    <fieldset>
        <legend>Cadastro de funcionário</legend>
        <form action="/cadastro-funcionario" method="POST">

            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" required>

            <label for="sobrenome">Sobrenome</label>
            <input type="text" name="sobrenome" id="sobrenome" required>

            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone" required>

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required>
            
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf" required>
            
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" required>
            
            <label for="funcao">Função</label>
            <input type="text" name="funcao" id="funcao" required>

            <label for="privilegio">Privilégio</label>
            <input type="text" name="privilegio" id="privilegio" required>

            <button type="submit" name="cadastrar">Cadastrar</button>
        </form>
    </fieldset>
    <?php include "public/footer.html" ?>
</body>
</html>