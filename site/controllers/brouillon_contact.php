<?php

require '/home/pierreme/public_html/vendor/autoload.php';  

use Dotenv\Dotenv;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../vendor');
$dotenv->load();

return function ($kirby, $pages, $page) {
    $errors      = [];
    $success     = false;
    $data        = [];
    $attachments = [];

    if ($kirby->request()->is('POST')) {
        // Vérification CSRF
        if (get('csrf_token', 'POST') !== csrf()) {
            $errors[] = 'Erreur de sécurité. Veuillez réessayer.';
            return compact('errors', 'success', 'data');
        }

        // Récupération des données
        $data = [
            'name'       => get('contactName', 'POST'),
            'firstname'  => get('contactFirstname', 'POST'),
            'email'      => get('contactEmail', 'POST'),
            'phone'      => get('contactPhone', 'POST'),
            'interest'   => get('contactInterest', 'POST'),
            'message'    => get('contactMessage', 'POST'),
        ];

                // Validation des champs
                $messages = [
                    'contactName'       => 'Le champ "Nom" est requis.',
                    'contactFirstname'  => 'Le champ "Prénom" est requis.',
                    'contactEmail'    => 'Le champ "Mail" est requis et doit être un nombre.',
                    'contactPhone'       => 'Le champ "Téléphone" est requis.',
                    'contactInterest'    => 'Le champ "Intérêt" est requis.',
                    'contactMessage'     => 'Le champ "Message" est requis.',
                ];

                // Construction du message HTML avec toutes les données
        $body = "
        <h2>Nouvelle demande de contact</h2>
        <p><strong>Nom :</strong> {$data['contactName']}</p>
        <p><strong>Prénom :</strong> {$data['contactFirstname']}</p>
        <p><strong>Mail :</strong> {$data['contactEmail']}</p> 
        <p><strong>Téléphone :</strong> {$data['contactPhone']}</p>
        <p><strong>Intérêt :</strong> {$data['contactInterest']}</p>
        <p><strong>Message :</strong> {$data['contactMessage']}</p>";
            
        // Envoi d'email
        if (empty($errors)) {
            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = $_ENV['MAIL_HOST'] ?? 'default_host';
                $mail->SMTPAuth   = true;
                $mail->Username = $_ENV['MAIL_USERNAME'] ?? 'default_user';
                $mail->Password = $_ENV['MAIL_PASSWORD'] ?? 'default_pass';
                $mail->SMTPSecure = $_ENV['MAIL_SECURITY'] ?? PHPMailer::ENCRYPTION_STARTTLS;
                $mail->CharSet = 'UTF-8'; 
                $mail->Port = $_ENV['MAIL_PORT'] ?? 587;

                $mail->setFrom('contact@pierremedurio.com', 'Pierre Medurio');
                $mail->addAddress('contact@pierremedurio.com', 'Contact');

                // S'assurer que $body est bien encodé en UTF-8
                $body = mb_convert_encoding($body, 'UTF-8', 'auto');

                $mail->isHTML(true);
                $mail->Subject = 'Nouvelle demande de contact';
                $mail->Body    = $body;

                foreach ($attachments as $attachment) {
                    $mail->addAttachment($attachment);
                }

                $mail->send();

                // Redirection après l'envoi de l'email
                go(url('home'));
                // exit();  
            } catch (Exception $e) {
                $errors[] = "Erreur lors de l'envoi de l'email : " . $e->getMessage();
            }
        }
    }

    return compact('errors', 'success', 'data');
};
