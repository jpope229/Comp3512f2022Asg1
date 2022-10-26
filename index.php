<?php
session_start();
require_once('includes/config.inc.php');
require_once('includes/dbHelper.inc.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single song</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <header>
        <div class="headerName">
            <h1>COMP 3512 Assign1<h1> <br>
                    <a href='https://github.com/jpope229/Comp3512f2022Asg1'>Assignment Repository </a><br>
                    <div class="Names">Contributors:<br>
                        <a href='https://github.com/jpope229'>Justin Pope</a><br>
                        <a href='https://github.com/hamid269'>Hoomer Amid</a><br>
                    </div>
        </div>
        <div class="nav">
            <a class="active" href="index.php">Home</a>
            <a href="search.php">Search</a>
            <a href="browse.php">Browse</a>
            <a href="favorites.php">Favorites</a>
        </div>
    </header>

    <h1>HOME</h1>
    <div class="grid-container">
        <?php generateTopGenres() ?>
        <?php generateTopSongs() ?>
        <?php generateTopArtists() ?>
        <?php generateOneHitWonders() ?>
        <?php generateLongestAcousticSongs() ?>
        <?php generateAtTheClub() ?>
        <?php generateRunningSongs() ?>
        <?php generateStudyingSongs() ?>
    </div>

    <footer>
        <p>COMP3512F2022<br>Assign1<br>
            <a href='https://github.com/jpope229/Comp3512f2022Asg1'>Assignment Repository </a><br>
        <div class="Names">Contributors:<br>
            <a href='https://github.com/jpope229'>Justin Pope</a><br>
            <a href='https://github.com/hamid269'> Hoomer Amid</a><br>
        </div>
        </p>
        Background from <a href='https://unsplash.com/photos/gUK3lA3K7Yo'>Unsplash </a>
    </footer>
</body>

</html>