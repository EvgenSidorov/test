<?php
require_once './connect_db.php';

class Post
{
    public $userId, $id, $title, $body;

    function __construct($userId = 0, $id = 0, $title = '', $body = '')
    {
        $this->userId = $userId;
        $this->id = $id;
        $this->title = $title;
        $this->body = $body;
    }
    function __toString()
    {
        return "$this->userId,<br>$this->id,<br>$this->body,<br>$this->title";
    }
    function save() {
        $query = "INSERT INTO posts 
              VALUES(:userId, :id, :title, :body)";
        $posts = $GLOBALS['db']->prepare($query);
        $posts->execute(['userId' => $this->userId, 'id' => $this->id,
                'title' => $this->title, 'body' => $this->body]);
    }
}