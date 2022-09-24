<?php

class Conexao {
   
   private static $instance;

   public static function getConexao() {
        if (!isset(self::$instance)) {
            self::$instance = new PDO('mysql:host=localhost;dbname=bdlocker', 'root', '', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }

        return self::$instance;
   }

}

/*

$dsn = 'mysql:dbname=bdarmariov3;host=localhost';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo 'Erro: ' . $e->getMessage();
} catch (Exception $e) {
    echo 'Erro genérico: ' . $e->getMessage();
}

*/

?>