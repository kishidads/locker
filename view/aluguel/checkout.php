<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Revisão</title>

    <link rel="stylesheet" href="public/assets/css/style.css">
</head>
<body>
    <?php include "public/header.php" ?>

    <section class="login">
        <div class="login-header">
            <h1>Checkout</h1>
        </div>
        <div class="login-wrapper">
            <h2>Revise sua solicitação e escolha um plano de aluguel.</h2>

            <fieldset class="revisao">
                <legend>Revisão</legend>

                <div class="revisao">        
                    <div class="armario"><?php echo "{$armario->getSecao()}{$armario->getNumero()}"?></div>

                    <div class="resumo">
                        <p>Armário selecionado: <?php echo "{$armario->getSecao()}{$armario->getNumero()}"?></p>
                        <p>Localização: <?php echo $armario->getLocal()?></p>
                        <p>Piso <?php echo $armario->getAndar()?></p>
                    </div>
                </div>
            </fieldset>

            <form action="/reserva" method="POST">
                <fieldset>
                    <legend>Revisão</legend>

                    <input type="hidden" name="armario" value=<?php echo "{$armario->getId()}"?>>

                    <div class="planos">
                        <?php
                        if (isset($planos)) {
                            foreach ($planos as $plano) {
                                $valor = number_format($plano->getValor(), 2, ',');

                                if ($plano->getStatus() == true) {
                                    $dom = new DOMDocument();

                                    $input = $dom->createElement("input");
                                    
                                    $input->setAttribute("type", "radio");
                                    $input->setAttribute("name", "plano");
                                    $input->setAttribute("id", "{$plano->getPlano()}");
                                    $input->setAttribute("value", "{$plano->getId()}");
                                    $input->setAttribute("required", "required");
                                    
                                    $dom->appendChild($input);

                                    $label = $dom->createElement("label", "Plano {$plano->getPlano()}");

                                    $label->setAttribute("for", "{$plano->getPlano()}");

                                    $dom->appendChild($label);

                                    $label = $dom->createElement("label", "R$ {$valor}");

                                    $label->setAttribute("for", "{$plano->getPlano()}");

                                    $dom->appendChild($label);
                                    
                                    echo "<div class='plano' tabindex='-1'>{$dom->saveHTML()}</div>";
                                }
                            }
                        }
                        ?>
                    </div>
                    
                    <button type="submit" name="confirmar">Confirmar</button>

                </fieldset>
            </form>
        </div>
    </section>

    <?php include "public/footer.html" ?>
</body>
</html>