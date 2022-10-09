<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        fieldset {
            width: 20rem
        }

        fieldset > form {
            display: flex;
            flex-direction: column
        }

        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type='number'] {
            -moz-appearance:textfield;
        }
    </style>
</head>
<body>
    <fieldset>
        <legend>Login</legend>
        <form action="../../controller/AuthenticationController.php" method="POST">

            <label for="cpf">CPF</label>
            <input type="text" name="cpf" id="cpf" required>

            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" required>
        
            <button type="submit" name="entrar">Entrar</button>

        </form>
    </fieldset>
</body>
</html>