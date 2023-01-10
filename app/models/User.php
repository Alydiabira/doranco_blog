<?php
class User
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function register($data)
    {
        $this->db->query('INSERT INTO users (lastname, firstname, email, password, alias, bio) VALUES (:lastname, :firstname, :email, :password, :alias, :bio)');

        // Bind Values
        $this->db->bind(':lastname', $data['lastname']);
        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':alias', $data['alias']);
        $this->db->bind(':bio', $data['bio']);

        // Execution de la requete
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($alias, $password)
    {
        $this->db->query('SELECT * FORM users WHERE alias = :alias');
        $this->db->bind(':alias', $alias);

        $row = $this->db->single();
        $hashedPassword = $row->password;

        if (password_verify($password, $hashedPassword)) {
            return $row; 
        } else {
            return false;
        }
    }

    public function findUserByEmail($email)
    {
        $this->db->query('SELECT * FORM users WHERE email = :email');
        $this->db->bind(':email', $email);
        // Vérifie que l'email n'est pas déjà enregistré.
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}
