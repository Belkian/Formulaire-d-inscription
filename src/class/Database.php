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

        while (($ligne = fgetcsv($fichier, 1000,) !== false)) {
            $utilisateur[] = new User($ligne[1], $ligne[2], $ligne[3], $ligne[4], $ligne[0]);
        }
        fclose($fichier);
        return $utilisateur;
    }
}
