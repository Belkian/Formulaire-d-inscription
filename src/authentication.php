<?php
require 'config.php';
require_once 'class/User.php';
require_once 'class/Database.php';



if (!empty($_POST['mail']) && !empty($_POST['password']) && isset($_POST['mail']) && isset($_POST['password'])) {
    // # On instancie un object Database
    // $database = new Database();
    // # On fait appel à la fonction LogIn de l'object database
    // $user = $database->tryLogIn($_POST['mail'], $_POST['password']);

    // # $loginSuccess = $database->tryLogIn($_POST['mail'], $_POST['password']);

    // # Si un utilisateur est trouvé
    // #if (loginSuccess){
    // if ($user !== null) {
    //     header('localisation : ../comptePerso.php');
    //     var_dump("utilisateur trouver et bon mot de passe");
    // #Si non
    // } else {
    //     header('localisation : ../confirmation.php?erreur=' . 7);
    //     var_dump("Pas d'utilisateur trouvé ou mauvaise mot de passe");
    // }
} else {
    header('localisation : ../confirmation.php?erreur=' . 7);
    var_dump("Données vides");
}
