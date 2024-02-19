<?php
session_start();
require 'config.php';
require_once 'class/User.php';
require_once 'class/Database.php';

# On instancie un object Database
$database = new Database();

if (!empty($_POST['mail']) && !empty($_POST['password']) && isset($_POST['mail']) && isset($_POST['password'])) {

    # On fait appel à la fonction LogIn de l'object database
    $Mail = htmlentities($_POST['mail']);
    $userAvecCeMail = $database->findUserByEmail($Mail);
    if ($userAvecCeMail !== false) {
        if (password_verify($_POST['password'], $useravecmail->getpassword())) {
            $_SESSION['connecté'] = true;
            $_SESSION[''] = serialize($userAvecCeMail);
            header('localisation : ../TableauDeBord.php');
            exit;
        } else {
            header('localisation : ../connexion.php?erreur');
            exit;
        }
    } else {
        header('localisation : ../connexion.php?erreur');
        exit;
    }

    #$loginSuccess = $database->tryLogIn($_POST['mail'], $_POST['password']);

    # Si un utilisateur est trouvé
    #if (loginSuccess){
} else {
    header('localisation : ../connexion.php?erreur=' . 7);
}
