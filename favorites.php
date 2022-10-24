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
    <title>Favorites page</title>
    <style>
         table, th, td {
  border: 1px dashed red;
  border-collapse: collapse;
  padding: 2px;
}
        a{
            color: white;
        }
    table {
        color: white;
        margin-left: auto;
        margin-right: auto;
    }
        body {
  background-image: url('images/marcela-laskoski-YrtFlrLo2DQ-unsplash.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
h1, header h2 {
    color: white;
}
    form label {
    margin: 2px;
    padding: 0px;
    color: black;
}
.nav a {
    background-color: black;
    overflow: hidden;
    float: center;
    color: white;
    text-align: center;
    padding: 6px 8px;
    text-decoration: none;
    font-size: 20px;
} 
a:hover {
    background-color: yellow;
    color: black;
}
h2{
    text-align: center;
}
footer {
    position: fixed;
    bottom: 0;
    padding: 5px;
    background: #000000;
    color: white;
    width: 100%;
    text-align: center;
}
</style>
</head>

<body>
    <header>
        <h2>COMP 3512 ASG1<h2> <br>
                <sub>Justin Pope, Hoomer Amid</sub>

                <div class="nav">
                    <a href="index.php">Home</a>
                    <a href="search.php">Search</a>
                    <a href="browse.php">Browse</a>
                    <a href="favorites.php">Favorites</a>
                </div>

    </header>

    <h1>Favorites</h1>
    <a href="removeFavorites.php">Remove all favorites</a><br>
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
                        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td><a href=" . "removeFavorites.php?ID=$row[5]" . ">Remove</a></td><td><a href='single-page.php?ID=$row[5]'>View</a></td></tr>";
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
            Justin Pope <a href='https://github.com/jpope229'>Github</a><br>
            Hoomer Amid <a href='https://github.com/hamid269'>Github</a>
        </p>
    </footer>
</body>

</html>