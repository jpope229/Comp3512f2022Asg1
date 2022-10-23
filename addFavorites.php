<?php
session_start();
$song_ID = $_GET['ID'];

if (!isset($_SESSION['favorites'])) {
    $favoritesArr = [];
    $_SESSION['favorites'] = $favoritesArr;
}

if (!in_array($song_ID, $_SESSION['favorites'])) {
    array_push($_SESSION['favorites'], $song_ID);
}
header("location: favorites.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    Song Added to favorites!
</body>

</html>