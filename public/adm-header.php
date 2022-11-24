<header>
    <a class="logo" href="/"><img src="../../public/assets/img/logotipo-adm.svg" alt="Locketec: Locação de armários escolares"></a>
    <nav>
        <ul>
            <?php
            if (isset($_SESSION['admAuthenticate'])) {
                echo    "<li><p>Olá, {$_SESSION['nome']}</p></li>
                        <li>
                            <form action='/adm/sair' method='POST'>
                                <button type='submit' name='sair'>Sair</button>
                            </form>
                        </li>";
            } else {
                echo    "<li><a href='/adm/login'>Entrar</a></li>";
            }
            ?>
        </ul>
    </nav>
</header>

<main>