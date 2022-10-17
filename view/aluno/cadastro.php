<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>

    <link rel="stylesheet" href="public/assets/css/style.css">
</head>
<body>
    <?php include "public/header.php" ?>
    <fieldset>
        <legend>Cadastro de aluno</legend>
        <form action="/cadastro" method="POST">

            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" required>

            <label for="sobrenome">Sobrenome</label>
            <input type="text" name="sobrenome" id="sobrenome" required>

            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone" required>

            <label for="rm">RM</label>
            <input type="number" name="rm" id="rm" required>

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required>

            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf" required>

            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" required>
        
            <button type="submit" name="cadastrar">Cadastrar</button>

        </form>
    </fieldset>
    <?php include "public/footer.html" ?>
</body>
</html>