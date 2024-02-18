<?php
class User
{
    private $_id;
    private $_Nom;
    private $_Prenom;
    private $_password;
    private $_Mail;
    // #
    // private $_logged;

    public function __construct(string $Nom, string $Prenom, string $password, string $Mail, int|string $id = "à créer", bool $logged = false)
    {
        $this->setId($id);
        $this->setNom($Nom);
        $this->setPrenom($Prenom);
        $this->setpassword($password);
        $this->setMail($Mail);
        // #
        // $this->setLogged($logged);
    }

    public function getId(): int
    {
        return $this->_id;
    }
    public function setId(int|string $id): void
    {
        if (is_string($id) && $id == "à créer") {
            $this->_id = $this->id_utilisateur();
        } else {
            $this->_id = $id;
        }
    }

    public function getNom(): string
    {
        return $this->_Nom;
    }
    public function setNom(string $Nom)
    {
        $this->_Nom = $Nom;
    }

    public function getPrenom(): string
    {
        return $this->_Prenom;
    }
    public function setPrenom(string $Prenom)
    {
        $this->_Prenom = $Prenom;
    }

    public function getpassword(): string
    {
        return $this->_password;
    }
    public function setpassword(string $password)
    {
        $this->_password = $password;
    }

    public function getMail(): string
    {
        return $this->_Mail;
    }

    public function setMail(string $Mail)
    {
        $this->_Mail = $Mail;
    }

    #
    // public function getLogged(): bool
    // {
    //     return $this->_logged;
    // }

    // public function setLogged(bool $logged)
    // {
    //     $this->_logged = $logged;
    // }

    // public function logIn() {
    //     $this->setLogged(true);
    // }
    // public function logOut() {
    //     $this->setLogged(false);
    // }

    public function getObjectToArray(): array
    {
        return [
            'id' => $this->getId(),
            'Nom' => $this->getNom(),
            'Prenom' => $this->getPrenom(),
            'Mail' => $this->getMail(),
            'password' => $this->getpassword(),
            // 'logged' => $this->getLogged()
        ];
    }
    public function passwordverify(string $password): bool
    {
        return password_verify($password, $this->getpassword());
    }
    public function id_utilisateur()
    {
        $Database = new Database();
        $utilisateur = $Database->ToutLesUtilisateurs();
        $Ids = [];
        foreach ($utilisateur as $utilisateur) {
            $Ids[] = $utilisateur->getId();
        }
        $i = 1;
        $unique = false;
        while ($unique === false) {
            if (in_array($i, $Ids)) {
                $i++;
                $unique = false;
            } else {
                $unique = true;
                break;
            }
        }

        return $i;
    }
}
