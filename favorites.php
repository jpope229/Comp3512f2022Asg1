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
            <h2>COMP 3512 Assign1</h2> <br>
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
        <?php generateFavoritesList() ?>
    </table>
    <footer>
        <div>
            COMP3512F2022<br>
            Assign1
            <a href='https://github.com/jpope229/Comp3512f2022Asg1'>Github Repository </a><br>
        </div>
        <br>
        <div class="Names">Contributors:<br>
            <a href='https://github.com/jpope229'>Justin Pope</a><br>
            <a href='https://github.com/hamid269'> Hoomer Amid</a><br>
        </div>
        Background from <a href='https://unsplash.com/photos/gUK3lA3K7Yo'>Unsplash </a>
    </footer>
</body>

</html>