<?php

$id = isset($_POST['id']) ? $_POST['id'] : "";


if (
    !empty($_POST['author']) and
    !empty($_POST['comment']) and
    !empty($_POST['id'])
) {
    include "db_connect.php";

    $req = $db->prepare("INSERT INTO comments (id_article, author, comment) VALUES ( :id_article, :author, :comment)");
    $req->execute([
        'id_article' => $_POST['id'],
        'author' => $_POST['author'],
        'comment' => $_POST['comment']
    ]);
}


header("Location: page.php?article=$id");
