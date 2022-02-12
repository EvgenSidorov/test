<?php


class Comment
{
    public $postId, $id, $name, $email, $body;

    function __construct($postId = 0, $id = 0, $name = '', $email = '', $body = '')
    {
        $this->postId = $postId;
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->body = $body;
    }
    function __toString()
    {
        return "$this->postId,<br>$this->id,<br>$this->name,<br>$this->email,<br>$this->body";
    }
    function save() {
        $query = "INSERT INTO comments 
                  VALUES(:postId, :id, :name, :email, :body)";
        $comments = $GLOBALS['db']->prepare($query);
        $comments->execute(['postId' => $this->postId, 'id' => $this->id,
            'name' => $this->name, 'email' => $this->email,
            'body' => $this->body]);
    }
}