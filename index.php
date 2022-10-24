<?php
session_start();
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
    form label {
    margin: 2px;
    padding: 0px;
    color: black;
}
body {
  background-image: url('images/marcela-laskoski-YrtFlrLo2DQ-unsplash.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
h1 {
    color: white;
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
        <h2>COMP 3512 ASG1<h2> <br>
                <sub>Justin Pope</sub>

                <div class="nav">
                    <a href="index.php">Home</a>
                    <a href="search.php">Search</a>
                    <a href="browse.php">Browse</a>
                    <a href="favorites.php">Favorites</a>
                </div>

    </header>

    <h1>HOME PAGE</h1>

    <footer>
        <p>COMP3512<br>
            Justin Pope <a href='https://github.com/jpope229'>Github</a><br>
            Hoomer Amid <a href='https://github.com/hamid269'>Github</a>
        </p>
    </footer>
</body>

</html>