<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armários</title>

    <link rel="stylesheet" href="public/assets/css/style.css">
    <link rel="stylesheet" href="public/assets/css/lockers-section.css">
</head>
<body>
    <?php include "public/header.php" ?>
    
    <section class="lockers">
        <div class="section-header">
            <h1>Armários</h1>

            <form action="/armarios" method="GET">
                <label for="local">Local</label>

                <select name="local" id="local" required onchange="if(this.value != 0) { this.form.submit(); }">
                    <option value="">--Selecione uma localização--</option>
                    <?php
                    if ($locais) {
                        foreach ($locais as $local) {
                            $dom = new DOMDocument();

                            $option = $dom->createElement("option", "{$local->getLocal()}");

                            $option->setAttribute("value", "{$local->getLocal()}");

                            $dom->appendChild($option);

                            echo "{$dom->saveHTML()}";
                        }
                    }
                    ?>
                </select>

                <input type='hidden' name='listar' value='listar' require>
            </form>
        </div>

        <div class="lockers-grid-container">
            <div class="lockers-grid">
                <?php
                if (isset($_GET['listar']) && $armarios) {
                    
                    $secao = $armarios[0]->getSecao();

                    foreach ($armarios as $armario) {

                        if ($secao != $armario->getSecao()) {

                            echo "</div>";
                            echo "<div class='lockers-grid'>";

                            $secao = $armario->getSecao();

                        }

                        $dom = new DOMDocument();

                        $div = $dom->createElement("div", "{$armario->getSecao()}{$armario->getNumero()}");
                        $div->setAttribute("class", "grid-item {$armario->getSituacao()}");
                        $dom->appendChild($div);
                        echo $dom->saveHTML();
                    }
                }
                ?>
            </div>
        </div>

        <form class="reserve-form" action="/checkout" method="POST">
            <input id="reserve" type="hidden" name="selecionado">
            <button id="button" name="avancar">Avançar</button>
        </form>
    </section>
    
    <?php include "public/footer.html" ?>

    <script>
        const div = document.querySelectorAll(".disponível");
        const input = document.querySelector("#reserve");
        const button = document.querySelector("#button");

        console.log(button);

        button.disabled = true;

        for (let i = 0; i < div.length; i++) {         
              
            div[i].onclick = function() {

                div.forEach(div => {
                    div.classList.remove("selected");
                });

                div[i].classList.add("selected");

                input.value = div[i].innerHTML;

                button.disabled = false;

            }

        }
    </script>
</body>
</html>