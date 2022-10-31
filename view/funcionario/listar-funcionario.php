<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcionários</title>

    <link rel="stylesheet" href="public/assets/css/style.css">
</head>
<body>
    <?php include "public/header.php" ?>

    <section class="funcionarios">
        <div class="section-header">
            <h1>Funcionários</h1>
            <button class="register-button modal-button">Adicionar</button>
            <dialog>
                <div class='dialog-div'>
                    <h2>Cadastrar</h2>
                    <form action='/cadastro-funcionario' method='POST'>
                        <fieldset>
                            <legend>Adicionar</legend>

                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" required>

                            <label for="sobrenome">Sobrenome</label>
                            <input type="text" name="sobrenome" id="sobrenome" required>

                            <label for="telefone">Telefone</label>
                            <input type="text" name="telefone" id="telefone" required>

                            <label for="email">E-mail</label>
                            <input type="email" name="email" id="email" required>
                            
                            <label for="cpf">CPF</label>
                            <input type="text" name="cpf" id="cpf" required>
                            
                            <label for="senha">Senha</label>
                            <input type="password" name="senha" id="senha" required>
                            
                            <label for="funcao">Função</label>
                            <input type="text" name="funcao" id="funcao" required>

                            <label for="privilegio">Privilégio</label>
                            <input type="text" name="privilegio" id="privilegio" required>

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
                    <th>CPF</th>
                    <th>E-mail</th>
                    <th>Telefone</th>
                    <th>Função</th>
                    <th>Privilégio</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
                </thead>
                <tbody>
                    <?php 

                        if (isset($funcionarios)) {
                
                            foreach ($funcionarios as $funcionario) {

                                echo
                                    "<tr>
                                        <td>{$funcionario->getNome()}</td>
                                        <td>{$funcionario->getSobrenome()}</td>
                                        <td>{$funcionario->getCPF()}</td>
                                        <td>{$funcionario->getEmail()}</td>
                                        <td>{$funcionario->getTelefone()}</td>
                                        <td>{$funcionario->getFuncao()}</td>
                                        <td>{$funcionario->getPrivilegio()}</td>
                                        <td>
                                            <button class='alterar modal-button'>Alterar</button>
                                        </td>
                                        <td>
                                            <form action='/excluir-funcionario' method='POST'>
                                                <input type='hidden' name='id' value='{$funcionario->getId()}'>
                                                <button class='excluir' type='submit' name='excluir'>X</button>
                                            </form>
                                        </td>
                                        <dialog>
                                        <div class='dialog-div'>
                                            <h2>Editar</h2>
                                            <form action='/alterar-funcionario' method='POST'>
                                                <fieldset>
                                                    <legend>Editar</legend>

                                                    <input type='hidden' name='id' value='{$funcionario->getId()}'>

                                                    <label for='nome'>Nome</label>
                                                    <input type='text' name='nome' id='nome' value='{$funcionario->getNome()}'>

                                                    <label for='sobrenome'>Sobrenome</label>
                                                    <input type='text' name='sobrenome' id='sobrenome' value='{$funcionario->getSobrenome()}'>

                                                    <label for='cpf'>CPF</label>
                                                    <input type='text' name='cpf' id='cpf' value='{$funcionario->getCpf()}'>
                                                    
                                                    <label for='email'>E-mail</label>
                                                    <input type='text' name='email' id='email' value='{$funcionario->getEmail()}'>
                                                    
                                                    <label for='telefone'>Telefone</label>
                                                    <input type='text' name='telefone' id='telefone' value='{$funcionario->getTelefone()}'>
                                                    
                                                    <label for='funcao'>Função</label>
                                                    <input type='text' name='funcao' id='funcao' value='{$funcionario->getFuncao()}'>

                                                    <label for='privilegio'>Privilégio</label>
                                                    <input type='text' name='privilegio' id='privilegio' value='{$funcionario->getPrivilegio()}'>

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