<?php

if (!empty($_GET['ID'])) {
    require_once('includes/config.inc.php');
} else {
    header('Location: search.php');
}
?>

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
    <header>
        <h2>COMP 3512 ASG1<h2>
                <i>Justin Pope</i>
                <div class="nav">
                    <a href="index.php">Home</a>
                    <a href="search.php">Search</a>
                    <a href="browse.php">Browse</a>
                    <a href="favorites.php">Favorites</a>
                </div>
    </header>

    <h1>Song information</h1>
    <?php
    try {
        $pdo = new PDO(DBCONNSTRING);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //write sql
        $passedID = $_GET['ID'];
        $sql = "SELECT title, year FROM songs where song_id =$passedID";
        $result = $pdo->query($sql);
        //run sql & dump on screen
        while ($row = $result->fetch()) {
            var_dump($row);
        }

        $pdo = null;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    ?>

    <footer> <b> FOOTER </b> </footer>
</body>

</html>