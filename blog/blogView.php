<?php
include "db_connect.php";
?>
<div class="blog">
    <img src="https://source.unsplash.com/350x200/?<?= $article->tag; ?>" alt="">
    <div class="text">
        <p class="tag"><?= $article->tag; ?></p>
        <a class="title" href="./page.php?article=<?= $article->id; ?>"><?= $article->title; ?></a>
        <p class="content"><?= $article->content; ?></p>
        <p class="author"><?= $article->author; ?></p>
        <p><?= $article->date_creation; ?></p>
    </div>
</div>