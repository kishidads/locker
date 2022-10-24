<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de armários</title>

    <link rel="stylesheet" href="public/assets/css/style.css">
</head>
<body>
    <?php include "public/header.php" ?>

    <fieldset>
        <legend>Cadastro de armários</legend>
        <form action="/cadastro-armarios" method="POST">

            <label for="secao">Seção</label>
            <input type="text" name="secao" id="secao" required>

            <label for="quantidade">Quantidade</label>
            <input type="number" name="quantidade" id="quantidade" min="1" max="20" value="1" required>

            <label for="local">Proximidade</label>
            <select name="local" id="local" required>
                <option value="administracao">Corredor Administração</option>
                <option value="quimica">Corredor Química</option>
                <option value="nutricao">Corredor Nutrição</option>
            </select>
            
            <label for="andar">Andar</label>
            <select name="andar" id="andar" required>
                <option value=0>Inferior</option>
                <option value=1>Superior</option>
            </select>

            <label for="situacao">Situação</label>
            <select name="situacao" id="situacao" required>
                <option value="disponivel">Disponível</option>
                <option value="indisponivel">Indisponível</option>
                <option value="alugado">Alugado</option>
            </select>

            <button type="submit" name="cadastrar">Cadastrar</button>
        </form>
    </fieldset>

    <?php include "public/footer.html" ?>
</body>
</html>