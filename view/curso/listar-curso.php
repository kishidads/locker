<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>

    <link rel="stylesheet" href="public/assets/css/style.css">
</head>
<body>
    <?php include "public/header.php" ?>

    <section class="cursos">
        <div class="cursos-header">
            <h1>Cursos</h1>
        </div>
        <div class="table-wrapper">
            <table>
                <thead>
                <tr>
                    <th>Código do curso</th>
                    <th>Nome do curso</th>
                    <th>Duração em semestres</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
                </thead>
                <tbody>
                    <?php 

                        if (isset($cursos)) {
                
                            foreach ($cursos as $curso) {

                                echo
                                    "<tr>
                                        <td>{$curso->getCodigoCurso()}</td>
                                        <td>{$curso->getNome()}</td>
                                        <td>{$curso->getDuracao()}</td>
                                        <td>
                                            <button class='alterar modal-button'>Alterar</button>
                                        </td>
                                        <td>
                                            <form action='/excluir-curso' method='POST'>
                                                <input type='hidden' name='id' value='{$curso->getId()}'>
                                                <button class='excluir' type='submit' name='excluir'>X</button>
                                            </form>
                                        </td>
                                        <dialog>
                                        <div class='dialog-div'>
                                            <h2>Editar</h2>
                                            <form action='/alterar-curso' method='POST'>
                                                <fieldset>
                                                    <legend>Editar</legend>

                                                    <input type='hidden' name='id' value='{$curso->getId()}'>

                                                    <label for='codigo_curso'>Código deo curso</label>
                                                    <input type='text' name='codigo_curso' id='codigo_curso' value='{$curso->getCodigoCurso()}'>

                                                    <label for='nome'>Nome do curso</label>
                                                    <input type='text' name='nome' id='nome' value='{$curso->getNome()}'>

                                                    <label for='duracao'>Duração em semestres</label>
                                                    <input type='text' name='duracao' id='duracao' value='{$curso->getDuracao()}'>

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