<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos</title>

    <link rel="stylesheet" href="public/assets/css/style.css">
</head>
<body>
    <?php include "public/header.php" ?>

    <section class="alunos">
        <div class="section-header">
            <h1>Alunos</h1>
            <button class="register-button">Adicionar</button>
        </div>
        <div class="table-wrapper">
            <table>
                <thead>
                <tr>
                    <th>Nome</th>
                    <th>Sobrenome</th>
                    <th>RM</th>
                    <th>CPF</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
                </thead>
                <tbody>
                    <?php 

                        if (isset($alunos)) {
                
                            foreach ($alunos as $aluno) {

                                echo
                                    "<tr>
                                        <td>{$aluno->getNome()}</td>
                                        <td>{$aluno->getSobrenome()}</td>
                                        <td>{$aluno->getRm()}</td>
                                        <td>{$aluno->getCPF()}</td>
                                        <td>{$aluno->getEmail()}</td>
                                        <td>{$aluno->getTelefone()}</td>
                                        <td>
                                            <button class='alterar modal-button'>Alterar</button>
                                        </td>
                                        <td>
                                            <form action='/excluir-aluno' method='POST'>
                                                <input type='hidden' name='id' value='{$aluno->getId()}'>
                                                <button class='excluir' type='submit' name='excluir'>X</button>
                                            </form>
                                        </td>
                                        <dialog>
                                        <div class='dialog-div'>
                                            <h2>Editar</h2>
                                            <form action='/alterar-aluno' method='POST'>
                                                <fieldset>
                                                    <legend>Editar</legend>

                                                    <input type='hidden' name='id' value='{$aluno->getId()}'>

                                                    <label for='nome'>Nome</label>
                                                    <input type='text' name='nome' id='nome' value='{$aluno->getNome()}'>

                                                    <label for='sobrenome'>Sobrenome</label>
                                                    <input type='text' name='sobrenome' id='sobrenome' value='{$aluno->getSobrenome()}'>

                                                    <label for='cpf'>CPF</label>
                                                    <input type='text' name='cpf' id='cpf' value='{$aluno->getCpf()}'>

                                                    <label for='rm'>CPF</label>
                                                    <input type='text' name='rm' id='rm' value='{$aluno->getRm()}'>
                                                    
                                                    <label for='email'>E-mail</label>
                                                    <input type='text' name='email' id='email' value='{$aluno->getEmail()}'>
                                                    
                                                    <label for='telefone'>Telefone</label>
                                                    <input type='text' name='telefone' id='telefone' value='{$aluno->getTelefone()}'>
                                                    
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