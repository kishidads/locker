<?php

class Filter {

    function __construct() {
    }

    function validate($data, $filters) {
        $data = filter_var_array($data, $filters);

        return $data;
    }

    private function validateCPF($cpf) {
        //Extração dos números
        $cpf = preg_replace('/[^0-9]/is', '', $cpf);
         
        //Verifação de quantidade de números
        if (strlen($cpf) != 11) {
            return false;
        }
    
        //Verificação de inserção de números repetidos
        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }
    
        //Cálculo de validação de CPF
        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;
    }

    private function validatePassword($password) {
        //Mínimo de oito caracteres, pelo menos uma letra maiúscula, uma letra minúscula e um número
        if (preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $password)) {
            return true;
        }
        return false;
    }

    private function validateName($name) {
        if (preg_match('/^[a-z ,.\'-]+$/i', $name)) {
            return true;
        }
        return false;
    }

    private function validatePhone($phone) {
        if (preg_match('/^\(?(?:[14689][1-9]|2[12478]|3[1234578]|5[1345]|7[134579])\)? ?(?:[2-8]|9[1-9])[0-9]{3}\-?[0-9]{4}$/', $phone)) {
            return true;
        }
        return false;
    }

    function sanitize($data, $filters) {
        $data = array_map('trim', $data);
        
        $data = filter_var_array($data, $filters);

        $data = array_map('htmlspecialchars', $data);

        return $data;
    }

}

?>