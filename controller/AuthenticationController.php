<?php

if (isset($_POST['entrar'])) {

    include_once '../connection/Connection.php';
    include_once '../model/Authentication.php';
    //include_once '../model/Filter.php';

/*  
    $filter = new Filter();

    $filters = array(
        'cpf' => array('filter' => FILTER_CALLBACK, 'options' => array($filter, 'validateCPF')),
        'senha' => array('filter' => FILTER_CALLBACK, 'options' => array($filter, 'validatePassword'))
    );

    $data = $filter->validate($_POST, $filters);

    echo 'Validação:<br><pre>' , var_dump($data) , '</pre>';
    
*/
    
    $login = new Authentication($_POST['cpf'], $_POST['senha']);
    
    if ($login->login()) {
        
        echo '<pre>' , var_dump($login->getUser()) , '</pre>';
                
        //header('Location: /armarios');
    
    }

}

if (isset($_POST['sair'])) {
    include_once '../model/Authentication.php';
    $logout = new Authentication();
    $logout->logout();
}

?>