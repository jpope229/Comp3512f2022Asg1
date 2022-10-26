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
    <link rel="stylesheet" href="css/browse.css">
    <title>Browse Page</title>
</head>

<body class="sty">
    <div>
        <header>
            <div class="headerName">
                <h2>COMP 3512 Assign1<h2> <br>
                        Justin Pope<br>
                        Hoomer Amid<br>
            </div>
            <div class="nav">
                <a href="index.php">Home</a>
                <a href="search.php">Search</a>
                <a class="active" href="browse.php">Browse</a>
                <a href="favorites.php">Favorites</a>
            </div>
        </header>
        <?php generateHeader() ?>
        <?php returnSearchFilter() ?>
        <a href="browse.php" class="showAllButton">Show All</a><br>
        <table>
            <tr>
                <th>Title</th>
                <th>Year</th>
                <th>Artist</th>
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

        <footer>
            <p>COMP3512<br>
                <a href='https://github.com/jpope229/Comp3512f2022Asg1'>Assignment Repository </a><br>
            <div class="Names">Contributors:<br>
                <a href='https://github.com/jpope229'>Justin Pope</a><br>
                <a href='https://github.com/hamid269'>Hoomer Amid</a><br>
            </div>
            </p>
            Background from <a href='https://unsplash.com/photos/EXCeGbyolPY'>Unsplash </a>
        </footer>
    </div>

</body>

</html>