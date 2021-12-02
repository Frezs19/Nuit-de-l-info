<?php
$mail = $_POST['email'];
$subject = "Mot de passe oublier : Shome";

//entête expéditeur
$entete = "From : notification@shome.com\n";
//priorité urgente
$entete .= "X-Priority : 1\n";
// type de contenu HTML
$entete .= "Content-type: text/html; charset=utf-8\n";

//Message :
$message = '<h1> Shome </h1>';
$message .= '<p> <br>';
$message .= 'Bonjour, <br>';
$message .= 'Une demande de réinitialisation de mot de passe a été faite envers votre email.';
$message .= '<a href="http://2.7.7.134/"> Réinitialiser votre mot de passe.</a>.';
$message .= '<br>';
$message .= '<br>';
$message .= '<br>';
$message .= '<br>L\'équipe Shome.';
$message .= '<a href="http://2.7.7.134/"> Shome </a>.';
$message .= '</p>';


if(mail($mail,$subject,$message, $entete)){
    echo "Mail envoyer à $mail";
}



?>
