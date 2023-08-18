<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="anotherstyle.css">
    <script defer src="script.js"></script>
    <title>Document</title>
</head>

<body>
    <div>
        <div class="articleContainer">
            <?php
            include "db_connect.php";

            $req = $db->prepare("SELECT * FROM articles WHERE id= :id");
            $req->execute(array(
                'id' => $_GET['article']
            ));

            $id = $_GET['article'];
            echo $id;

            while ($article = $req->fetch()) {
                include "article.php";
            }
            ?>
        </div>
        <!-- COMMENTS -->
        <div class="commentContainer">
            <form action="insertCom.php" method="POST">
                <label for="user">Username</label>
                <input type="text" name="author">
                <label for="input">Comment</label>
                <input type="text" id="input" name="comment">
                <input type="submit" value="Submit">
                <input type="hidden" name="id" value="<?= $_GET['article'] ?>">
            </form>
            <div>
                <?php
                $req = $db->prepare("SELECT * FROM comments WHERE id_article= :id_article LIMIT 2");
                $req->execute(array(
                    'id_article' => $_GET['article']
                ));

                while ($comment = $req->fetch()) {
                    include "commentView.php";
                }
                $sql = $db->prepare("SELECT COUNT(*) AS total_num FROM comments WHERE id_article = ?");
                $sql->execute([$_GET['article']]);
                $count_num = $sql->fetch();
                $counter = $count_num->total_num;
                $count_up = ceil($counter / 5);

                for ($i = 1; $i <= $count_up; $i++) {
                ?>
                    <!-- $i is how many times our loop ran, and how many buttons we will make -->
                    <button onclick="pagination(<?= $id ?>, <?= $i ?>)"><?= $i ?></button>
                <?php
                }

                ?>
            </div>
        </div>
    </div>
</body>

</html>