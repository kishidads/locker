<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armários</title>
    <style>
        .grid-container {
            width: 50%;
            display: grid;
            grid-template-columns: auto auto auto auto;
        }

        .grid-item {
            background: url('../../public/img/locker.svg');
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
    <h1>Tela de armários</h1>

    <p><?php echo "olá, {$_SESSION['nome']}" ?></p>

    <form action="/login" method="POST">
        <button type='submit' name='sair'>Sair</button>
    </form>

    <fieldset>

    <legend>Cadastro de armários</legend>

    <form action="/armarios" method="POST">
        
        <label for="proximidade">Proximidade</label>
        <select name="proximidade" id="proximidade" required onchange="if(this.value != 0) { this.form.submit(); }">
            <option value="">--Selecione uma opção--</option>
            <option value="administracao">Corredor Administração</option>
            <option value="quimica">Corredor Química</option>
            <option value="nutricao">Corredor Nutrição</option>
        </select>
        <input type='hidden' name='listar' value='listar'>

    </fieldset>

    </form>

    <div class="grid-container">
        
        <?php if (isset($_POST['listar'])) {
            foreach ($armarios as $armario) {
                echo "<div class='grid-item'>
                {$armario->getSecao()}{$armario->getNumero()}
                </div>";
            }
        } ?>

    </div>

</body>
</html>