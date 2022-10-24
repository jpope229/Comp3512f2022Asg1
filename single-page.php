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
    <style>
        .songInfo{
            color: white;
            margin-left: auto;
            margin-right: auto;
            display: flex;
            justify-content: center;
        }
        body {
  background-image: url('images/marcela-laskoski-YrtFlrLo2DQ-unsplash.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
h1, header h2{
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
h2 {
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
        <h2>COMP 3512 ASG1<h2>
                <sub>Justin Pope, Hoomer Amid</sub>
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
            <div class=" . "column" . ">Song Title <br>Artist Name <br>Artist Type <br>Genre <br> Year <br>Duration</div>
            <div class=" . "column" . ">$row[0]<br>$row[1]<br>$row[2]<br>$row[3]<br>$row[4]<br>$duration minutes</div>
            </div><br>";
            echo "<sub>BPM $row[6] Energy $row[7] Danceability $row[8] Liveness $row[9] Valence $row[10] Acousticness $row[11] Speechiness $row[12] Popularity $row[13]</sub></div>";
        }

        $pdo = null;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
    ?>
</div>
    <footer>
        <p>COMP3512<br>
            Justin Pope <a href='https://github.com/jpope229'>Github</a><br>
            Hoomer Amid <a href='https://github.com/hamid269'>Github</a>
        </p>
    </footer>
</body>

</html>