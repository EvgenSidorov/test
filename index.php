<?php
require './Vendor/connect_db.php';
$text = $_GET['query'];
try{

    if(strlen($text) >= 3){
        $query = "SELECT c.*, p.title 
                  FROM comments c JOIN posts p ON c.postId = p.id
                  WHERE c.body LIKE :body";

        $comment = $GLOBALS['db']->prepare($query);
        $comment->execute([':body' => '%'.$text.'%']);
        $results = $comment->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as $result) { ?>
                <div class="block blue">
                    <h4><?php echo $result['title']?></h4>
                    <p><?php echo $result['body']?></p>
                </div>
            <?php
        }
    }

}
catch (PDOException $e) {
    echo "Ошибка выполненя запроса: " . $e->getMessage();
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./Assets/style.css">
    <title>Document</title>
</head>
<body>
        <form action="index.php" class="block" method="get">
            <input type="text" name="query" placeholder="Введите строку поиска" value="<?php echo $text ?>" required>
            <button type="submit" class="btn">Найти</button>
        </form>
</body>
</html>


