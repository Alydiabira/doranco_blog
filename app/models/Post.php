<?php
class Post
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function findAllPosts()
    {
        $this->db->query('SELECT * FROM posts ORDER BY date ASC');
        $result = $this->db->resultSet();

        return $result;
    }

    public function findPostById($id)
    {
        $this->db->query('SELECT * FROM posts WHERE id = :id');
        $this->db->bind(':id', $id);

        $row = $this->db->single();

        return $row;
    }

    public function findPostByCategory($category)
    {
        $this->db->query('SELECT * FROM posts WHERE category = :category');
        $this->db->bind(':category', $category);

        $row = $this->db->single();

        return $row;
    }

    public function addPost($data)
    {
        $this->db->query('INSERT INTO posts (title, excerpt, content, category, date, author) VALUES (:title, :excerpt, :content, :category, :date, :author)');

        $this->db->bind('title', $data['title']);
        $this->db->bind('excerpt', $data['excerpt']);
        $this->db->bind('content', $data['content']);
        $this->db->bind('category', $data['category']);
        $this->db->bind('date', $data['date']);
        $this->db->bind('author', $data['author']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
        
    }

    public function updatePost($data)
    {
        $this->db->query('UPDATE posts SET title = :title, excerpt = :excerpt, content = :content, category = :category WHERE id = :id');

        $this->db->bind('id', $data['id']);
        $this->db->bind('title', $data['title']);
        $this->db->bind('excerpt', $data['excerpt']);
        $this->db->bind('content', $data['content']);
        $this->db->bind('category', $data['category']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePost($id)
    {
        $this->db->query('DELETE FROM posts WHERE id = :id');
        $this->db->bind('id', $id);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}