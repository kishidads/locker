<?php

require_once 'session.php';

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armários</title>
    <style>
        
    </style>
</head>
<body>
    <h1>Tela de armários</h1>

    <p><?php echo "olá, {$_SESSION['nome']}" ?></p>

    <form action="../../controller/AuthenticationController.php" method="POST">
        <button type='submit' name='sair'>Sair</button>
    </form>
</body>
</html>