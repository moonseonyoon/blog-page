<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <!-- BLOGS -->
    <div class="container">
        <?php

        include "db_connect.php";
        $sql = "SELECT * FROM articles";

        $response = $db->query($sql);
        while ($article = $response->fetch()) {
            include "blogView.php";
        }

        ?>
    </div>
</body>

</html>