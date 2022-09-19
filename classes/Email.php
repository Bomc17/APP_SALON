<?php 

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email{

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token) {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion(){
        //crear el objeto

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = '1305382a53d119';
        $mail->Password = '4ae566c5da8c2b';
        /* $mail->SMTPSecure = 'tls'; */
        $mail->Port = 2525;

        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Confirma tu Cuenta';

        $mail->isHTML(TRUE);
        // Set HTML
        $mail->CharSet = 'UTF-8';
        $contenido = '<html>';
        $contenido .= "<p><strong>Hola " . $this->email .  "</strong> Has Creado tu cuenta en App Salón, solo debes confirmarla presionando el siguiente enlace</p>";
        $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta</a>";        
        $contenido .= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
        $contenido .= '</html>';
        $mail->Body = $contenido;
        
        //Enviar el mail
        $mail->send();
        
    }

    public function envirInstrucciones(){
                //crear el objeto

                $mail = new PHPMailer();
                $mail->isSMTP();
                $mail->Host = 'smtp.mailtrap.io';
                $mail->SMTPAuth = true;
                $mail->Username = '1305382a53d119';
                $mail->Password = '4ae566c5da8c2b';
                /* $mail->SMTPSecure = 'tls'; */
                $mail->Port = 2525;
        
                $mail->setFrom('cuentas@appsalon.com');
                $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
                $mail->Subject = 'Reestablece tu password';
        
                $mail->isHTML(TRUE);
                // Set HTML
                $mail->CharSet = 'UTF-8';
                $contenido = '<html>';
                $contenido .= "<p><strong>Hola " . $this->nombre .  "</strong> Has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo.</p>";
                $contenido .= "<p>Presiona aquí: <a href='http://localhost:3000/recuperar?token=" . $this->token . "'>Reestablecer Password</a>";        
                $contenido .= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
                $contenido .= '</html>';
                $mail->Body = $contenido;
                
                //Enviar el mail
                $mail->send();
    }
}