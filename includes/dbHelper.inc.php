<?php
require_once('config.inc.php');


//TOP GENRES
function generateTopGenres()
{
    $sql = "SELECT title, genre_name, COUNT(genre_name) as genre_count FROM songs INNER JOIN genres on songs.genre_id=genres.genre_id
GROUP BY genre_name
ORDER BY genre_count DESC
Limit 10";

    try {
        $pdo = new PDO(DBCONNSTRING);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $pdo->query($sql);
        echo "<div class=" . "grid-item" . "><h3>Top Genres</h3><ul>";
        foreach ($result as $row) {
            echo "<li>$row[1] - $row[2] Songs</li>";
        }
        echo "</ul></div>";
        $pdo = null;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

// TOP ARTISTS
function generateTopArtists()
{
    $sql = "SELECT title, artist_name, COUNT(artist_name) AS artist_count FROM songs INNER JOIN artists on songs.artist_id=artists.artist_id GROUP BY artist_name ORDER BY artist_count DESC Limit 10";
    try {
        $pdo = new PDO(DBCONNSTRING);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $pdo->query($sql);
        echo "<div class=" . "grid-item" . "><h3>Top Artists</h3><ul>";
        foreach ($result as $row) {
            echo "<li>$row[1] - $row[2] Songs</li>";
        }
        echo "</ul></div>";
        $pdo = null;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}


// MOST POPULAR SONGS
function generateTopSongs()
{
    $sql = "SELECT song_id, title, artist_name, popularity FROM songs INNER JOIN artists on songs.artist_id=artists.artist_id ORDER BY popularity DESC Limit 10";
    try {
        $pdo = new PDO(DBCONNSTRING);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $pdo->query($sql);
        echo "<div class=" . "grid-item" . "><h3>Most Popular Songs</h3><ul>";
        $position = 1;
        foreach ($result as $row) {
            echo "<li>$position - $row[2] - <a href=" . "single-page.php?ID=" . "$row[0]" . ">$row[1]</a></li>";
            $position++;
        }
        echo "</ul></div>";
        $pdo = null;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

//ONE HIT WONDERS
function generateOneHitWonders()
{
    $sql = "SELECT song_id, title, artist_name, popularity, COUNT(artist_name) AS artist_count FROM songs INNER JOIN artists on songs.artist_id=artists.artist_id GROUP BY artist_name HAVING artist_count=1 ORDER BY popularity DESC Limit 10";
    try {
        $pdo = new PDO(DBCONNSTRING);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $pdo->query($sql);
        echo "<div class=" . "grid-item" . "><h3>One Hit Wonders</h3><ul>";
        foreach ($result as $row) {
            echo "<li><a href=" . "single-page.php?ID=" . "$row[0]" . ">$row[1]</a> - $row[2]</li>";
        }
        echo "</ul></div>";
        $pdo = null;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

//LONGEST ACOUSTIC
function generateLongestAcousticSongs()
{
    $sql = "SELECT song_id, title, artist_name, acousticness, duration FROM songs INNER JOIN artists on songs.artist_id=artists.artist_id WHERE acousticness > 40 ORDER BY duration DESC LIMIT 10";
    try {
        $pdo = new PDO(DBCONNSTRING);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $pdo->query($sql);
        echo "<div class=" . "grid-item" . "><h3>Longest Acoustic Songs</h3><ul>";
        foreach ($result as $row) {
            $duration = gmdate("i:s", $row[4]);
            echo "<li>$row[2] - <a href=" . "single-page.php?ID=" . "$row[0]" . ">$row[1]</a> - Duration: $duration</li>";
        }
        echo "</ul></div>";
        $pdo = null;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

//AT THE CLUB
function generateAtTheClub()
{

    $sql = "SELECT song_id, title, artist_name, danceability, ((danceability*1.6) + (energy*1.4)) AS CLUBRATING FROM songs INNER JOIN artists on songs.artist_id=artists.artist_id WHERE danceability > 80 ORDER BY ClubRating DESC Limit 10";
    try {
        $pdo = new PDO(DBCONNSTRING);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $pdo->query($sql);
        echo "<div class=" . "grid-item" . "><h3>At the Club</h3><ul>";
        foreach ($result as $row) {
            echo "<li>$row[2] - <a href=" . "single-page.php?ID=" . "$row[0]" . ">$row[1]</a> - Club Rating: $row[4]</li>";
        }
        echo "</ul></div>";
        $pdo = null;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

//RUNNING SONGS
function generateRunningSongs()
{
    $sql = "SELECT song_id, title, artist_name, bpm, ((valence*1.6) + (energy*1.3)) AS RUN_SCORE FROM songs INNER JOIN artists on songs.artist_id=artists.artist_id WHERE bpm >=120 AND bpm <= 125 ORDER BY Run_Score DESC Limit 10";
    try {
        $pdo = new PDO(DBCONNSTRING);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $pdo->query($sql);
        echo "<div class=" . "grid-item" . "><h3>Running Songs</h3><ul>";
        foreach ($result as $row) {
            echo "<li>$row[2] - <a href=" . "single-page.php?ID=" . "$row[0]" . ">$row[1]</a> - Run Score: $row[4]</li>";
        }
        echo "</ul></div>";
        $pdo = null;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}

//STUDYING
function generateStudyingSongs()
{
    $sql = "SELECT song_id, title, artist_name, bpm, speechiness, ((acousticness*0.8) + (100-speechiness) + (100 - valence)) AS STUDY_SCORE FROM songs INNER JOIN artists on songs.artist_id=artists.artist_id WHERE bpm >=100 and bpm <115 AND speechiness <=20 ORDER BY Study_Score DESC Limit 10";
    try {
        $pdo = new PDO(DBCONNSTRING);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $pdo->query($sql);
        echo "<div class=" . "grid-item" . "><h3>Studying Songs</h3><ul>";
        foreach ($result as $row) {
            echo "<li>$row[2] - <a href=" . "single-page.php?ID=" . "$row[0]" . ">$row[1]</a> - Study Score: $row[5]</li>";
        }
        echo "</ul></div>";
        $pdo = null;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
