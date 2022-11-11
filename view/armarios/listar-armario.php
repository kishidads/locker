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

    <section class="armarios">
        <div class="section-header">
            <h1>Armários</h1>
            <button class="register-button modal-button">Adicionar</button>
            <dialog>
                <div class='dialog-div'>
                    <h2>Cadastrar</h2>
                    <form action='/cadastro-armario' method='POST'>
                        <fieldset>
                            <legend>Adicionar</legend>

                            <label for="secao">Seção</label>
                            <input type="text" name="secao" id="secao" required>

                            <label for="quantidade">Quantidade</label>
                            <input type="number" name="quantidade" id="quantidade" min="1" max="20" value="20" required>
                                
                            <label for="local">Local</label>
                            <input list="locais" id="local" name="local">
                            <datalist id="locais" required>
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
                            </datalist>
                            
                            <label for="andar">Andar</label>
                            <input list="andares" id="andar" name="andar">
                            <datalist id="andares" required>
                                <?php
                                if ($andares) {
                                    foreach ($andares as $andar) {
                                        $dom = new DOMDocument();

                                        $option = $dom->createElement("option", "{$andar->getAndar()}");

                                        $option->setAttribute("value", "{$andar->getAndar()}");

                                        $dom->appendChild($option);

                                        echo "{$dom->saveHTML()}";
                                    }
                                }
                                ?>
                            </datalist>
                            
                            <label for="situacao">Situação</label>
                            <input list="situacoes" id="situacao" name="situacao">
                            <datalist id="situacoes" required>
                                <?php
                                if ($situacoes) {
                                    foreach ($situacoes as $situacao) {
                                        $dom = new DOMDocument();

                                        $option = $dom->createElement("option", "{$situacao->getSituacao()}");

                                        $option->setAttribute("value", "{$situacao->getSituacao()}");

                                        $dom->appendChild($option);

                                        echo "{$dom->saveHTML()}";
                                    }
                                }
                                ?>
                            </datalist>

                            <div>
                                <button class='confirmar' type='submit' name='cadastrar'>Confirmar</button>
                                <button class='close'>Cancelar</button>
                            </div>

                        </fieldset>
                    </form>
                </div>
            </dialog>
        </div>
        <div class="table-wrapper">
            <table>
                <thead>
                <tr>
                    <th>Seção + Número</th>
                    <th>Localização</th>
                    <th>Andar</th>
                    <th>Situação</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
                </thead>
                <tbody>
                    <?php 

                        if (isset($armarios)) {
                
                            foreach ($armarios as $armario) {

                                echo
                                    "<tr>
                                        <td>{$armario->getSecao()}{$armario->getNumero()}</td>
                                        <td>{$armario->getLocal()}</td>
                                        <td>{$armario->getAndar()}</td>
                                        <td>{$armario->getSituacao()}</td>
                                        <td>
                                            <button class='alterar modal-button'>Alterar</button>
                                        </td>
                                        <td>
                                            <form action='/excluir-armario' method='POST'>
                                                <input type='hidden' name='id' value='{$armario->getId()}'>
                                                <button class='excluir' type='submit' name='excluir'>X</button>
                                            </form>
                                        </td>
                                        <dialog>
                                        <div class='dialog-div'>
                                            <h2>Editar</h2>
                                            <form action='/alterar-armario' method='POST'>
                                                <fieldset>
                                                    <legend>Editar</legend>

                                                    <input type='hidden' name='id' value='{$armario->getId()}'>

                                                    <label for='secao'>Seção</label>
                                                    <input type='text' name='secao' id='secao' value='{$armario->getSecao()}'>

                                                    <label for='numero'>Número</label>
                                                    <input type='numero' name='numero' id='numero' value='{$armario->getNumero()}'>

                                                    <label for='local'>Localização</label>
                                                    <input type='text' name='local' id='local' value='{$armario->getLocal()}'>

                                                    <label for='situacao'>Situação</label>
                                                    <input type='text' name='situacao' id='situacao' value='{$armario->getSituacao()}'>

                                                    <label for='andar'>Piso</label>
                                                    <input type='text' name='andar' id='andar' value='{$armario->getAndar()}'>

                                                    <div>
                                                        <button class='confirmar' type='submit' name='alterar'>Confirmar</button>
                                                        <button class='close'>Cancelar</button>
                                                    </div>

                                                </fieldset>
                                            </form>
                                        </div>
                                        </dialog>
                                    </tr>";

                            }

                        }
                        
                    ?>
                </tbody>
            </table>
        </div>
    </section>

    <?php include "public/footer.html" ?>
    <script>

        const button = document.querySelectorAll(".modal-button");
        const modal = document.querySelectorAll("dialog");
        const buttonClose = document.querySelectorAll(".close");

        for (let i = 0; i < button.length; i++) {         
              
            button[i].onclick = function() {
                modal[i].showModal();
            }

            buttonClose[i].onclick = function() {
                modal[i].close();
            }

            modal[i].onclick = function() {
                let rect = modal[i].getBoundingClientRect();
                let isInDialog = (rect.top <= event.clientY && event.clientY <= rect.top + rect.height && rect.left <= event.clientX && event.clientX <= rect.left + rect.width);
                if (!isInDialog) {
                    modal[i].close();
                }
            }

        }

    </script>
</body>
</html>