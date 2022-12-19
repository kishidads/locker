<?php

class AluguelController {

    public static function checkout() {

        require_once 'session.php';

        if (isset($_POST['avancar']) && $_POST['selecionado']) {

            include_once 'connection/Connection.php';
            include_once 'model/Armario.php';
            include_once 'dao/ArmarioDAO.php';
            include_once 'model/Plano.php';
            include_once 'dao/PlanoDAO.php';
            include_once 'controller/Filter.php';

            $splitted = preg_split('/(?<=[a-zA-Z])(?=[0-9])/', $_POST['selecionado']);

            //echo '<pre>' , var_dump($splitted) , '</pre>';

            $armario = new Armario();

            $armario->setSecao($splitted[0]);
            $armario->setNumero($splitted[1]);

            $armariodao = new ArmarioDAO();

            $armario = $armariodao->read(null, $armario->getSecao(), $armario->getNumero());

            //echo '<pre>' , var_dump($armario) , '</pre>';

            $planodao = new PlanoDAO();

            $planos = $planodao->readAll();
            
            //echo '<pre>' , var_dump($planos) , '</pre>';

            include 'view/aluguel/checkout.php';

            return;
        }

        header('Location: /armarios');
        die();
    }

    public static function reserva() {

        require_once 'session.php';

        if (isset($_POST['confirmar'])) {
            
            include_once 'connection/Connection.php';
            include_once 'model/Pessoa.php';
            include_once 'model/Aluno.php';
            include_once 'dao/AlunoDAO.php';
            include_once 'model/Armario.php';
            include_once 'dao/ArmarioDAO.php';
            include_once 'model/Plano.php';
            include_once 'dao/PlanoDAO.php';
            include_once 'model/Aluguel.php';
            include_once 'dao/AluguelDAO.php';
            include_once 'controller/Filter.php';

            //echo '<pre>' , var_dump($_SESSION) , '</pre>';
            
            $data = $_POST;
            
            //echo '<pre>' , var_dump($data) , '</pre>';
            
            $aluno = new Aluno();

            $aluno->setId($_SESSION['id']);

            $armario = new Armario();

            $armario->setId($data['armario']);

            $armariodao = new ArmarioDAO();

            $armario = $armariodao->read($armario->getId(), null, null);

            //echo '<pre>' , var_dump($aluno) , '</pre>';
            //echo '<pre>' , var_dump($armario) , '</pre>';

            $plano = new Plano();

            $plano->setId($data['plano']);

            $alugueldao = new AluguelDAO();

            $alugueis = $alugueldao->readAllFromAluno($aluno->getId());
            
            //echo '<pre>' , var_dump($alugueis) , '</pre>';

            if (!($armario->getSituacao() === 'disponível')) {

                $msgs[0] = 'Infelizmente o armário escolhido não encontra-se mais disponível.';
                $msgs[1] = 'Volte para a tela de armários para escolher um novo armário.';

                goto view;

            }

            if ($alugueis) {
                foreach ($alugueis as $aluguel) {
                    if ($aluguel->getSituacao() === 'ativo') {

                        $msgs[0] = 'Você já possui um aluguel ativo.';
                        $msgs[1] = 'Não é permitido ter mais de um aluguel ativo.';

                        goto view;

                    } else if ($aluguel->getSituacao() === 'reservado') {

                        $msgs[0] = 'Você já está com uma reserva de armário ativa.';
                        $msgs[1] = 'Sua reserva está aguardando pagamento ou aprovação.';

                        goto view;

                    }
                }
            }

            $aluguel = new Aluguel();

            $aluguel->setData(date('Y-m-d H:i:s'));
            $aluguel->setSituacao('reservado');
            $aluguel->setIdAluno($aluno->getId());
            $aluguel->setIdArmario($armario->getId());
            $aluguel->setIdPlano($plano->getId());

            $alugueldao->create($aluguel);

            $armario->setSituacao('reservado');

            $armariodao->update($armario);
            
            //echo '<pre>' , var_dump($aluguel) , '</pre>';

            $msgs[0] = 'Sua solicitação foi processada com sucesso.';
            $msgs[1] = 'Dirija-se à secretaria para realizar o pagamento e garantir sua reserva.';
            $msgs[2] = 'Estamos aguardando o seu pagamento.';
            $msgs[3] = 'Seu armário permanecerá reservado por 48h.';

        }

        view:
        include 'view/aluguel/reserva.php';

    }

}
