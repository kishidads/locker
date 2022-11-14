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

            echo '<pre>' , var_dump($_SESSION) , '</pre>';
            
            $data = $_POST;
            
            echo '<pre>' , var_dump($data) , '</pre>';
            
            $aluno = new Aluno();

            $aluno->setId($_SESSION['id']);

            $armario = new Armario();

            $armario->setId($data['armario']);

            $armariodao = new ArmarioDAO();

            $armario = $armariodao->read($armario->getId(), null, null);

            echo '<pre>' , var_dump($aluno) , '</pre>';
            echo '<pre>' , var_dump($armario) , '</pre>';

            $plano = new Plano();

            $plano->setId($data['plano']);

            if ($armario->getSituacao() === 'disponível') {

                $aluguel = new Aluguel();
    
                $aluguel->setData(date('Y-m-d H:i:s'));
                $aluguel->setSituacao(0);
                $aluguel->setIdAluno($aluno->getId());
                $aluguel->setIdArmario($armario->getId());
                $aluguel->setIdPlano($plano->getId());
    
                $alugueldao = new AluguelDAO();
    
                $alugueldao->create($aluguel);

                $armario->setSituacao('reservado');

                $armariodao->update($armario);
                
                echo '<pre>' , var_dump($aluguel) , '</pre>';
                
            }

        }

        include 'view/aluguel/reserva.php';
    }

}
