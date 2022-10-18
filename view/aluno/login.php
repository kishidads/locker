<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link rel="stylesheet" href="public/assets/css/style.css">
</head>
<body>
    <?php include "public/header.php" ?>
    <fieldset>
        <legend>Login</legend>
        <form action="/login" method="POST">

            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf" required>

            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" required>
        
            <button type="submit" name="entrar">Entrar</button>

        </form>
    </fieldset>
    <?php include "public/footer.html" ?>
</body>
</html>