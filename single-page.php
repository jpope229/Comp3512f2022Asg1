<?php require_once('includes/config.inc.php');

if (!empty($_GET['ID'])) {
    $pdo = new PDO('sqlite:.data/music.db');

    try {
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //write sql
        $statement = $pdo->query("SELECT * FROM songs");
        //run sql
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
        //show on screen
        var_dump($rows);

        $pdo = null;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
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
        <div class="nav">
            <a href="index.php">Home</a>
            <a href="search.php">Search</a>
            <a href="browse.php">Browse</a>
            <a href="favorites.php">Favorites</a>
        </div>

        <h2>COMP 3512 ASG1<h2> <br>
                <p>Justin Pope</p>

                <<<<<<< HEAD=======</header>

                    <h1>Song information</h1>

                    <?php
                    $songID = $_GET['song_id'];
                    echo "<h3>Song id = $_GET[song_id]</h3>";
                    ?>

                    >>>>>>> 1abc87bee84819fefd8533c3dfca8193ed55d787
                    <footer>FOOTER</footer>
</body>

</html>