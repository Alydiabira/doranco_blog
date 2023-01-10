<?php
class Database
{
    // Propriétes
    private $dbHost = DB_HOST;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;
    private $dbName = DB_NAME;
    private $statement;
    private $dbHandler;
    private $error;

    // Méthodes
    public function __construct()
    {
        $connect = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName . ';charset=utf8_unicode_520_ci';
        $options = array(
            PDO::ATTR_PERSISTENT => true, // Rendre la connexion persistante.
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // définir le code d'erreurs et lance une exception.
        );

        try {
            $this->dbHandler = new PDO($connect, $this->dbUser, $this->dbPass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    // Ecrire des requêtes
    // Lier les valeurs
    // Execute une requête
    // Retourne un tableau
    // Renvoyer une ligne spécifique en tant qu'objet
    // Obtient le nombre de lignes
}
