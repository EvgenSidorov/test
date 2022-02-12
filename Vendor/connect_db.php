<?php
try {
    global $db;
     $db = new PDO(
        'mysql:host=127.0.0.1:3306;dbname=blog',
        'root',
        'root',
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch (PDOException $e){
    echo "Не могу установить соединение с базой данных!";
}