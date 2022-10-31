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

    <section class="login">
        <div class="login-header">
            <h1>Cadastrar</h1>
        </div>
        <div class="login-wrapper">
            <h2>Inscreva-se para reservar um armário</h2>
            <form action="/cadastro" method="POST">
                <fieldset>
                    <legend>Cadastro</legend>

                    <label for="nome">Nome</label>
                    <input type="text" name="nome" id="nome" required>

                    <label for="sobrenome">Sobrenome</label>
                    <input type="text" name="sobrenome" id="sobrenome" required>

                    <label for="telefone">Telefone</label>
                    <input type="tel" name="telefone" id="telefone" required>

                    <label for="rm">RM</label>
                    <input type="number" name="rm" id="rm" required>

                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" required>

                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" id="cpf" required>

                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" required>
                
                    <button type="submit" name="cadastrar">Cadastrar</button>

                </fieldset>
            </form>
        </div>
    </section>

    <?php include "public/footer.html" ?>
</body>
</html>