<?php
//displays song based on first query string that returns a match
function displayAllsongs()
{
    try {
        $pdo = new PDO(DBCONNSTRING);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //write sql
        $sql = "SELECT title, year, artist_name, genre_name, popularity, song_id FROM songs INNER JOIN genres on songs.genre_id = genres.genre_id INNER JOIN artists on songs.artist_id = artists.artist_id";
        $result = $pdo->query($sql);


        foreach ($result as $row) {
            echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td><a class=" . "fav" . " href=" . "includes/addFavorites.inc.php?ID=$row[5]" . ">Add to Favorites</a></td><td><a class=" . "viewme" . " href='single-page.php?ID=$row[5]'>View</a></td></tr>";
        }
        $pdo = null;
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
function displayFilteredList()
{
    if (!empty($_GET['title'])) {
        try {
            $queryString = $_GET['title'];
            $pdo = new PDO(DBCONNSTRING);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //write sql
            $sql = "SELECT title, year, artist_name, genre_name, popularity, song_id FROM songs INNER JOIN genres on songs.genre_id = genres.genre_id INNER JOIN artists on songs.artist_id = artists.artist_id where title like '%$queryString%' ";
            $result = $pdo->query($sql);
            foreach ($result as $row) {
                echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td><a class=" . "fav" . " href=" . "includes/addFavorites.inc.php?ID=$row[5]" . ">Add to Favorites</a></td><td><a class=" . "viewme" . " href='single-page.php?ID=$row[5]'>View</a></td></tr>";
            }
            $pdo = null;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    } elseif (!empty($_GET['artist_select'])) {
        try {
            $queryString = $_GET['artist_select'];
            $pdo = new PDO(DBCONNSTRING);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //write sql
            $sql = "SELECT title, year, artist_name, genre_name, popularity, song_id FROM songs INNER JOIN genres on songs.genre_id = genres.genre_id INNER JOIN artists on songs.artist_id = artists.artist_id where artists.artist_name='$queryString'";
            $result = $pdo->query($sql);

            foreach ($result as $row) {
                echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td><a class=" . "fav" . " href=" . "includes/addFavorites.inc.php?ID=$row[5]" . ">Add to Favorites</a></td><td><a class=" . "viewme" . " href='single-page.php?ID=$row[5]'>View</a></td></tr>";
            }
            $pdo = null;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    } elseif (!empty($_GET['genre_select'])) {
        try {
            $queryString = $_GET['genre_select'];
            $pdo = new PDO(DBCONNSTRING);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //write sql
            $sql = "SELECT title, year, artist_name, genre_name, popularity, song_id FROM songs INNER JOIN genres on songs.genre_id = genres.genre_id INNER JOIN artists on songs.artist_id = artists.artist_id where genres.genre_name ='$queryString'";
            $result = $pdo->query($sql);

            foreach ($result as $row) {
                echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td><a  class=" . "fav" . " href=" . "includes/addFavorites.inc.php?ID=$row[5]" . ">Add to Favorites</a></td><td><a class=" . "viewme" . " href='single-page.php?ID=$row[5]'>View</a></td></tr>";
            }
            $pdo = null;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    } elseif (!empty($_GET['yearL'])) {
        try {
            $queryString = $_GET['yearL'];
            $pdo = new PDO(DBCONNSTRING);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //write sql
            $sql = "SELECT title, year, artist_name, genre_name, popularity, song_id FROM songs INNER JOIN genres on songs.genre_id = genres.genre_id INNER JOIN artists on songs.artist_id = artists.artist_id where year < $queryString";
            $result = $pdo->query($sql);

            foreach ($result as $row) {
                echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td><a class=" . "fav" . " href=" . "includes/addFavorites.inc.php?ID=$row[5]" . ">Add to Favorites</a></td><td><a class=" . "viewme" . "  href='single-page.php?ID=$row[5]'>View</a></td></tr>";
            }
            $pdo = null;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    } elseif (!empty($_GET['yearG'])) {
        try {
            $queryString = $_GET['yearG'];
            $pdo = new PDO(DBCONNSTRING);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //write sql
            $sql = "SELECT title, year, artist_name, genre_name, popularity, song_id FROM songs INNER JOIN genres on songs.genre_id = genres.genre_id INNER JOIN artists on songs.artist_id = artists.artist_id where year > $queryString";
            $result = $pdo->query($sql);

            foreach ($result as $row) {
                echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td><a  class=" . "fav" . " href=" . "includes/addFavorites.inc.php?ID=$row[5]" . ">Add to Favorites</a></td><td><a class=" . "viewme" . "  href='single-page.php?ID=$row[5]'>View</a></td></tr>";
            }
            $pdo = null;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    } elseif (!empty($_GET['popL'])) {
        try {
            $queryString = $_GET['popL'];
            $pdo = new PDO(DBCONNSTRING);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //write sql
            $sql = "SELECT title, year, artist_name, genre_name, popularity, song_id FROM songs INNER JOIN genres on songs.genre_id = genres.genre_id INNER JOIN artists on songs.artist_id = artists.artist_id where popularity < $queryString";
            $result = $pdo->query($sql);

            foreach ($result as $row) {
                echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td><a class=" . "fav" . " href=" . "includes/addFavorites.inc.php?ID=$row[5]" . ">Add to Favorites</a></td><td><a class=" . "viewme" . "  href='single-page.php?ID=$row[5]'>View</a></td></tr>";
            }
            $pdo = null;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    } elseif (!empty($_GET['popG'])) {
        try {
            $queryString = $_GET['popG'];
            $pdo = new PDO(DBCONNSTRING);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //write sql
            $sql = "SELECT title, year, artist_name, genre_name, popularity, song_id FROM songs INNER JOIN genres on songs.genre_id = genres.genre_id INNER JOIN artists on songs.artist_id = artists.artist_id where popularity > $queryString";
            $result = $pdo->query($sql);

            foreach ($result as $row) {
                echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td><a  class=" . "fav" . " href=" . "includes/addFavorites.inc.php?ID=$row[5]" . ">Add to Favorites</a></td><td><a  class=" . "viewme" . " href='single-page.php?ID=$row[5]'>View</a></td></tr>";
            }
            $pdo = null;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}

function returnSearchFilter()
{
    $searchFilters = " ";
    if (!empty($_GET['title'])) {
        $searchFilters = "Displaying results for songs titled " . $_GET['title'] . " ";
        echo "<h1>$searchFilters</h1>";
    }

    if (!empty($_GET['artist_select'])) {
        $searchFilters = "Displaying results for songs by " . $_GET['artist_select'] . " ";
        echo "<h1>$searchFilters</h1>";
    }

    if (!empty($_GET['genre_select'])) {
        $searchFilters = "Displaying results for " . $_GET['genre_select'] . " songs";
        echo "<h1>$searchFilters</h1>";
    }
    if (!empty($_GET['yearL'])) {
        $searchFilters = "Displaying results for songs released before the year " . $_GET['yearL'] . " ";
        echo "<h1>$searchFilters</h1>";
    }
    if (!empty($_GET['yearG'])) {
        $searchFilters = "Displaying results for songs released after the year " . $_GET['yearG'] . " ";
        echo "<h1>$searchFilters</h1>";
    }
    if (!empty($_GET['popL'])) {
        $searchFilters = "Displaying results for songs with a popularity score below " . $_GET['popL'] . " ";
        echo "<h1>$searchFilters</h1>";
    }
    if (!empty($_GET['popG'])) {
        $searchFilters = "Displaying results for songs with a popularity score above " . $_GET['popG'] . " ";
        echo "<h1>$searchFilters</h1>";
    }
}

function generateHeader()
{
    if (!empty($_GET['title']) || !empty($_GET['artist_select']) || !empty($_GET['genre_select']) || !empty($_GET['yearL']) || !empty($_GET['yearG']) || !empty($_GET['popL']) || !empty($_GET['popG'])) {
        echo "<h1>Search Results</h1>";
    } else {
        echo "<h1>Browse All Songs</h1>";
    }
}
