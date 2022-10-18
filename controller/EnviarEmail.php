<?php

include_once ('../constants.php');
include_once ('../connection/Connection.php');

//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

//Load Composer's autoloader
//require '../libs/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require ('../libs/vendor/phpmailer/phpmailer/src/Exception.php');
require ('../libs/vendor/phpmailer/phpmailer/src/PHPMailer.php');
require ('../libs/vendor/phpmailer/phpmailer/src/SMTP.php');

class EnviarEmail
{

    public static function criarhashes($num_caracteres = 12)
    {

        //criar hashes 
        $chars = '01234567890123456789abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $purl = substr(str_shuffle($chars), 0, $num_caracteres);
        return $purl;
    }




    public function confirmarEmail($email_cliente, $purl)
    {





        //Constroi o purl  (link para validação do email)
          $linkConf = BASE_URL;

        //Create an instance; passing `true` enables exceptions
          $mail = new PHPMailer(true);



        try {
            //Configurações Do Servidor De Email
            $mail->SMTPDebug = SMTP::DEBUG_SERVER; //Enable verbose debug output 
            $mail->CharSet = "UTF-8";
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = EMAIL_HOST;                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = EMAIL_FROM;                     //SMTP username
            $mail->Password   = EMAIL_PASS;                               //SMTP password
            //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Emissor e Receptor de Email
            $mail->setFrom(EMAIL_FROM, APP_NAME);
            $mail->addAddress($email_cliente);     //Add a recipient




            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Conteudo 
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject =  EMAIL_FROM . ' - Confirmação de Email de cadastro';

            // Mensagem do Email 
            $html =  '<p>Seja Bem vindo ao nosso Sistema de Aluguel  ' . APP_NAME . '</p>';
            $html .= '<p>Para usar o nosso sistema, é necessario confirmar o seu Email.</p>';
            $html .= '<p>Para Confirmar o email, clique no link abaixo:</p>';
            $html .= '<p><a href="'.$linkConf.''.$purl.'">Clique para Confirmar Email</a></p>';
            //$html .= '<p><a href="'.$linkConf.'"></a>Confirmar Email</p>';
            $html .= '<p><i><small> ' . APP_NAME . '</small></i></p>';

            $mail->Body = $html;
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo 'Mensagem Enviada<br>';





            // $url = "$linkConf";

            // $data = parse_url($url);

            // echo "<pre>";
            // print_r($data);
            // echo "</pre>";


            return true;
        } catch (Exception $e) {
            echo "Mensagem nao pode ser enviada.<br>";
            echo "Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }

}
