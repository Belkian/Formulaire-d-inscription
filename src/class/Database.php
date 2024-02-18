<?php
final class Database
{
    private $_DB;
    public function __construct()
    {
        $this->_DB = __DIR__ . "/../csv/user.csv";
    }
    public function saveUtilisateur(User $User): bool
    {
        $fichier = fopen($this->_DB, "ab");
        $retour = fputcsv($fichier, $User->getObjectToArray());
        fclose($fichier);
        return $retour;
    }
    public function ToutLesUtilisateurs(): array
    {
        $fichier = fopen($this->_DB, "r");
        $utilisateur = [];

        while (($ligne = fgetcsv($fichier, 1000)) !== false) {
            $utilisateur[] = new User($ligne[1], $ligne[2], $ligne[3], $ligne[4], $ligne[0], $ligne[5]);
        }
        fclose($fichier);
        return $utilisateur;
    }

    // ########
    // public function tryLogIn(string $email, string $password): ?User
    // {
    //     # Call la fonction FindUserByEmail 
    //     $user = $this->findUserByEmail($email);
    //     if ($user !== null) {
    //         $password = $user->passwordverify($password);
    //         if ($password !== null) {
    //             # $user->logIn();
    //             # return true
    //             return $user;
    //         } else {
    //             var_dump("Bon user : " . $email . "mauvaise mot de passe");
    //             # return false
    //             return null;
    //         }
    //     } else {
    //         var_dump("Mauvais user");
    //         # return false
    //         return null;
    //     }
    // }

    // public function findUserByEmail(string $email)
    // {
    //     # Retourne tous les utilisateurs dans une liste
    //     $users = $this->ToutLesUtilisateurs();
    //     # Parcours la liste

    //     foreach ($users as $user) {
    //         # Si l'email est trouvé retourne l'utilisateur
    //         if ($user->getMail() === $email) {
    //             return $user;
    //         }
    //     }
    //     # Sinon null
    //     return null;
    // }
    // public function findUserById(string $id)
    // {
    //     # Retourne tous les utilisateurs dans une liste
    //     $users = $this->ToutLesUtilisateurs();
    //     # Parcours la liste

    //     foreach ($users as $user) {
    //         # Si l'email est trouvé retourne l'utilisateur
    //         if ($user->getId() === $id) {
    //             return $user;
    //         }
    //     }
    //     # Sinon null
    //     return null;
    // }
    // public function findUserByName(string $name)
    // {
    //     # Retourne tous les utilisateurs dans une liste
    //     $users = $this->ToutLesUtilisateurs();
    //     # Parcours la liste

    //     foreach ($users as $user) {
    //         # Si l'email est trouvé retourne l'utilisateur
    //         if ($user->getName() === $name) {
    //             return $user;
    //         }
    //     }
    //     # Sinon null
    //     return null;
    // }

    // public function findUsersConnected()
    // {
    //     # Retourne tous les utilisateurs dans une liste
    //     $users = $this->ToutLesUtilisateurs();
    //     # Parcours la liste
    //     $connectedUsers = [];
    //     foreach ($users as $user) {
    //         #Si connecté
    //         if ($user->getLogged() === true) {
    //             $connectedUsers[] = $user;
    //         }
    //     }
    //     if (!empty($connectedUsers))
    //     {
    //         return $connectedUsers;
    //     }
    //     else{
    //         return null;
    //     }
    // }


}
