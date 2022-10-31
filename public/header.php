<header>
    <a class="logo" href="/"><img src="../public/assets/img/logotipo.png" alt="Locketec: Locação de armários escolares"></a>
    <nav>
        <ul>
            <?php
            if (isset($_SESSION['authenticate'])) {
                echo    "<li><p>Olá, {$_SESSION['nome']}</p></li>
                        <li>
                            <form action='/sair' method='POST'>
                                <button type='submit' name='sair'>Sair</button>
                            </form>
                        </li>";
            } else {
                echo    "<li><a href='/login'>Entrar</a></li>
                        <li><a href='/cadastro'>Cadastrar-se</a></li>";
            }
            ?>
        </ul>
    </nav>
</header>

<main>