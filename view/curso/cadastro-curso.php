<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de curso</title>

    <link rel="stylesheet" href="public/assets/css/style.css">
</head>
<body>
    <?php include "public/header.php" ?>

    <fieldset>
        <legend>Cadastro de curso</legend>
        <form action="/cadastro-curso" method="POST">

            <label for="codigoCurso">Código do curso</label>
            <input type="text" name="codigoCurso" id="codigoCurso" required>

            <label for="nome">Nome do curso</label>
            <input type="text" name="nome" id="nome" required>
            
            <label for="duracao">Duração em semestres</label>
            <input type="number" name="duracao" id="duracao" min="1" max="8" required>

            <button type="submit" name="cadastrar">Cadastrar</button>
        </form>
    </fieldset>

    <?php include "public/footer.html" ?>
</body>
</html>