<?php
class Message
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function findAllMsgs()
    {
        $this->db->query('SELECT * FROM messages');
        $result = $this->db->resultSet();

        return $result;
    }


    public function addMsg($data)
    {
        $this->db->query('INSERT INTO messages (fullname, email, message, user_id) VALUES (:fullname, :email, :message, :user_id)');

        $this->db->bind('fullname', $data['fullname']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('message', $data['message']);
        $this->db->bind('user_id', $data['user_id']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePost($id)
    {
        $this->db->query('DELETE FROM messages WHERE id = :id');
        $this->db->bind('id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}