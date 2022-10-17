<?php require_once('includes/config.inc.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single song</title>
    <link rel="stylesheet" href="css/single-page.css">
</head>

<body>
    <header>HEADER</header>

    <h1>Song information</h1>

    <?php
    $pdo = new PDO('<sqlite:data/music.db');

    //write sql
    $statement = $pdo->query("SELECT * FROM songs");

    //run sql
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

    //show on screen
    var_dump($rows);
    ?>

    <footer>FOOTER</footer>
</body>

</html>