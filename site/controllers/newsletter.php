<?php

return function ($site, $pages, $page) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['newsletterEmail'];
        $rgpdConsent = isset($_POST['rgpdConsent']) ? true : false;

        if ($rgpdConsent) {
            // Traiter l'abonnement à la newsletter
            $apiKey = 'votre_clé_api_brevo';
            $listId = 'votre_id_de_liste';

            $apiUrl = "https://api.brevo.com/v3/contacts";

            $data = array(
                'email' => $email,
                'listIds' => array($listId),
                'attributes' => array(
                    'RGPD_CONSENT' => true
                )
            );

            $options = array(
                'http' => array(
                    'header'  => "Content-type: application/json\r\n" .
                                "api-key: $apiKey\r\n",
                    'method'  => 'POST',
                    'content' => json_encode($data),
                ),
            );

            $context  = stream_context_create($options);
            $result = file_get_contents($apiUrl, false, $context);

            if ($result === FALSE) {
                echo "Erreur lors de l'abonnement à la newsletter.";
            } else {
                echo "Vous êtes maintenant abonné à la newsletter!";
            }
        } else {
            echo "Vous devez accepter les conditions RGPD pour vous abonner à la newsletter.";
        }
    }
};
?>
