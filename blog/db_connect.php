<?php
try {
    $db = new PDO("mysql:host=localhost;dbname=blog;charset=utf8", "root", "");
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
