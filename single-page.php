<?php
session_start();
if (!empty($_GET['ID'])) {
    require_once('includes/config.inc.php');
} else {
    //header('Location: search.php');
    echo "error no id passed";
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
        <div class="headerName">
            <h2>COMP 3512 Assign1<h2> <br>
                    Justin Pope<br>
                    Hoomer Amid<br>
        </div>
        <div class="nav">
            <a href="index.php">Home</a>
            <a href="search.php">Search</a>
            <a href="browse.php">Browse</a>
            <a href="favorites.php">Favorites</a>
        </div>
    </header>

    <h1>Song information</h1>
    <div class="songInfo">
        <?php
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
        ?>
    </div>
    <footer>
        <p>COMP3512<br>
            <a href='https://github.com/jpope229/Comp3512f2022Asg1'>Assignment Repository </a><br>
        <div class="Names">Contributors:<br>
            Justin Pope <a href='https://github.com/jpope229'>Github</a><br>
            Hoomer Amid <a href='https://github.com/hamid269'>Github</a><br>
        </div>
        </p>
    </footer>
</body>

</html>