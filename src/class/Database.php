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

        while (($ligne = fgetcsv($fichier, 1000, ",")) !== false) {
            $utilisateur[] = new User($ligne[1], $ligne[2], $ligne[4], $ligne[3], $ligne[0], $ligne[5]);
        }
        fclose($fichier);
        return $utilisateur;
    }

    ########
    // public function tryLogIn(string $email, string $password): User
    // {
    //     # Call la fonction FindUserByEmail 

    //     $user = $this->findUserByEmail($email);
    //     var_dump($user);
    //     $password = $user->passwordverify($password);
    //     if ($password == true) {
    //         $user->logIn();
    //         # return true;
    //         return $user;
    //     } else {
    //         return false;
    //     }
    // }

    public function findUserByEmail(string $Mail): User|bool
    {
        $fichier = fopen($this->_DB, "r");
        while (($user = fgetcsv($fichier, 1000, ",")) !== false) {
            if ($user[3] === $Mail) {
                $user = new User($user[1], $user[2], $user[3], $user[4], $user[0], $user[5]);
                break;
            } else {
                $user = false;
            }
        }
        fclose($fichier);
        return $user;
    }



    public function findUserById(int $id): User|bool
    {
        $fichier = fopen($this->_DB, "r");
        while (($user = fgetcsv($fichier, 500, ",")) !== false) {
            if ($user[0] === $id) {
                $user = new User($user[1], $user[2], $user[3], $user[4], $user[0], $user[5]);
                break;
            } else {
                $user = false;
            }
        }
        fclose($fichier);
        return $user;
    }


    // public function findUserByName(string $name)
    // {
    //     # Retourne tous les utilisateurs dans une liste
    //     $users = $this->ToutLesUtilisateurs();
    //     # Parcours la liste

    //     foreach ($users as $user) {
    //         # Si le nom est trouvé retourne l'utilisateur
    //         if ($user->getName() === $name) {
    //             return $user;
    //         }
    //     }
    //     # Sinon null
    //     return false;
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
    //     if (!empty($connectedUsers)) {
    //         return $connectedUsers;
    //     } else {
    //         return false;
    //     }
    // }
}
