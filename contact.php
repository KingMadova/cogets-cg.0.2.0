<?php
// Vérifie si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer et nettoyer les données
    $name    = htmlspecialchars(trim($_POST["name"]));
    $email   = htmlspecialchars(trim($_POST["email"]));
    $phone   = htmlspecialchars(trim($_POST["phone"]));
    $subject = htmlspecialchars(trim($_POST["subject"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Adresse email du destinataire
    $to = "info@cogetscongo.com"; // Change cette adresse !

    // Sujet de l'email
    $email_subject = "Nouveau message de contact : $subject";

    // Corps du message
    $email_body = "Vous avez reçu un nouveau message depuis le site web COGETS :\n\n";
    $email_body .= "Nom : $name\n";
    $email_body .= "Email : $email\n";
    $email_body .= "Téléphone : $phone\n";
    $email_body .= "Sujet : $subject\n\n";
    $email_body .= "Message :\n$message\n";

    // Headers (important pour éviter le spam)
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Envoi de l'email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Redirection ou message de confirmation
        echo "Message envoyé avec succès.";
    } else {
        echo "Erreur : impossible d'envoyer le message.";
    }
} else {
    echo "Méthode non autorisée.";
}
?>
