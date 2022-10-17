<?php

include('controller/ConfEmail.php');







 $verify = new ConfEmail();
 $verify->confirmarPurl();
 $resultado = $verify->validarEmail();



   

?>

 <!DOCTYPE html>

 <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Confirmar email</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    </head>

    
    <body>


    <?php   echo $resultado; ?>
    
    </body>
 </html>


