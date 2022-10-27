<?php
define('DBCONNSTRING', 'sqlite:./data/music.db');
/*define('DBHOST', 'localhost');
define('DBNAME', 'music');
define('DBUSER', 'root');
define('DBPASS', ''); */
//define('DBCONNSTRING', "mysql:host=" . DBHOST . ";dbname=" . DBNAME . ";charset=utf8mb4;");
function generateSingleSong()
{
    try {
        $pdo = new PDO(DBCONNSTRING);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //write sql
        $passedID = $_GET['ID'];
        $sql = "SELECT title, artist_name, type_name, genre_name, year, duration, bpm, energy,danceability,liveness,valence,acousticness,speechiness,popularity FROM songs INNER JOIN genres on songs.genre_id = genres.genre_id INNER JOIN artists on songs.artist_id = artists.artist_id INNER JOIN types on artists.artist_type_id = types.type_id where song_id =$passedID";
        $result = $pdo->query($sql);
        //run sql & print on screen
        foreach ($result as $row) {
            $duration = gmdate("i:s", $row[5]);
            echo "<div><div class=" . "row" . ">
        <div class=" . "column" . "><b>Song Title</b> <br> <b>Artist Name</b> <br><b>Artist Type</b> <br><b>Genre</b> <br><b> Year</b> <br><b>Duration</b></div>
        <div class=" . "column" . "><b>$row[0]</b><br><b>$row[1]</b><br><b>$row[2]</b><br><b>$row[3]</b><br><b>$row[4]</b><br><b>$duration mins</b></div>
        </div><br>";
            echo "<h4>Analysis Data</h4><sub>BPM $row[6] - Energy $row[7] - Danceability $row[8] - Liveness $row[9] - Valence $row[10] - Acousticness $row[11] - Speechiness $row[12] - Popularity $row[13]</sub></div>";
        }
        $pdo = null;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

function generateFavoritesList()
{
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
}
