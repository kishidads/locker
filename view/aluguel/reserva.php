<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva</title>

    <link rel="stylesheet" href="public/assets/css/style.css">
</head>
<body>
    <?php include "public/header.php" ?>
    <section class="login">
        <div class="login-header">
            <h1>Pedido</h1>
        </div>
        <div class="login-wrapper">
            <?php
            
            foreach ($msgs as $msg) {
                echo "<h2>{$msg}</h2>";
            }

            ?>

                    
<!--             <button type="submit" name="confirmar">Voltar</button>
 -->        </div>
    </section>

    <?php include "public/footer.html" ?>
</body>
</html>