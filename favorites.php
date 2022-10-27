<?php
require_once('includes/config.inc.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/favorites.css">
    <title>Favorites page</title>
</head>

<body>
    <header>
        <div class="headerName">
            <h2>COMP 3512 Assign1<h2> <br>
                    Justin Pope<br>
                    Hoomer Amid<br>
        </div>
        <div class="nav">
            <a href="index.php">Home</a>
            <a href="search.php">Search</a>
            <a href="browse.php">Browse</a>
            <a class="active" href="favorites.php">Favorites</a>
        </div>
    </header>

    <h1 class="pageName"> Favorites</h1>
    <a class="rmfav" href="includes/removeFavorites.inc.php">Remove all favorites</a><br>
    <table>
        <tr>
            <th>Title</th>
            <th>Artist</th>
            <th>Year</th>
            <th>Genre</th>
            <th>Popularity</th>
            <th>Favorited</th>
            <th>View</th>
        </tr>
        <?php
        if (!empty($_SESSION['favorites'])) {

            foreach ($_SESSION['favorites'] as $song => $id) {
                try {
                    $pdo = new PDO(DBCONNSTRING);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "SELECT title, year, artist_name, genre_name, popularity, song_id FROM songs INNER JOIN genres on songs.genre_id = genres.genre_id INNER JOIN artists on songs.artist_id = artists.artist_id where song_id =$id";
                    $result = $pdo->query($sql);
                    foreach ($result as $row) {
                        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td><a class=" . "rmfav" . " href=" . "includes/removeFavorites.inc.php?ID=$row[5]" . ">Remove</a></td><td><a class=" . "viewme" . " href='single-page.php?ID=$row[5]'>View</a></td></tr>";
                    }
                    $pdo = null;
                } catch (PDOException $e) {
                    die($e->getMessage());
                }
            }
        }
        ?>
    </table>

    <footer>
        <p>COMP3512<br>
            <a href='https://github.com/jpope229/Comp3512f2022Asg1'>Assignment Repository </a><br>
        <div class="Names">Contributors:<br>
            <a href='https://github.com/jpope229'>Justin Pope</a><br>
            <a href='https://github.com/hamid269'>Hoomer Amid</a><br>
        </div>
        Background from <a href='https://unsplash.com/photos/gUK3lA3K7Yo'>Unsplash </a>
        </p>

    </footer>
</body>

</html>