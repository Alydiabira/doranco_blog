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

    // Ecrit la requêtes
    public function query($sql)
    {
        $this->statement = $this->dbHandler->prepare($sql); // PDO::prepare — Prépare une requête à l'exécution et retourne un objet
    }

    // Lier les valeurs
    public function bind($parameter, $value, $type = null) {
        switch (is_null($type)) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
        $this->statement->bindValue($parameter, $value, $type);
    }

    // Execute une requête
    public function execute() {
        return $this->statement->execute();
    }


    // Retourne un tableau
    public function resultSet() {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    // Renvoyer une ligne spécifique en tant qu'objet
    public function single() {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }


    // Obtient le nombre de lignes
    public function rowCount() {
        return $this->statement->rowCount();
    }
}
