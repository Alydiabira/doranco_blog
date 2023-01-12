<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }

    public function register($data) {
        $this->db->query('INSERT INTO users (lastname, firstname, email, password, alias, bio) VALUES(:lastname, :firstname, :email, :password, :alias, :bio)');

        //Bind values
        $this->db->bind(':lastname', $data['lastname']);
        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':alias', $data['alias']);
        $this->db->bind(':bio', $data['bio']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($alias, $password) {
        $this->db->query('SELECT * FROM users WHERE alias = :alias');

        //Bind value
        $this->db->bind(':alias', $alias);

        $row = $this->db->single();

        $hashedPassword = $row->password;

        if (password_verify($password, $hashedPassword)) {
            return $row;
        } else {
            return false;
        }
    }

    //Find user by email. Email is passed in by the Controller.
    public function findUserByEmail($email) {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE email = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);

        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
}