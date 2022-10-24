<?php
session_start();
require_once('includes/config.inc.php');
try {
    $pdo = new PDO(DBCONNSTRING);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "select artist_name from artists";
    $result = $pdo->query($sql);
    $artists = $result->fetchAll(PDO::FETCH_ASSOC);
    $pdo = null;
} catch (PDOException $e) {
    die($e->getMessage());
}
try {
    $pdo = new PDO(DBCONNSTRING);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "select genre_name from genres order by genre_name";
    $result = $pdo->query($sql);
    $genre = $result->fetchAll(PDO::FETCH_ASSOC);
    $pdo = null;
} catch (PDOException $e) {
    die($e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
    <link rel="stylesheet" href="css/search.css">
    <style>
       body {
  background-image: url('images/icons8-team-7LNatQYMzm4-unsplash.jpg');
  background-repeat: no-repeat;
  background-attachment: scroll;
  background-size: 100%;
  
}
h1 {
    color: white;
}
    form label {
    margin: 2px;
    padding: 0px;
    color: black;
}
input {
 padding: 2px;
 margin-left: 5px;
 margin-bottom: 5px;
  cursor: pointer;
  height: 30%;
  width: 40%;
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
select {
    cursor: pointer;
    margin-left: 5px;
}

footer {
    position: fixed;
    bottom: 0;
    padding: 0;
    background: white;
    color: black;
    width: 100%;
    text-align: center;
    opacity: 0.5;
}
</style>
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

    <h1>Basic Song Search</h1>
    <form action="browse.php" method="get">
        <label for="title">Title</label><br>
        <input type="text" id="title" name="title"><br>
        <div class="row">
            <div class="column">
                <label for="artist">Artist</label><br>
                <select class="ui fluid dropdown" name="artist_select">
                    <option value='0'>Select Artist</option>
                    <?php
                    foreach ($artists as $a) {
                        echo "<option value='" . $a['artist_name'] . "'>" . $a['artist_name'] . "</option>";
                    }
                    ?>
                </select><br>
            </div>
            <div class="column">
                <label for="genre">Genre</label><br>
                <select class="ui fluid dropdown" name="genre_select">
                    <option value='0'>Select Genre</option>
                    <?php
                    foreach ($genre as $g) {
                        echo "<option value='" . $g['genre_name'] . "'>" . $g['genre_name'] . "</option>";
                    }
                    ?>
                </select><br>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="column">Year<br>
                <input type="text" id="yearLesser" name="yearL">
                <label for="yearLesser">Less</label><br>
                <input type="text" id="yearGreater" name="yearG">
                <label for="yearGreater">Greater</label><br>
            </div>
            <div class="column"> Popularity<br>
                <input type="text" id="popLesser" name="popL">
                <label for="popLesser">Less</label><br>
                <input type="text" id="popGreater" name="popG">
                <label for="popGreater">Greater</label><br>
            </div>
        </div>
        <br>
        <input type="submit" value="Search">

    </form>


    <footer>
        <p>COMP3512<br>
            Justin Pope <a href='https://github.com/jpope229'>Github</a><br>
            Hoomer Amid <a href='https://github.com/hamid269'>Github</a>
        </p>
    </footer>
</body>

</html>