<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alunos</title>

    <link rel="stylesheet" href="../../public/assets/css/style.css">
</head>
<body>
    <?php include "public/adm-header.php" ?>

    <section class="alunos">
    <div class="section-header">
            <h1>Alunos</h1>
            <button class="register-button modal-button">Adicionar</button>
            <dialog>
                <div class='dialog-div'>
                    <h2>Cadastrar</h2>
                    <form action='/adm/dashboard/cadastro-aluno' method='POST'>
                        <fieldset>
                            <legend>Adicionar</legend>

                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" required>

                            <label for="sobrenome">Sobrenome</label>
                            <input type="text" name="sobrenome" id="sobrenome" required>

                            <label for="telefone">Telefone</label>
                            <input type="tel" name="telefone" id="telefone" required>

                            <label for="rm">RM</label>
                            <input type="number" name="rm" id="rm" required>

                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" required>

                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" id="cpf" required>

                            <label for="senha">Senha</label>
                            <input type="password" name="senha" id="senha" required>

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
                                            <form action='/adm/dashboard/excluir-aluno' method='POST'>
                                                <input type='hidden' name='id' value='{$aluno->getId()}'>
                                                <button class='excluir' type='submit' name='excluir'>X</button>
                                            </form>
                                        </td>
                                        <dialog>
                                        <div class='dialog-div'>
                                            <h2>Editar</h2>
                                            <form action='/adm/dashboard/alterar-aluno' method='POST'>
                                                <fieldset>
                                                    <legend>Editar</legend>

                                                    <input type='hidden' name='id' value='{$aluno->getId()}'>

                                                    <label for='{$aluno->getId()}_nome'>Nome</label>
                                                    <input type='text' name='nome' id='{$aluno->getId()}_nome' value='{$aluno->getNome()}'>

                                                    <label for='{$aluno->getId()}_sobrenome'>Sobrenome</label>
                                                    <input type='text' name='sobrenome' id='{$aluno->getId()}_sobrenome' value='{$aluno->getSobrenome()}'>

                                                    <label for='{$aluno->getId()}_cpf'>CPF</label>
                                                    <input type='text' name='cpf' id='{$aluno->getId()}_cpf' value='{$aluno->getCpf()}'>

                                                    <label for='{$aluno->getId()}_rm'>RM</label>
                                                    <input type='text' name='rm' id='{$aluno->getId()}_rm' value='{$aluno->getRm()}'>
                                                    
                                                    <label for='{$aluno->getId()}_email'>E-mail</label>
                                                    <input type='text' name='email' id='{$aluno->getId()}_email' value='{$aluno->getEmail()}'>

                                                    <label for='{$aluno->getId()}_senha'>Senha</label>
                                                    <input type='password' name='senha' id='{$aluno->getId()}_senha' value='{$aluno->getSenha()}'>
                                                    
                                                    <label for='{$aluno->getId()}_telefone'>Telefone</label>
                                                    <input type='text' name='telefone' id='{$aluno->getId()}_telefone' value='{$aluno->getTelefone()}'>
                                                    
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