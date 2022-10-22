<?php
//Display all songs if no query string is passed (Coming from Nav)
if (!empty($_GET['title']) or !empty($_GET['artist_select']) or !empty($_GET['genre_select']) or !empty($_GET['yearL']) or !empty($_GET['yearG']) or !empty($_GET['popL']) or !empty($_GET['popG'])) {
    require_once('includes/config.inc.php');
    require_once('includes/queryString.inc.php');
} else {
    //header('Location: search.php');
    echo "TEST Printed when No query string passed";
    require_once('includes/config.inc.php');
    require_once('includes/queryString.inc.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Browse Page</title>
</head>

<body>
    <header>
        <h2>COMP 3512 ASG1<h2> <br>
                <sub>Justin Pope</sub>

                <div class="nav">
                    <a href="index.php">Home</a>
                    <a href="search.php">Search</a>
                    <a href="browse.php">Browse</a>
                    <a href="favorites.php">Favorites</a>
                </div>

    </header>

    <h1>Browse/Search Results</h1>
    <table>
        <tr>
            <th>Title</th>
            <th>Artist</th>
            <th>Year</th>
            <th>Genre</th>
            <th>Popularity</th>
            <th>Add to Favorites</th>
            <th>View</th>
        </tr>
        <?php

        //displays all songs if no query string is passed (Came to page from NAV not search)
        if (empty($_GET['title']) && empty($_GET['artist_select']) && empty($_GET['genre_select']) && empty($_GET['yearL']) && empty($_GET['yearG']) && empty($_GET['popL']) && empty($_GET['popG'])) {
            try {
                $pdo = new PDO(DBCONNSTRING);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                //write sql
                $sql = "SELECT title, year, artist_name, genre_name, popularity, song_id FROM songs INNER JOIN genres on songs.genre_id = genres.genre_id INNER JOIN artists on songs.artist_id = artists.artist_id";
                $result = $pdo->query($sql);


                foreach ($result as $row) {
                    echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td><button type=" . "button" . ">Add to Favorites</button></td><td><a href='single-page.php?ID=$row[5]'>View</a></td></tr>";
                }
                $pdo = null;
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        } else {
            displayFilteredList();
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