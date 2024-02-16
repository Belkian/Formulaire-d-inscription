<?php
require 'config.php';
require 'class/User.php';
require 'class/Database.php';

if (!empty($_POST['prenom']) && !empty($_POST['nom']) && !empty($_POST['mail']) && !empty($_POST['password']) && !empty($_POST['password2']) && isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['mail']) && isset($_POST['password']) && isset($_POST['password2'])) {
    $Nom = htmlentities($_POST['nom']);
    $Prenom = htmlentities($_POST['prenom']);
}
