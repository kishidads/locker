<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link rel="stylesheet" href="../public/assets/css/style.css">
</head>
<body>
    <?php include "public/adm-header.php" ?>

    <section class="login">
        <div class="login-header">
            <h1>Entrar</h1>
        </div>
        <div class="login-wrapper">
            <h2>Acesso de funcionários</h2>
            <form action="/adm/login" method="POST">
                <fieldset>
                    <legend>Login</legend>

                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" required>

                    <label for="senha">Senha</label>
                    <input type="password" name="senha" id="senha" required>
                
                    <button type="submit" name="entrar">Entrar</button>

                </fieldset>
            </form>
        </div>
    </section>

    <?php include "public/footer.html" ?>
</body>
</html>