<?php
require './connect_db.php';
require_once './Classes/Post.php';
require_once './Classes/Comment.php';
$arrposts = @file_get_contents('https://jsonplaceholder.typicode.com/posts');
$arrposts = json_decode($arrposts, TRUE);


$arrcomments = @file_get_contents('https://jsonplaceholder.typicode.com/comments');
$arrcomments = json_decode($arrcomments, TRUE);

$countposts = 0;
$countcomments = 0;

foreach ($arrposts as $arrpost) {
    $post = new Post($arrpost['userId'], $arrpost['id'], $arrpost['title'], $arrpost['body']);
    $post->save();
    if ($post) $countposts++;
}

foreach ($arrcomments as $arrcomment) {
    $comment = new Comment($arrcomment['postId'], $arrcomment['id'], $arrcomment['name'],
        $arrcomment['email'], $arrcomment['body']);
    $comment->save();
    if ($comment) $countcomments++;
}

echo "Загружено $countposts записей и $countcomments комментариев";






