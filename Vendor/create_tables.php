<?php
require_once './connect_db.php';

function create_table($query) {
    $count = $GLOBALS['db']->exec($query);
    if ($count !== false) {
        echo "Таблица успешно создана. <br>";
    } else {
        echo "Не удалось создать таблицу";
        echo "<pre>";
        print_r($GLOBALS['db']->errorInfo());
        echo "<pre>";
    }
}
try{
    $query = "CREATE TABLE posts (
              userId INT(11) NOT NULL,
              id INT(11) NOT NULL,
              title TEXT NOT NULL,
              body TEXT NOT NULL,
              PRIMARY KEY (id)
              )";
    create_table($query);


    $query = "CREATE TABLE comments (
              postId INT(11) NOT NULL,
              id INT(11) NOT NULL,
              name TEXT NOT NULL,
              email VARCHAR (255),
              body TEXT NOT NULL,
              PRIMARY KEY (id),
              FOREIGN KEY (postId) REFERENCES posts(id)
              )";
    create_table($query);
}
catch (PDOException $e) {
    echo "Ошибка выполненя запроса: " . $e->getMessage();
}
