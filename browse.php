<?php
session_start();
//Display all songs if no query string is passed (Coming from Nav)
if (!empty($_GET['title']) or !empty($_GET['artist_select']) or !empty($_GET['genre_select']) or !empty($_GET['yearL']) or !empty($_GET['yearG']) or !empty($_GET['popL']) or !empty($_GET['popG'])) {
    require_once('includes/config.inc.php');
    require_once('includes/queryString.inc.php');
} else {
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
        .sty {
  background-image: url('images/marcela-laskoski-YrtFlrLo2DQ-unsplash.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100%;

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
    opacity: 0.3;
}
</style>
</head>

<body>
    <div class="sty">
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

    <h1>Browse/Search Results</h1>
    <a href="browse.php">Show All</a><br>
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
            displayAllsongs();
        } else {
            displayFilteredList();
        }
        ?>

    </table>

    </div>
    <footer>
        <p>COMP3512<br>
            Justin Pope <a href='https://github.com/jpope229'>Github</a><br>
            Hoomer Amid <a href='https://github.com/hamid269'>Github</a>
        </p>
    </footer>
</body>

</html>