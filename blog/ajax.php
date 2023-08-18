<?php
include "db_connect.php";

$id = $_GET['id']; // article id
$i = $_GET['offset']; // amount of buttons we have

$offset = $i * 5 - 5;

$sql = $db->prepare("SELECT * FROM comments WHERE id_article = :id LIMIT 5 OFFSET :offset");
$sql->bindParam("id", $id, PDO::PARAM_INT);
$sql->bindParam("offset", $offset, PDO::PARAM_INT);

$sql->execute();

while ($comment = $sql->fetch()) {
    include "commentView.php";
}
