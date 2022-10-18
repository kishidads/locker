<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armários</title>

    <link rel="stylesheet" href="public/assets/css/style.css">
</head>
<body>
    <?php include "public/header.php" ?>
    
    <div class="lockers-section">
        <div class="lockers-header">
            <h1>Disponibilidade de Armários</h1>
        </div>
        <form action="/armarios" method="POST">
            <label for="local">Local:</label>
            <select name="local" id="local" required onchange="if(this.value != 0) { this.form.submit(); }">
                <option value="">--Selecione uma opção--</option>
                <option value="administracao">Corredor Administração</option>
                <option value="quimica">Corredor Química</option>
                <option value="nutricao">Corredor Nutrição</option>
            </select>
            <input type='hidden' name='listar' value='listar'>
        </form>
        <div class="lockers-grid-container">
            <div class="lockers-grid">
                <?php
                if (isset($_POST['listar']) && $armarios) {
                    
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
    </div>
    
    <?php include "public/footer.html" ?>               
    <script src="script.js"></script>
</body>
</html>